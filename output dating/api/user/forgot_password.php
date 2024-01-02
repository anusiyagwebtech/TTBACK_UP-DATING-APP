<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 


// get database connection
include_once '../config/database.php';
include_once ('../../config/mail2/sendgrid-php.php');
 
// instantiate product object
include_once '../objects/form.php';
 include_once '../objects/functions.php';
$database = new Database();
$db = $database->getConnection();
 
$form = new Form($db);
 

$data = json_decode(file_get_contents("php://input"));


// make sure data is not empty
if(
    !empty($data->emailid) 
){
$checkvaliduser = $db->prepare("SELECT * FROM `register` WHERE `emailid`='".$data->emailid."' ORDER BY `id` ASC");
$checkvaliduser->execute();
 $checknum = $checkvaliduser->rowCount();

if($checknum>0)
{  
    
$row = $checkvaliduser->fetch(PDO::FETCH_ASSOC);

// set form property values
$emailid = $data->emailid;
$otp = generateRandomString();

$query = "UPDATE `register` SET `otp`='".$otp."'  WHERE id='".$row['id']."'";
$stmt = $db->prepare($query);
$stmt->execute();

//send mail
$to=$emailid;//
$from="microwebzc@gmail.com";//config pana email

$message='<p>Hi<br><br>Your OTP for Dating APP : '.$otp.'<br></p>';
$subject ="Dating APP- Forgot Password - OTP";
$resmail = sendgridApiMail($to, $message, $subject, $from, '');


http_response_code(200);

        // tell the user
 echo json_encode(array("success" => "true", "error" => "false","message" => "OTP Send to your Mailid. Check your mail for OTP")); 

}
 
// tell the user data is incomplete
else{

http_response_code(200);
        // tell the user
echo json_encode(array("success" => "true", "error" => "false","message" => "Invalid Mobileno."));   
}

}
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "false", "error" => "true", "message" => "Unable to create user. Data is incomplete."));
}
?>
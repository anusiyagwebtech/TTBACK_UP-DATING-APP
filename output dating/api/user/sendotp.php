<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 


// get database connection
include_once '../config/database.php';
require '../aws/vendor/autoload.php';
 
// instantiate product object
include_once '../objects/form.php';
 include_once '../objects/functions.php';
$database = new Database();
$db = $database->getConnection();
 
$form = new Form($db);
 
// get posted data

$data = json_decode(file_get_contents("php://input"));


// make sure data is not empty
if(
    !empty($data->mobileno) 
){
$checkvaliduser = $db->prepare("SELECT * FROM `customer` WHERE `mobileno`='".$data->mobileno."' ORDER BY `id` ASC");
$checkvaliduser->execute();
 $checknum = $checkvaliduser->rowCount();

if($checknum>0)
{  
    
    $row = $checkvaliduser->fetch(PDO::FETCH_ASSOC);
    
    // set form property values
    $form->mobileno = $data->mobileno;
    $form->registerid = $row['id'];
$data->otp = generateRandomString();

$sns = Aws\Sns\SnsClient::factory(array(
    'credentials' => [
        'key'    => 'AKIAYNPFHKAPQFU3HZ4S',
        'secret' => 'jqA4FhJ5bWs2N8y0kA55Sz76O9g5wqfSW/qKmOrF',
    ],
    'region' => 'ap-south-1',
    'version'  => 'latest',
));

$sms_msgv = "<#> Your Rjpm Ride APP code is: ".$data->otp;  

$result = $sns->publish([
    'Message' => $sms_msgv, // REQUIRED
    'MessageAttributes' => [
        'AWS.SNS.SMS.SenderID' => [
            'DataType' => 'String', // REQUIRED
            'StringValue' => 'INUpload'
        ],
        'AWS.SNS.SMS.SMSType' => [
            'DataType' => 'String', // REQUIRED
            'StringValue' => 'Transactional' // or 'Promotional'
        ]
    ],
    'PhoneNumber' => '+91'.trim($data->mobileno),
]);
// echo "<pre>";
// echo $result['@metadata']['statusCode'];

// Send SMS End
if($result['@metadata']['statusCode']=='200')
{
    // Add Report
$postRequest = array(
    'site' => 'Rjpm-Ride App',
    'mobileno' => $data->mobileno,
    'countrycode' => '+91',
    'message' => $sms_msgv
);

$cURLConnection = curl_init('https://demolink.co.in/smsmonitor/api/addlog');
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

// Add Report

$query = "UPDATE `customer` SET
                    otp='".$data->otp."',mobileno='".$data->mobileno."' WHERE id='".$row['id']."'";
$stmt = $db->prepare($query);
$stmt->execute();
 
  http_response_code(200);

        // tell the user
 echo json_encode(array("success" => "true", "error" => "false","registerid" => $row['id'],"name" => $row['name'],"type"=>"existing","emailid" => $row['emailid'], "token" => $row['token'],"otp"=>$data->otp,"message" => "OTP Send to your Mobileno")); 

}
else
{
 http_response_code(200);
 
        // tell the user
        echo json_encode(array("success" => "false", "error" => "true","message" => "Invalid Mobileno"));   
}
 
}
 
// tell the user data is incomplete
else{
    // set form property values
    $form->name = '';
    $form->emailid = '';
    $form->mobileno = $data->mobileno;
	
$token=md5(uniqid(rand()));
$form->token = $token;
if($form->createtempaccount())
{
	$lastid = gettempcustomer('id',$data->mobileno);
	
	$data->otp = generateRandomString();

$sns = Aws\Sns\SnsClient::factory(array(
    'credentials' => [
        'key'    => 'AKIAYNPFHKAPQFU3HZ4S',
        'secret' => 'jqA4FhJ5bWs2N8y0kA55Sz76O9g5wqfSW/qKmOrF',
    ],
    'region' => 'ap-south-1',
    'version'  => 'latest',
));


 $sms_msgv = "<#> Your RJPM Ride APP code is: ".$data->otp;  

$result = $sns->publish([
    'Message' => $sms_msgv, // REQUIRED
    'MessageAttributes' => [
        'AWS.SNS.SMS.SenderID' => [
            'DataType' => 'String', // REQUIRED
            'StringValue' => 'INUpload'
        ],
        'AWS.SNS.SMS.SMSType' => [
            'DataType' => 'String', // REQUIRED
            'StringValue' => 'Transactional' // or 'Promotional'
        ]
    ],
    'PhoneNumber' => '+91'.trim($data->mobileno),
]);
// echo "<pre>";
// echo $result['@metadata']['statusCode'];

// Send SMS End
if($result['@metadata']['statusCode']=='200')
{
    // Add Report
$postRequest = array(
    'site' => 'RJPM-Ride App',
    'mobileno' => $data->mobileno,
    'countrycode' => '+91',
    'message' => $sms_msgv
);

$cURLConnection = curl_init('https://demolink.co.in/smsmonitor/api/addlog');
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

// Add Report

$query = "UPDATE `tempcustomer` SET
                    otp='".$data->otp."',mobileno='".$data->mobileno."' WHERE id='".$lastid."'";
$stmt = $db->prepare($query);
$stmt->execute();

http_response_code(200);
        // tell the user
echo json_encode(array("success" => "true", "error" => "false","registerid"=>$lastid,"token"=>$form->token, "type"=>"new","otp"=>$data->otp,"message" => "OTP Send to your Mobileno"));   
}
else
{
	http_response_code(200);
        // tell the user
		echo json_encode(array("success" => "true", "error" => "false","registerid"=>$lastid,"token"=>$form->token, "type"=>"new","otp"=>$data->otp,"message" => "OTP Send to your Mobileno")); 
//echo json_encode(array("success" => "false", "error" => "true", "message" => "Sms not send")); 
 	
}


}
else
{
	http_response_code(200);
        // tell the user
echo json_encode(array("success" => "false", "error" => "true","message" => "Something went wrong"));   

}

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
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

// get database connection
include_once '../config/database.php';

 
// instantiate product object
include_once '../objects/form.php';

include_once '../objects/functions.php';

$database = new Database();
$db = $database->getConnection();
 
$form = new Form($db);
 
// get posted data

$data = json_decode(file_get_contents("php://input"));


// make sure data is not empty
if( !empty($data->emailid) &&
    !empty($data->username) &&
    !empty($data->gender) &&
    !empty($data->password)
){

$checkvaliduser = $db->prepare("SELECT * FROM `register` WHERE `emailid`='".$data->emailid."' ORDER BY `id` ASC");
$checkvaliduser->execute();
 $checknum = $checkvaliduser->rowCount();
  
if($checknum==0)
{  

    // set form property values
    $form->emailid = $data->emailid;
    $form->username = $data->username;
    $form->gender = $data->gender;
    $form->password = $data->password;
	
$token=md5(uniqid(rand()));
$form->token = $token;
if($form->createaccount())
{
	$lastid =  $db->lastInsertId();
    $token = getuser('token',$lastid);
http_response_code(200);
        // tell the user
echo json_encode(array("success" => "true", "error" => "false","userid"=>$lastid,"token"=>$token,"message" => "Register Successfully"));   

}
else
{
	http_response_code(200);
        // tell the user
echo json_encode(array("success" => "false", "error" => "true","message" => "Something went wrong"));   

}

}
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "false", "error" => "true", "message" => "Account Already Exist"));
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
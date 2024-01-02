<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

// get database connection
include_once '../config/database.php';


$token= "";

// Code for enable getallheaders function 


if (!function_exists('getallheaders')) {
    function getallheaders() {
    $headers = [];
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    return $headers;
    }
}

// Code for enable getallheaders function 


foreach(getallheaders() as $name => $value)
{
 if($name=="token")
 {
 $token=$value;    
 }
}

// instantiate product object
include_once '../objects/form.php';
 include_once '../objects/functions.php';
$database = new Database();
$db = $database->getConnection();
 
$form = new Form($db);
 
// get posted data

$data = json_decode(file_get_contents("php://input"));

$checkvaliduser = $db->prepare("SELECT * FROM `register` WHERE `token`='".$token."' ORDER BY `id` ASC");
$checkvaliduser->execute();
 $checknum = $checkvaliduser->rowCount();

if($checknum>0)
{ 
// make sure data is not empty
if(
    !empty($data->userid) && !empty($data->name) && !empty($data->dob)
){
   $age=getage($data->dob);
$query = "UPDATE `register` SET
                    works_at='".$data->works_at."',city='".$data->city."',state='".$data->state."',country='".$data->country."',age='".$age."',username='".$data->name."',dob='".$data->dob."',about='".$data->about."',interest='".$data->interest."',relationship_goal='".$data->relationship_goal."',life_style='".$data->life_style."'  WHERE id='".$data->userid."'";
$stmt = $db->prepare($query);
$stmt->execute();
  // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "true", "error" => "false","userid"=>$data->userid, "message" => "Profile Updated Successfully"));
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "false", "error" => "true", "message" => "Unable to create user. Data is incomplete."));
}
}
else{
    // set response code - 404 Not found
    http_response_code(200);
 
    // tell the user no patient found
    echo json_encode(
        array("success" => "false","message" => "Invalid Token")
    );
}  
?>
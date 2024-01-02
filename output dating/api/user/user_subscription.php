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

  $userrow = $checkvaliduser->fetch(PDO::FETCH_ASSOC);
  $days=getsubscription('validity',$data->subscriptionid);
  $amt=getsubscription('amount',$data->subscriptionid);
  $expdate=Date('d-m-Y', strtotime('+'.$days.' days'));


  $checkvalidsubs = $db->prepare("SELECT * FROM `user_subscription` WHERE `userid`='".$userrow['id']."' AND `status`='1' ORDER BY `id` ASC");
$checkvalidsubs->execute();
 $subschecknum = $checkvalidsubs->rowCount();
if($subschecknum==0) {
//add subscription
$hquery = "INSERT INTO `user_subscription` (`userid`,`subscription_id`,`days`,`amount`,`expiry_date`) VALUES ('".$userrow['id']."','".$data->subscriptionid."','".$days."','".$amt."','".$expdate."') ";
$hstmt = $db->prepare($hquery);
$hstmt->execute();
//add subscription
  // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "true", "error" => "false","userid"=>$userrow['id'], "message" => "Subscribed Successfully"));
}
else{
    // set response code - 404 Not found
    http_response_code(200);
 
    // tell the user no patient found
    echo json_encode(
        array("success" => "true","error"=>"false","message" => "User Already Subscribed")
    );
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
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// error_reporting(0);

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

// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/form.php';
include_once '../objects/functions.php';
// instantiate database and patient object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$form = new Form($db);


$data = json_decode(file_get_contents("php://input"));

$stmt11 = $db->prepare("SELECT * FROM `register` WHERE `token`='".$token."' ");	

$stmt11->execute();
$checknum11 = $stmt11->rowCount();
if($checknum11>0)
{
$rres=$stmt11->fetch(PDO::FETCH_ASSOC);
extract($rres);
  // set response code - 200 bad request
    http_response_code(200);
 
 if($photo!='')
 {
$pic=$photo;
 }
 else
 {
  $pic='';
 }
 if($cover!='')
 {
$cpic=$cover;
 }
 else
 {
  $cpic='';
 }
    // tell the user
    echo json_encode(array("success" => "true", "error" => "false", 
	"id"=>$id,
	"name"=>nulltoempty($username),
  "emailid"=>nulltoempty($emailid),
	"dob" => nulltoempty($dob),
  "age"=>nulltoempty($age),
	"aboutme"=>nulltoempty($about),
  "interest"=>nulltoempty($interest),
  "relationgoals"=>nulltoempty($relationship_goal),
  "lifestyle"=>nulltoempty($life_style),
  "profilepic"=>nulltoempty($pic),
  "cover_pic"=>nulltoempty($cpic),
  "works_at"=>nulltoempty($works_at),
  "city"=>nulltoempty($city),
  "state"=>nulltoempty($state),
  "country"=>nulltoempty($country),
  "points"=>nulltoempty($points)
	));
	
}
else
{
  // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "false", "error" => "true", "message" => "Invalid Token"));
	
}
?>

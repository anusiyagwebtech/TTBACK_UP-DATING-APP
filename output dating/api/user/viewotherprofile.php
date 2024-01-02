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

  $setpoints=getadminuser('profile_reduce_point','1');
  $userpoint=$rres['points'];


$checkvalidsubs = $db->prepare("SELECT * FROM `user_subscription` WHERE `userid`='".$rres['id']."' AND `status`='1' AND `expiry_date`>=".date('d-m-Y')." ORDER BY `id` DESC");
$checkvalidsubs->execute();
$subschecknum = $checkvalidsubs->rowCount();
if($subschecknum>0)
{
$orginlat=$rres['lat'];
$orginlng=$rres['lng'];

$desiglat=getuser('lat',$data->profileid);
$desiglng=getuser('lng',$data->profileid);

 $distance=getdistance($orginlat,$orginlng,$desiglat,$desiglng);

if(getuser('photo',$data->profileid)!=''){
 $pic=getuser('photo',$data->profileid); 
}
else
{
  $pic= nulltoempty(getuser('photo',$data->profileid));
}

    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "true", "error" => "false", 
  "id"=>$id,
  "name"=>nulltoempty(getuser('username',$data->profileid)),
  "gender" => nulltoempty(getuser('gender',$data->profileid)),
  "age"=>nulltoempty(getuser('age',$data->profileid)),
  "aboutme"=>nulltoempty(getuser('about',$data->profileid)),
  "interest"=>nulltoempty(getuser('interest',$data->profileid)),
  "works_at"=>nulltoempty(getuser('works_at',$data->profileid)),
  "location"=>nulltoempty($distance),
  "profilepic"=>$pic,
  "city"=>nulltoempty(getuser('city',$data->profileid)),
  ));
  
}
else if($userpoint>=$setpoints) {

$totpoint=$userpoint-$setpoints;

$uquery = "UPDATE `register` SET
                    points='".$totpoint."' WHERE id='".$rres['id']."'";
$ustmt = $db->prepare($uquery);
$ustmt->execute();

//points history
$hquery = "INSERT INTO `point_history` (`userid`,`subject`,`points`,`view_user_id`) VALUES ('".$rres['id']."','viewprofile','".$setpoints."','".$data->profileid."') ";
$hstmt = $db->prepare($hquery);
$hstmt->execute();
//points history


$orginlat=$rres['lat'];
$orginlng=$rres['lng'];

$desiglat=getuser('lat',$data->profileid);
$desiglng=getuser('lng',$data->profileid);

 $distance=getdistance($orginlat,$orginlng,$desiglat,$desiglng);

if(getuser('photo',$data->profileid)!=''){
 $pic=getuser('photo',$data->profileid); 
}
else
{
  $pic= nulltoempty(getuser('photo',$data->profileid));
}

    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "true", "error" => "false", 
	"id"=>$id,
	"name"=>nulltoempty(getuser('username',$data->profileid)),
	"gender" => nulltoempty(getuser('gender',$data->profileid)),
  "age"=>nulltoempty(getuser('age',$data->profileid)),
	"aboutme"=>nulltoempty(getuser('about',$data->profileid)),
  "interest"=>nulltoempty(getuser('interest',$data->profileid)),
  "works_at"=>nulltoempty(getuser('works_at',$data->profileid)),
  "location"=>nulltoempty($distance),
  "profilepic"=>$pic,
  "city"=>nulltoempty(getuser('city',$data->profileid)),
	));
	
	

}
else
{
  // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "false", "error" => "true", "message" => "Not sufficent points"));
  
}
}
else
{
  // set response code - 400 bad request
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("success" => "false", "error" => "true", "message" => "Invalid Token"));
	
}
?>

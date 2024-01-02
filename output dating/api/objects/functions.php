<?php

include_once '../config/database.php';
 
 
$database = new Database();
$db = $database->getConnection();


function getdistance($orginlat,$orginlng,$desiglat,$desiglng){
    $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$desiglat.','.$desiglng.'&destinations='.$orginlat.','.$orginlng.'&key=AIzaSyBQH1iW-UYRzNk535j-mwb4bg8PmrheIig&mode=driving';
$crl = curl_init();

curl_setopt($crl, CURLOPT_URL, $url);
curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($crl);
 $data = json_decode($response);

$distance=$data->rows[0]->elements[0]->distance->text;

//echo $data['stdClass']['rows']['0']['elements']['0']['distance']['text'];
$duration=$data->rows[0]->elements[0]->duration->text;

if(!$response){
die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));


}
$res=$distance;

return $res;
curl_close($crl);   

}
function timedifference($fromtime,$totime){
    $time1 = $fromtime;
$time2 = $totime;
$timediff = $time1->diff($time2);

if($timediff->h!='0') {
$res=$timediff->h.' hr '.$timediff->i.' min '.$timediff->s.' sec';  
}
elseif($timediff->i!='0') {
$res=$timediff->i.' min '.$timediff->s.' sec';  
}
else{
$res=$timediff->s.' sec';   
}

return $res;
}

function getage($a)
{
   $bday = new DateTime($a); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
// printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
// printf("\n");
return $diff->y; 
}
function nulltoempty($a)
{
  if(is_null($a))
  {
     $res=''; 
      return $res;
  }
 return $a;
}


function getcustomer($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `register` WHERE `username`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}
function getsubscription($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `subscription` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function getuser($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `register` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function getadminuser($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `users` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

?>
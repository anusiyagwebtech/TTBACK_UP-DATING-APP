<?php
include_once 'config/notification.php';


$messagenoti ="sendnotification1 request";
$message ="sendnotification1 request";

$title ="sendnotification1 request";    

$fcmUrl = 'https://fcm.googleapis.com/fcm/send';

$notification = [
'title' =>$title,
'body' => "sendnotification1 request",
'icon' =>'myIcon',
'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
'sound' => 'mySound'
];
$extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
$devicekey='fYH9qDoYOCU:APA91bEifUP2r6QnCjEH8N9K5Vz-mC6v5ZLxrAJDaUulE9UOuZoZgRIw3m_dma8CV83PF7-Ne6EIW9v6bNhFBhzaxXXqN9nsAkejDCZss0w3qlU0eBzEwF1BlhWLNetI7-KM9gUEPT5b';
$fcmNotification = [
//'registration_ids' => $tokenList, //multple token array
'to' => $devicekey, //single token
'notification' => $notification,
'data' => $extraNotificationData
];
$subadminkey='AAAAeKVPWfs:APA91bGfLdoLJhZoc7bMANDZQ4r41-x-lkMTZ6h6IpzhWQ2FW1MQWYnMquCjIUUdOTCWYRQAYlrkgj2rHADB5mgKNK9TMFVCYmodPe7CFNORr1ERzPgLTovJEAKFqaUP9My8hNBLKIYY';
$headers = [
'Authorization: key=' . $subadminkey,
'Content-Type: application/json'
];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$fcmUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
$result = curl_exec($ch);
curl_close($ch);

$resultjson = json_decode($result, true);
print_r($resultjson);

?>
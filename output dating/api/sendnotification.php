<?php
//API URL of FCM
$url = 'https://fcm.googleapis.com/fcm/send';

/*api_key available in:
Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/ 
$api_key = 'AAAAeKVPWfs:APA91bGMFe9vJH6sw7fH83ZP-y6kdMzcFWVcNwFfB8Gu_liq7vWsq28wIcTvqUF2qJAP0JmAIK2Y69kF1r5S7AVaLWhJrjQI9xdeQ9z1b32ZMP6GUZZXgswLpDItBJ7NVt28wM2UD1zY';

$device_id = 'd_i9_erxQhGZko5ixnqerN:APA91bGLnYiINN0Iy9nplodlqPTjq_d2J2Gstzv7ak6aF-GCNZ2IHcTgogdEBtCGT6FlagykgZdkmiax3Tktlm0nbhQuvajSvrOs1VkkNEtvEjfbcUfmA277L22gDl4K8RtBfzU4FIut';

$fields = array (
    'registration_ids' => array (
            $device_id
    ),
    'notification' => array (
        "title" => "sendnotification request",
        "body" => "sendnotification request"
    )
);
//header includes Content type and api key
$headers = array(
'Content-Type:application/json',
'Authorization:key='.$api_key
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
print_r($result);
?>
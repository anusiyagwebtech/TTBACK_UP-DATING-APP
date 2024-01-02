<?php
  include_once 'objects/notification.php';
  // Notification 
$notification = new Notification();
$message="Test message from RJPM-Ride";
$messagenoti="Test message from RJPM-Ride";
						$title = 'RJPM-Ride : Test Title';

						//$imageUrl = isset($_POST['image_url'])?$_POST['image_url']:'';
						$imageUrl = '';
						//$action = isset($_POST['action'])?$_POST['action']:'';
						$action ='';
						//$actionDestination = isset($_POST['action_destination'])?$_POST['action_destination']:'';
	                    $actionDestination='';
						if($actionDestination ==''){
							$action = '';
						}
						$notification->setTitle($title);
						$notification->setMessage($messagenoti);
						$notification->setImage($imageUrl);
						$notification->setAction($action);
						$notification->setActionDestination($actionDestination);
						
					$firebase_token ='fYH9qDoYOCU:APA91bEifUP2r6QnCjEH8N9K5Vz-mC6v5ZLxrAJDaUulE9UOuZoZgRIw3m_dma8CV83PF7-Ne6EIW9v6bNhFBhzaxXXqN9nsAkejDCZss0w3qlU0eBzEwF1BlhWLNetI7-KM9gUEPT5b';
				 $firebase_api ='AAAAeKVPWfs:APA91bGfLdoLJhZoc7bMANDZQ4r41-x-lkMTZ6h6IpzhWQ2FW1MQWYnMquCjIUUdOTCWYRQAYlrkgj2rHADB5mgKNK9TMFVCYmodPe7CFNORr1ERzPgLTovJEAKFqaUP9My8hNBLKIYY';
						
					//	$topic = $_POST['topic'];
						
						$requestData = $notification->getNotificatin();
						
				// 		if($_POST['send_to']=='topic'){
				// 			$fields = array(
				// 				'to' => '/topics/' . $topic,
				// 				'data' => $requestData,
				// 			);
							
				// 		}else{
							
							$fields = array(
								'to' => $firebase_token,
								'data' => $requestData,
							);
					//	}
		
		
						// Set POST variables
						$url = 'https://fcm.googleapis.com/fcm/send';
 
						$headers = array(
							'Authorization: key=' . $firebase_api,
							'Content-Type: application/json'
						);
						
						// Open connection
						$ch = curl_init();
 
						// Set the url, number of POST vars, POST data
						curl_setopt($ch, CURLOPT_URL, $url);
 
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
						// Disabling SSL Certificate support temporarily
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
						// Execute post
						$result = curl_exec($ch);
						if($result === FALSE){
							die('Curl failed: ' . curl_error($ch));
						}
 
						// Close connection
						
						
						curl_close($ch);
						
				$resultjson = json_decode($result, true);
			
			print_r($resultjson);
?>
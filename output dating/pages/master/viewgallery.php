<?php
include ('../../config/config.inc.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body bgcolor="silver">
<?php
global $db;
$user_edit_id = $_REQUEST['user_edit_id'];
// echo $user_edit_id;
$message1 = $db->prepare("SELECT * FROM `gallery` WHERE `userid`='".$user_edit_id."'");
    $message1->execute();
    $i=1;
    $part_amnt = 0;
    while($message = $message1->fetch(PDO::FETCH_ASSOC)) 
    {
    	//echo "asd";
?>
<div class="gallery">
  <a target="_blank" href="">
    <img src="<?php echo $message['gallery']; ?>" alt="Cinque Terre" width="600" height="400">
  </a>
  <?php //echo $message['gallery']; ?>
</div>
<?php
}
?>

</body>
</html>



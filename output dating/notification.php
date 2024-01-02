<?php  include ('config/config.inc.php');

 $stmt=$db->prepare("SELECT * FROM `notification` WHERE `reply`='0' ");
 $stmt->execute();
 $cnt=$stmt->rowCount();

echo $cnt;   

?>
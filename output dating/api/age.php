<?php
$bday = new DateTime('03.03.2014'); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
 printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
// printf("\n");
//echo $diff->y;
?>
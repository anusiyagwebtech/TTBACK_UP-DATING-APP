<?php
/////////////brand - add - edit - delete
// error_reporting(1);
// ini_set('display_errors','1');
// error_reporting(E_ALL);
function getsubscription($a, $b) {
global $db;
$get1 = $db->prepare("SELECT * FROM subscription WHERE id=?");
$get1->execute(array($b));
$get = $get1->fetch(PDO::FETCH_ASSOC);
$res = $get[$a];
return $res;
}
//////bANNER//////
function delsubscription($a) {
$b = str_replace(".", ",", $a);
$b = explode(",", $b);
foreach ($b as $c) {
global $db;
$get = $db->prepare("DELETE FROM subscription WHERE id = ? ");
$get->execute(array($c));
}
$res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
return $res;
}
//add notification start
function addsubscription($name,$desc,$amount,$validity,$status,$getid)
{
global $db;
if ($getid == '')
{


$resa = $db->prepare("INSERT INTO subscription (`name`,`desc`,`amount`,`validity`,`status`) VALUES (?,?,?,?,?)");
$resa->execute(array($name,$desc,$amount,$validity,$status));
$res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';

}
else
{

$resa = $db->prepare("UPDATE subscription SET `name`=?,`desc`=?,`amount`=?,`validity`=?,`status`=? WHERE id=?");
$resa->execute(array($name,$desc,$amount,$validity,$status,$getid));


$res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';



}
return $res;
}
//add notification end

function addusers($username,$gender,$age,$dob,$about,$interest,$relationship_goal,$life_style,$job,$location,$lat,$lng,$photo,$city,$state,$country,$status,$getid)
{
global $db;
if ($getid == '')
{
$link22 = FETCH_all("SELECT * FROM driver WHERE name=?", $name);
if ($link22['name'] == '')
{
$token=md5(uniqid(rand()));
$resa = $db->prepare("INSERT INTO driver (token,name,emailid,mobileno,username,password,address,status) VALUES (?,?,?,?,?,?,?,?)");
$resa->execute(array($token,$name,$emailid,$mobileno,$username,$password,$address,$status));
$res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
}
else
{
$res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Driver Name already exists!</h4></div>';
}
}
else
{

$resa = $db->prepare("UPDATE register SET username=?,gender=?,age=?,dob=?,about=?,interest=?,relationship_goal=?,life_style=?,job=?,location=?,lat=?,lng=?,photo=?,city=?,state=?,country=?,status=? WHERE id=?");
$resa->execute(array(trim($username),trim($gender),trim($age),trim($dob),trim($about),trim($interest),trim($relationship_goal),trim($life_style),trim($job),trim($location),trim($lat),trim($lng),trim($works_at),trim($city),trim($state),trim($country),trim($status),$getid));


$res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';



}
return $res;
}
function getdriver($a, $b) {
global $db;
$get1 = $db->prepare("SELECT * FROM driver WHERE id=?");
$get1->execute(array($b));
$get = $get1->fetch(PDO::FETCH_ASSOC);
$res = $get[$a];
return $res;
}
//get notification start
function get_notification($a, $b) {
global $db;
$get1 = $db->prepare("SELECT * FROM push_notification_tbl WHERE id=?");
$get1->execute(array($b));
$get = $get1->fetch(PDO::FETCH_ASSOC);
$res = $get[$a];
return $res;
}
//get notification end

////////get users start
function getuserss($a, $b) {
global $db;
$get1 = $db->prepare("SELECT * FROM register WHERE id=?");
$get1->execute(array($b));
$get = $get1->fetch(PDO::FETCH_ASSOC);
$res = $get[$a];
return $res;
}
////////get users end
function getorder($a, $b) {
global $db;
$get1 = $db->prepare("SELECT * FROM orders WHERE id=?");
$get1->execute(array($b));
$get = $get1->fetch(PDO::FETCH_ASSOC);
$res = $get[$a];
return $res;
}

//////bANNER//////
function delhelp($a) {
$b = str_replace(".", ",", $a);
$b = explode(",", $b);
foreach ($b as $c) {
global $db;
$get = $db->prepare("DELETE FROM faq WHERE id = ? ");
$get->execute(array($c));
}
$res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
return $res;
}


function addhelp($question,$answer,$status,$getid)
{
global $db;
if ($getid == '')
{
$link22 = FETCH_all("SELECT * FROM faq WHERE question=?", $question);
if ($link22['question'] == '')
{

$resa = $db->prepare("INSERT INTO faq ( question,answer,status) VALUES(?,?,?)");
$resa->execute(array($question,$answer,$status));
$res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
}
else
{
$res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Question already exists!</h4></div>';
}
}
else
{
$link22 = FETCH_all("SELECT * FROM faq WHERE question=? AND id!=?", $question,$getid);
if ($link22['question'] == '')
{
$resa = $db->prepare("UPDATE faq SET question=?,answer=?,status=? WHERE id=?");
$resa->execute(array(trim($question),trim($answer),trim($status), $getid));


$res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';

}
else
{
$res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Question already exists!</h4></div>';
}
}
return $res;
}
function gethelp($a, $b) {
global $db;
$get1 = $db->prepare("SELECT * FROM faq WHERE id=?");
$get1->execute(array($b));
$get = $get1->fetch(PDO::FETCH_ASSOC);
$res = $get[$a];
return $res;
}


///////////////Register//////////////
function getcustomer($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `customer` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function delcustomer($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `customer` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

function addregister($name,$mobileno,$email,$address,$token,$device_key,$password,$new_password,$country,$state,$district,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {
             $link22 = FETCH_all("SELECT * FROM `register` WHERE `name`=? AND `address`=? ", $name,$address);
             if ($link22['id'] == '') 
             {

            $resa = $db->prepare("INSERT INTO `register` ( `name`,`mobileno`,`email`,`address`,`token`,`device_key`,`password`,`new_password`,`country`,`state`,`district`,`status`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");

            $resa->execute(array($name,$mobileno,$email,$address,$token,$device_key,$password,$new_password,$country,$state,$district,$status));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
       
        $link22 = FETCH_all("SELECT * FROM `register` WHERE `name`=? AND `address`=? AND `id`!=?", $name,$address,$getid);
             if ($link22['id'] == '') 
             {
           $resa = $db->prepare("UPDATE `register` SET `name`=?,`mobileno`=?,`email`=?,`address`=?,`token`=?,`device_key`=?,`password`=?,`new_password`=?,`country`=?,`state`=?,`district`=?,`status`=?,`date`=? WHERE `id`=?");
           $resa->execute(array(trim($name),trim($mobileno),trim($email),trim($address),trim($token),trim($device_key),trim($password),trim($new_password),trim($country),trim($state),trim($district),trim($status),trim($date),$getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
        
    }
    return $res;
}

/////////////End//////////////////////

////////////Product//////////////////
function getproduct($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `products` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function delproduct($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `products` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

function addproduct($name,$filename1,$rate_per_kg,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {

             $link22 = FETCH_all("SELECT * FROM `products` WHERE `productname_e`=? ", $name);
             if ($link22['id'] == '') 
             {

            $resa = $db->prepare("INSERT INTO `products` (`productname_e`,`image`,`rate_per_kg`,`status`) VALUES(?,?,?,?)");

            $resa->execute(array($name,$filename1,$rate_per_kg,$status));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Product Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
        
       
        $link22 = FETCH_all("SELECT * FROM `products` WHERE `productname_e`=? AND `id`!=?", $name,$getid);
             if ($link22['id'] == '') 
             {
           $resa = $db->prepare("UPDATE `products` SET `rate_per_kg`=?,`productname_e`=?,`image`=?,`status`=? WHERE `id`=?");

           $resa->execute(array($rate_per_kg,$name,$filename1,$status,$getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Product Name already exists!</h4></div>';
             }
        
    }
    return $res;
}

function Imageuploadd($fileName, $Size, $maxW, $fullPath, $relPath, $colorR, $colorG, $colorB, $maxH, $file, $tmpname) {

    $folder = $relPath;
//$maxlimit = $maxSize;
    $allowed_ext = "jpg,jpeg,gif,png,bmp";
    $match = "";

    if ($Size > 0) {
        $filename = strtolower($fileName);
        $filename = preg_replace('/\s/', '_', $filename);
        if ($Size < 1) {
            $errorList[] = "File size is empty.";
        }
        /* if($filesize > $maxlimit){ 
          $errorList[] = "File size is too big.";
          } */
        if (count($errorList) < 1) {
            $file_ext = preg_split("/\./", $filename);
            $allowed_ext = preg_split("/\,/", $allowed_ext);
            foreach ($allowed_ext as $ext) {
                if ($ext == end($file_ext)) {
                    $match = "1"; // File is allowed
                    $NUM = time();
                    $front_name = substr($file_ext[0], 0, 15);
                    $newfilename = $file . "." . end($file_ext);
                    $filetype = end($file_ext);
                    $save = $folder . $newfilename;
                    if (!file_exists($save)) {
                        list($width_orig, $height_orig) = getimagesize($tmpname);
                        $width_orig . "-" . $height_orig;
                        if ($maxH == null) {
                            if ($width_orig < $maxW) {
                                $fwidth = $width_orig;
                            } else {
                                $fwidth = $maxW;
                            }
                            $ratio_orig = $width_orig / $height_orig;
                            $fheight = $fwidth / $ratio_orig;

                            $blank_height = $fheight;
                            $top_offset = 0;
                        } else {
                            if ($width_orig <= $maxW && $height_orig <= $maxH) {
                                $fheight = $height_orig;
                                $fwidth = $width_orig;
                            } else {
                                if ($width_orig > $maxW) {
                                    $ratio = ($width_orig / $maxW);
                                    $fwidth = $maxW;
                                    $fheight = ($height_orig / $ratio);
                                    if ($fheight > $maxH) {
                                        $ratio = ($fheight / $maxH);
                                        $fheight = $maxH;
                                        $fwidth = ($fwidth / $ratio);
                                    }
                                }
                                if ($height_orig > $maxH) {
                                    $ratio = ($height_orig / $maxH);
                                    $fheight = $maxH;
                                    $fwidth = ($width_orig / $ratio);
                                    if ($fwidth > $maxW) {
                                        $ratio = ($fwidth / $maxW);
                                        $fwidth = $maxW;
                                        $fheight = ($fheight / $ratio);
                                    }
                                }
                            }
                            if ($fheight == 0 || $fwidth == 0 || $height_orig == 0 || $width_orig == 0) {
                                die("FATAL ERROR REPORT ERROR CODE [add-pic-line-67-orig] to <a href='https://www.nbaysmart.com/'>NBAYSMART</a>");
                            }
                            if ($fheight < 45) {
                                $blank_height = 45;
                                $top_offset = round(($blank_height - $fheight) / 2);
                            } else {
                                $blank_height = $fheight;
                            }
                        }
                        $imaall_p = imagecreatetruecolor($fwidth, $blank_height);
                        $white = imagecolorallocate($imaall_p, $colorR, $colorG, $colorB);
                        imagefill($imaall_p, 0, 0, $white);
                        switch ($filetype) {
                            case "gif":
                                $image = @imagecreatefromgif($tmpname);
                                break;
                            case "jpg":
                                $image = @imagecreatefromjpeg($tmpname);
                                break;
                            case "jpeg":
                                $image = @imagecreatefromjpeg($tmpname);
                                break;
                            case "png":
                                $image = @imagecreatefrompng($tmpname);
                                break;
                        }
                        @imagecopyresampled($imaall_p, $image, 0, $top_offset, 0, 0, $fwidth, $fheight, $width_orig, $height_orig);
                        $black = imagecolorallocatealpha($imaall_p, 158, 155, 159, 70);
                        $font = '../monofont.ttf';
                        $font_size = 15;
                        imagettftext($imaall_p, $font_size, 0, 10, 90, $black, $font, $WaterMarkText);

                        switch ($filetype) {
                            case "gif":
                                if (!@imagegif($imaall_p, $save)) {
                                    $errorList[] = "PERMISSION DENIED [GIF]";
                                }
                                break;
                            case "jpg":
                                if (!@imagejpeg($imaall_p, $save, 100)) {
                                    $errorList[] = "PERMISSION DENIED [JPG]";
                                }
                                break;
                            case "jpeg":
                                if (!@imagejpeg($imaall_p, $save, 100)) {
                                    $errorList[] = "PERMISSION DENIED [JPEG]";
                                }
                                break;
                            case "png":
                                if (!@imagepng($imaall_p, $save, 0)) {
                                    $errorList[] = "PERMISSION DENIED [PNG]";
                                }
                                break;
                        }
                        @imagedestroy($filename);
                    } else {
                        $errorList[] = "CANNOT MAKE IMAGE IT ALREADY EXISTS";
                    }
                }
            }
        }
    } else {
        $errorList[] = "NO FILE SELECTED";
    }
    if (!$match) {
        $errorList[] = "File type isn't allowed: $filename";
    }
    if (sizeof($errorList) == 0) {
        return $fullPath . $newfilename;
    } else {
        $eMessage = array();
        for ($x = 0; $x < sizeof($errorList); $x++) {
            $eMessage[] = $errorList[$x];
        }
        return $eMessage;
    }
}




////////////End////////////////////

////////////Vendor//////////////


function delvendor($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `vendor` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

function addvendor($name,$address_line1,$address_line2,$poc,$mobile,$token,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {
             $link22 = FETCH_all("SELECT * FROM `vendor` WHERE `name`=? AND `mobile`=? ", $name,$mobile);
             if ($link22['id'] == '') 
             {


            $resa = $db->prepare("INSERT INTO `vendor` (`name`,`address_line1`,`address_line2`,`poc`,`mobile`,`token`,`status`) VALUES(?,?,?,?,?,?,?)");


            $resa->execute(array($name,$address_line1,$address_line2,$poc,$mobile,$token,$status));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
       
        $link22 = FETCH_all("SELECT * FROM `vendor` WHERE `name`=? AND `address_line1`=? AND `id`!=?", $name,$address_line1,$getid);
             if ($link22['id'] == '') 
             {
           $resa = $db->prepare("UPDATE `vendor` SET `name`=?,`address_line1`=?,`address_line2`=?,`poc`=?,`mobile`=?,`token`=?,`status`=? WHERE `id`=?");
           $resa->execute(array(trim($name),trim($address_line1),trim($address_line2),trim($poc),trim($mobile),trim($token),trim($status),$getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
        
    }
    return $res;
}



//////////End//////////////////////
////////////Complaint///////////////
function getcomplaint($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `complaint` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function delcomplaint($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `complaint` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

function addcomplaint($type,$image,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {
             $link22 = FETCH_all("SELECT * FROM `complaint` WHERE `type`=?", $type);
             if ($link22['id'] == '') 
             {

            $resa = $db->prepare("INSERT INTO `complaint` (`type`,`image`,`status`) VALUES(?,?,?)");

            $resa->execute(array($type,$image,$status));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
       
        $link22 = FETCH_all("SELECT * FROM `complaint` WHERE `type`=? AND `status`=? AND `id`!=?", $type,$status,$getid);
             if ($link22['id'] == '') 
             {
           $resa = $db->prepare("UPDATE `complaint` SET `type`=?,`status`=? WHERE `id`=?");
           $resa->execute(array(trim($type),trim($image),trim($status),$getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
        
    }
    return $res;
}


///////////End////////////////////

//////////Category///////////////
function getcategory($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `category` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function delcategory($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `category` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

function addcategory($category,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {
             $link22 = FETCH_all("SELECT * FROM `category` WHERE `category`=?", $category);
             if ($link22['id'] == '') 
             {

            $resa = $db->prepare("INSERT INTO `category` (`category`,`status`) VALUES(?,?)");

            $resa->execute(array($category,$status));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Category Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
       
        $link22 = FETCH_all("SELECT * FROM `category` WHERE `category`=? AND `status`=? AND `id`!=?", $category,$status,$getid);
             if ($link22['id'] == '') 
             {
           $resa = $db->prepare("UPDATE `category` SET `category`=?,`status`=? WHERE `id`=?");
           $resa->execute(array(trim($category),trim($status),$getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Model Name already exists!</h4></div>';
             }
        
    }
    return $res;
}



/////////End///////////////////

//////////Setting////////////////
function getsetting($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `users` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function delsetting($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `setting` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

function addsetting($ads_increase_point,$profile_reduce_point,$getid)
{
    global $db;
 $resa = $db->prepare("UPDATE `users` SET `ads_increase_point`=?,`profile_reduce_point`=? WHERE `id`=?");
           $resa->execute(array(trim($ads_increase_point),trim($profile_reduce_point),$getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
              
  return $res;
}



//////////End////////////////////

/////////////complaints - add - edit - delete

function addcomplaints($c_type,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {
           $link22 = FETCH_all("SELECT * FROM `complaints` WHERE `type`=? ", $c_type);
             if ($link22['id'] == '') 
             {

            $resa = $db->prepare("INSERT INTO `complaints` (`type`,`status`) VALUES(?,?)");
            $resa->execute(array($c_name,$status));
           
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
               else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Complaint Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
       
        $link22 = FETCH_all("SELECT * FROM `complaints` WHERE `type`=? AND `id`!=''", $c_type,$getid);
             if ($link22['id'] == '') 
             {
            $resa = $db->prepare("UPDATE `complaints` SET `type`=?,`status`=? WHERE `id`=?");
            $resa->execute(array(trim($c_type),trim($status), $getid));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
               else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Complaint Name already exists!</h4></div>';
             }
        
    }
    return $res;
}
function getcomplaints($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `complaints` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}
/////////////complaints - add - edit - delete


/////////////service - add - edit - delete
function addservices($s_type,$c_name,$status,$getid) 
{
    global $db;
    if ($getid == '')
    {
             $link22 = FETCH_all("SELECT * FROM `services` WHERE `type`=? AND `name`=? ", $s_type,$c_name);
             if ($link22['id'] == '') 
             {

            $resa = $db->prepare("INSERT INTO `services` ( `type`,`name`,`status`) VALUES(?,?,?)");
            $resa->execute(array($s_type,$c_name,$status));
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Service Name already exists!</h4></div>';
             }
      
    } 
    else 
    {
       
        $link22 = FETCH_all("SELECT * FROM `services` WHERE `type`=? AND `name`=? AND `id`!=?", $s_type,$c_name,$getid);
             if ($link22['id'] == '') 
             {
           $resa = $db->prepare("UPDATE `services` SET `type`=?,`name`=?,`status`=? WHERE `id`=?");
           $resa->execute(array(trim($s_type),trim($c_name),trim($status), $getid));
           
            $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i>Successfully Updated</h4></div>';
             }
             else
             {
                  $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i>Service Name already exists!</h4></div>';
             }
        
    }
    return $res;
}

function getservices($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `services` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}
function delservices($a) {
    $b = str_replace(".", ",", $a);
    $b = explode(",", $b);
    foreach ($b as $c) {
        global $db;
        $get = $db->prepare("DELETE FROM `services` WHERE `id` = ? ");
        $get->execute(array($c));
    }
    $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-close"></i> Successfully Deleted!</h4></div>';
    return $res;
}

/////////////service - add - edit - delete

function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function getusers($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `users` WHERE `id`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function LoginCheck($a = '', $b = '', $c = '', $d = '', $e = '') {

    global $db;
    if (($a == '') || ($b == '')) {
        $res = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><i class="icon fa fa-close"></i>Email or Password was empty</div>';
    } else {
        if ($e == '') {
            $stmt = $db->prepare("SELECT * FROM `users` WHERE `val1`=? AND `val3`=?");
            $stmt->execute(array($a, 1));
            $ress = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($ress['id'] != '') {
                if ($ress['val2'] == md5($b)) {
                    $res = "Hurray! You will redirect into dashboard soon";
                    $_SESSION['GRUID'] = $ress['id'];
                    $_SESSION['Gpassword'] = $ress['orgpassword'];
                    $_SESSION['policestation'] = $ress['policestation'];
                    $_SESSION['type'] = 'admin';
                     $_SESSION['usertype'] = $ress['type'];
                     $_SESSION['usertypeid'] = $ress['typeid'];
                    @extract($ress);
                    if ($id != '') {
                        $e = date('Y-m-d H:i:s');
                        $sql = 'INSERT INTO `admin_history`(admin_uid,ip,checkintime) VALUES(?,?,?)';
                        $stmt1 = $db->prepare($sql);
                        $stmt1->execute(array($id, $c, $e));
                        $_SESSION['admhistoryid'] = $db->lastInsertId();
                        if ($d == '1') {
                            //if rememberme checkbox checked
                            setcookie('lemail', $a, time() + (60 * 60 * 24 * 10)); //Means 10 days change value of 10 to how many days as you want to remember the user details on user's computer
                            setcookie('lpass', $b, time() + (60 * 60 * 24 * 10));  //Here two coockies created with username and password as cookie names, $username,$password (login crediantials) as corresponding values
                        }
                    }
                } elseif ($ress['val3'] == 0) {
                    $res = '<div class="alert alert-danger alert-dismissible" id="hideDiv" style="font-size:14px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><i class="icon fa fa-close"></i> Your Account was deactivated by Admin</div>';
                } else {
                    $res = '<div class="alert alert-danger alert-dismissible" id="hideDiv" style="font-size:14px;"><i class="icon fa fa-close"></i> User name or Password was Incorrect</div>';
                }
            } 
            else
            {
               $res = '<div class="alert alert-danger alert-dismissible" id="hideDiv" style="font-size:14px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><i class="icon fa fa-close"></i> Your Account was deactivated by Admin</div>';  
            }
            return $res;
        }
    }
}



function logout() {
    global $db;
    $sql = $db->prepare("UPDATE `admin_history` SET `checkouttime`='" . date('Y-m-d H:i:s') . "' WHERE `id`=?");
    $sql->execute(array($_SESSION['admhistoryid']));
    // DB("UPDATE `admin_history` SET `checkouttime`='" . date('Y-m-d H:i:s') . "' WHERE `id`='" . $_SESSION['admhistoryid'] . "'");
}

function companylogos($a) {
    //$getlogo = mysql_fetch_array(mysql_query("SELECT `image` FROM `profile_area` WHERE `pid`='" . $a . "'"));
    global $db;
    $getlogo1 = $db->prepare("SELECT `image` FROM `profile_area` WHERE `pid`=?");
    $getlogo1->execute(array($a));
    $getlogo = $getlogo1->fetch(PDO::FETCH_ASSOC);
    if ($getlogo['image'] != '') {
        $res = $getlogo['image'];
    } else {
        $res = $sitename . 'data/profile/logo.png';
    }
    return $res;
}

function addprofile($tax,$title, $firstname, $lastname, $image, $cmpnyname, $recoveryemail, $phonenumber,$mail_option, $caddress, $abn, $ip,$bank_name,$branch_name,$account_name,$account_no,$ifsc_code,$swift_code,$branch_address, $id) {
    global $db;
    if ($id == '') {
        $resa = $db->prepare("INSERT INTO `manageprofile` (`tax`,`title`,`firstname`,`lastname`,`image`,`Company_name`,`recoveryemail`,`phonenumber`,`caddress`,`abn`,`ip`,`mail`,`bank_name`,`branch_name`,`account_name`,`account_no`,`ifsc_code`,`swift_code`,`branch_address`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $resa->execute(array($tax,$title, $firstname, $lastname, $image, $cmpnyname, $recoveryemail, $phonenumber, $caddress, $abn, $ip,$mail_option,$bank_name,$branch_name,$account_name,$account_no,$ifsc_code,$swift_code,$branch_address));
        $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i>Successfully Inserted</h4></div>';
    } else {
        
        $resa = $db->prepare("UPDATE `manageprofile` SET `tax`=?,`title`=?,`firstname`=?,`lastname`=?,`image`=?,`Company_name`=?,`recoveryemail`=?,`phonenumber`=?,`caddress`=?,`abn`=?,`ip`=?,`mail`=?,`bank_name`=?,`branch_name`=?,`account_name`=?,`account_no`=?,`ifsc_code`=?,`swift_code`=?,`branch_address`=? WHERE `pid`=?");
        $resa->execute(array($tax,$title, $firstname, $lastname, $image, $cmpnyname, $recoveryemail, $phonenumber, $caddress, $abn, $ip,$mail_option,$bank_name,$branch_name,$account_name,$account_no,$ifsc_code,$swift_code,$branch_address, $id));
        $res = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><h4><i class="icon fa fa-check"></i> Successfully Updated</h4></div>';
    }

    return $res;
}

function getprofile($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `manageprofile` WHERE `pid`=?");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}


function compress_image($destination_url, $quality) {

    $info = getimagesize($destination_url);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($destination_url);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($destination_url);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($destination_url);

    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
}

?>
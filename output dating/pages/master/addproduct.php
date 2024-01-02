<?php
$menu = "4";
$thispageid = 17;
$franchisee = 'yes';
include ('../../config/config.inc.php');
include ('../../require/header.php');
// error_reporting(1);
// ini_set('display_errors','1');
// error_reporting(E_ALL);

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['banid'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $pimage = getproduct('image', $_REQUEST['banid']);
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0)
    {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename1 = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        if(in_array($filetype, $allowed))
        {
                move_uploaded_file($_FILES["image"]["tmp_name"], $filename . "../../images/product/" . $filename1);
                echo "Your file was uploaded successfully.";
    
        } 
        else
        {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } 
    else {
        $filename1 = $pimage;
    }
    
    
    $msg = addproduct($name,$filename1,$rate_per_kg,$status,$getid);
   
}

?>
<script type="text/javascript">
 
    function deleteimage(a, b, c, d, e, f) {

        $.ajax({
            type: "POST",
            url: "<?php echo $sitename; ?>config/functions_ajax.php",
            data: {image: a, id: b, table: c, path: d, images: e, pid: f},
            success: function (data) {
               // alert(data);   
                $('#delimage').html(data);
            }

        });

    }
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <a href="<?php echo $sitename; ?>master/product.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['banid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Product</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Products List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['banid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Product</li>
                    </ol>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

<!-- <p class="text-muted m-b-30 font-13">
    Use the button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.
</p> -->
                        <div class="row">
                            <div class="col-md-12">
                            <?php echo $msg; ?>

                                <form method="post" autocomplete="off" enctype="multipart/form-data" action="">
                                    <div class="box box-info">
                                        <div class="box-header with-border">

  <span style="float:right; font-size:13px; color: #333333; text-align: right; padding: 8px;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory<br></span> 
  <br>
                                        </div>
                                        <div class="box-body">
                                            <br>
                                        <?php //echo $msg; ?>
              
              
                          <div class="row">
                              <div class="col-md-6">
                            <label>Product Name<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="name" placeholder="Enter Name"  id="brand_name" class="form-control" value="<?php echo getproduct('productname_e', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
						  <div class="col-md-6">
                            <label>Rate Per Kg<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="rate_per_kg" placeholder="Enter Name"  id="brand_name" class="form-control" value="<?php echo getproduct('rate_per_kg', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                            
                  </div>
                  <br>  
                            <div class="row">
                           <div class="col-md-6">
                            <label>Image <span style="color:#FF0000;"> *(Recommended Size 1349 Pixels Width and 500 Pixels Height)</span></label>
                           <input  type="file" value="<?php echo getproduct('image', $_REQUEST['banid']); ?>" name="image" class="form-control" >

                       </div>
              
                   <?php if (getproduct('image', $_REQUEST['banid']) != '') { ?>
                    <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                    <label> </label>
                    <img src="<?php echo $fsitename; ?>images/product/<?php echo getproduct('image', $_REQUEST['banid']); ?>" style="padding-bottom:10px;" height="100" />
                    <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo getproduct('image', $_REQUEST['banid']); ?>', '<?php echo $_REQUEST['banid']; ?>', 'products', '../images/product/', 'image', 'id');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                    </div>
                    <?php } ?>
                         </div>
                        <br>
                      <div class="row">
					  <div class="col-md-6">
                            <label>Status</label>
                          
                          <select name="status" class="form-control">
                         <option value="1" <?php if(getproduct('status', $_REQUEST['banid'])=='1') { ?> selected="selected"<?php } ?>>Active</option>      
                         <option value="0" <?php if(getproduct('status', $_REQUEST['banid'])=='0') { ?> selected="selected"<?php } ?>>Inactive</option>      
                          </select>
                      </div>
					  </div>
                      
                    <div class="row">
                        
                      <div class="col-md-6">
                          <br>
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:left;"><?php
                                if ($_REQUEST['banid'] != '') {
                                    echo 'UPDATE';
                                } else {
                                    echo 'SUBMIT';
                                }
                                ?></button>
                        </div>
              
                    </div>
                                            <br>
                         
               
                </div><!-- /.box-body -->
                <br><br>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/product.htm">Back to Listings page</a>
                        </div>
                       
                    </div>
                </div>
                    
                                    </div>  </form>
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 


    <!-- /.box -->
</div>
<!-- /.content -->
<!-- /.content-wrapper -->

<?php include ('../../require/footer.php'); ?>

<script>
    function getmanager(a)
    {
        $.ajax({
            url: "<?php echo $sitename; ?>ajaxfunction.php",
            data: {supervisor: a},
            success: function (data) {
              $("#manager").html(data);
            }
        });
    }
   
</script>  

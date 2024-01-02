		<?php
$menu = "10";
if (isset($_REQUEST['coid'])) {
    $thispageeditid = 47;
} else {
    $thispageaddid = 47;
}
$franchisee = 'yes';
include ('../../config/config.inc.php');
$dynamic = '1';
//ini_set('display_errors','1');
//error_reporting(E_ALL);
include ('../../require/header.php');
if (isset($_REQUEST['delete']) || isset($_REQUEST['delete_x'])) {
    $chk = $apid;
   
    $msg = delcustomer($chk);
     $_SESSION['msg']= $msg;
        header('Location:../regsiteruser.htm');
}


?>
<script type="text/javascript" >
   function checkdelete(name)
    {
        if (confirm("Do you want to delete the User"))
            {
                return true;
            }
            else
            {
                return false;
            }
   }
</script>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                
                     
                    <div class="btn-group pull-right m-t-15">
                       
                        <a href="<?php echo $sitename; ?>master/customers.htm"><button type="button" class="btn btn-default">Back</button>
                        </a>        
                    </div> 
                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['id'])) {
                            echo "View";
                        } else {
                            echo "Add";
                        }
                        ?> Details </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo $sitename; ?>"><?php echo getusers('name',$_SESSION['GRUID']); ?></a></li>
                       <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['id'])) {
                                echo "View";
                            } else {
                                echo "Add";
                            }
                            ?> Details </li>
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
                                <form name="department" id="department" action="#" method="post" enctype="multipart/form-data" autocomplete="off" >
                                    <div class="box box-info">
                                        <div class="box-body">
                                            
                                          <div class="row">
                                
                                   <div class="col-md-3">
                                       <label><strong>Name :</strong></label>
                                </div>
                                <div class="col-md-3">
                                   <?php echo getcustomer('name',$_REQUEST['id']); ?>
                                </div>
                                   <div class="col-md-3">
                                       <label><strong>Contact No :</strong></label>
                                </div>
                                <div class="col-md-3">
                                   <?php echo getcustomer('mobileno',$_REQUEST['id']); ?>
                                </div> 
                            </div>
                            <br />
                            
                                   <div class="row">
                                
                                   <div class="col-md-3">
                                       <label><strong>Mail Id :</strong></label>
                                </div>
                                <div class="col-md-3">
                                   <?php echo getcustomer('emailid',$_REQUEST['id']); ?>
                                </div>
								</div>
								<br>
								<div class="row">
                                   <div class="col-md-3">
                                       <label><strong>Address :</strong></label>
                                </div>
                                <div class="col-md-3">
                                   <?php echo getcustomer('address',$_REQUEST['id']); ?>
                                </div> 
                            </div>
                                 
                                            
                                           
                                        </div><!-- /.box-body -->

                                        <div class="box-footer">
										<br>
                                            <div class="row">
                                                <div class="col-md-6">
<!--                                                    <a href="<?php //echo $sitename.'master/registeruser.htm'; ?>">Back</a>-->
                                                </div>
                                                <!--                                                    <div class="col-md-6">
              <button type="submit" name="statusupdate" id="statusupdate" class="btn btn-success" style="float:right;">Update Status</button>
                                                                                                    </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>               
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                  
        </div> <!-- container -->
    </div> <!-- content -->


</div>
<?php include ('../../require/footer.php'); ?>

<script>
    function click1()
    {

        $('#demo').css("display", "block");

    }
</script>
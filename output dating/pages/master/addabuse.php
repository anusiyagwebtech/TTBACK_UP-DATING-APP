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
    
    $msg = addnotification($user_type,$notification_message,$status,$getid);
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
                    <div class="btn-group m-t-15">
                       
                        

                    </div>
                     <div class="btn-group pull-right m-t-15">
                        <a href="<?php echo $sitename; ?>master/notificationlist.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['banid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Notification</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Notification List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['banid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Notification</li>
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
              
                            <input type="hidden" id="user_edit_id" value="<?php echo $_REQUEST['banid']; ?>" name="">
                          <div class="row">
                        
						  <div class="col-md-2">
                            <label>User Type</label>
                         <select name="user_type" class="form-control">
                         <option value="all" <?php if(get_notification('user_type',$_REQUEST['banid'])=='all') { ?> selected="selected" <?php } ?>>All users</option>      
                         <option value="selected_users" <?php if(get_notification('user_type',$_REQUEST['banid'])=='selected_users') { ?> selected="selected" <?php } ?>>Selected Users</option>      
                          </select>
                            
                            
                          </div>

                           <div class="col-md-8">
                             <label>Notification</label>
            <textarea class="form-control" name="notification_message"><?php echo get_notification('notification_message',$_REQUEST['banid']); ?></textarea>
                           </div>
                       <div class="col-md-2">
                            <label>Status</label>
                         <select name="status" class="form-control">
                         <option value="active" <?php if(get_notification('status',$_REQUEST['banid'])=='active') { ?> selected="selected" <?php } ?>>Active</option>      
                         <option value="inactive" <?php if(get_notification('status',$_REQUEST['banid'])=='female') { ?> selected="selected" <?php } ?>>Inactive</option>      
                          </select>
                            
                            
                          </div>
						  </div>
						  <br>
						                  
                           <div class="row">
                            <div class="col-sm-6">
                                <label></label>
                            </div>
                           </div>
						  <br>
						                
                          
						
                  <br>  
                                

                          
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
                            <a href="<?php echo $sitename; ?>master/register.htm">Back to Listings page</a>
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
  ////////////
    function view_gallery() 
{
    var user_edit_id = $("#user_edit_id").val();
  window.open('../viewgallery.htm?user_edit_id='+user_edit_id,'popUpWindow','height=500,width=1200,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no, status=yes');
}
  //////////// 
</script>  

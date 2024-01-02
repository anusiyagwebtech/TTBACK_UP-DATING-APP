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
    
    $msg = addusers($username,$gender,$age,$dob,$about,$interest,$relationship_goal,$life_style,$job,$location,$lat,$lng,$photo,$city,$state,$country,$status,$getid);
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
                        <button onclick="view_gallery()" type="button" class="btn btn-default">View Gallery</button>
                        

                    </div>
                     <div class="btn-group pull-right m-t-15">
                        <a href="<?php echo $sitename; ?>master/register.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['banid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Users</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Users List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['banid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Users</li>
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
                              <div class="col-md-3">
                            <label>Users Name<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="username"   id="username" class="form-control" value="<?php echo getuserss('username', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
						  <div class="col-md-3">
                            <label>Gender</label>
                         <select name="gender" class="form-control">
                         <option value="male" <?php if(getuserss('gender',$_REQUEST['banid'])=='male') { ?> selected="selected" <?php } ?>>Male</option>      
                         <option value="female" <?php if(getuserss('gender',$_REQUEST['banid'])=='female') { ?> selected="selected" <?php } ?>>Female</option>      
                          </select>
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>Age</label>
                           <input type="text" name="age"   id="age" class="form-control" value="<?php echo getuserss('age', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>DOB</label>
                           <input type="text" name="dob"   id="dob" class="form-control" value="<?php echo getuserss('dob', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
						  </div>
						  <br>
						                  
                          <div class="row">
                              <div class="col-md-3">
                            <label>About<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="about"   id="about" class="form-control" value="<?php echo getuserss('about', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          <div class="col-md-3">
                            <label>Interest</label>
                           <input type="text" name="interest"   id="interest" class="form-control" value="<?php echo getuserss('interest', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>Relationship Goal</label>
                           <input type="text" name="relationship_goal"   id="relationship_goal" class="form-control" value="<?php echo getuserss('relationship_goal', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>Life Style</label>
                           <input type="text" name="life_style"   id="life_style" class="form-control" value="<?php echo getuserss('life_style', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          </div>
						  <br>
						                
                          <div class="row">
                              <div class="col-md-3">
                            <label>Job<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="job"   id="job" class="form-control" value="<?php echo getuserss('job', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          <div class="col-md-3">
                            <label>Location</label>
                           <input type="text" name="location"   id="location" class="form-control" value="<?php echo getuserss('location', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>latitude</label>
                           <input type="text" name="lat"   id="lat" class="form-control" value="<?php echo getuserss('lat', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>longitude</label>
                           <input type="text" name="lng"   id="lng" class="form-control" value="<?php echo getuserss('lng', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          </div>
						
                  <br>  
                                      
                          <div class="row">
                              
                          
                           <div class="col-md-3">
                            <label>Works At</label>
                           <input type="text" name="works_at"   id="works_at" class="form-control" value="<?php echo getuserss('works_at', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                           <div class="col-md-3">
                            <label>City</label>
                           <input type="text" name="city"   id="city" class="form-control" value="<?php echo getuserss('city', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          <div class="col-md-3">
                            <label>State<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="state"   id="state" class="form-control" value="<?php echo getuserss('state', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          <div class="col-md-3">
                            <label>Country</label>
                           <input type="text" name="country"   id="country" class="form-control" value="<?php echo getuserss('country', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                          <div class="col-md-3">
                            <label>Status</label>
                         <select name="status" class="form-control">
                         <option value="1" <?php if(getuserss('status',$_REQUEST['banid'])=='1') { ?> selected="selected" <?php } ?>>Unblock</option>      
                         <option value="0" <?php if(getuserss('status',$_REQUEST['banid'])=='0') { ?> selected="selected" <?php } ?>>Block</option>      
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

<?php
$dynamic = '1';
$menu = '1';
$index='1';
include ('config/config.inc.php');


include ('require/header.php');
//print_r($_SESSION);
$_SESSION['mobileno']='';
unset($_SESSION['mobileno']);

if($_SESSION['highrisk']!='unshow' && isset($_SESSION['doctorid']))
{
  $_SESSION['highrisk']='show';  
}


?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page-Title -->
      
            <div class="row">
                <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Welcome to <?php echo getusers('name',$_SESSION['GRUID']); ?>!</p>
                </div>
            </div>
			<div class="row">
			        <div class="col-md-6 col-lg-6 col-xl-4">
             
                   <a href="<?php echo $sitename; ?>master/register.htm?type=male">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-purple pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                             $stmt = $db->prepare("SELECT * FROM `register` WHERE `gender`='male' ");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Male users</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
					</a>
              
                </div>
				
        	  
				           <div class="col-md-6 col-lg-6 col-xl-4">
             
                    <a href="<?php echo $sitename; ?>master/register.htm?type=female">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-danger pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                             $stmt = $db->prepare("SELECT * FROM `register` WHERE `gender`='female'");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Female Users</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              </a>
                </div>

     <div class="col-md-6 col-lg-6 col-xl-4">
             
                         <a href="<?php echo $sitename; ?>master/register.htm">
                             
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-pink pull-left">
                            <i class="fa fa-calendar text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                                 <?php
                             $stmt = $db->prepare("SELECT * FROM `register`");
                                  
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">Total Users</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
                </div>
				
			
</div>			
<div class="row">
       <div class="col-md-6 col-lg-6 col-xl-4">
             
                   <a href="<?php echo $sitename; ?>master/abuse_list.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-warning pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                        $stmt = $db->prepare("SELECT * FROM `abuse_report_tbl`");
                                  
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Abuse Reports</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              </a>
                </div>
          <div class="col-md-6 col-lg-6 col-xl-4">
                   <a href="<?php echo $sitename; ?>master/register.htm?type=block">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-info pull-left">
                            <i class="typcn typcn-user-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                             $stmt = $db->prepare("SELECT * FROM `register` WHERE `status`=0");
                                  
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Blocked users</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                     <a href="<?php echo $sitename; ?>master/notificationlist.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-info pull-left">
                            <i class="typcn typcn-user-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
    $stmt = $db->prepare("SELECT * FROM `push_notification_tbl`");
                                  
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Notifications</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
                </div>
           
                                     
</div>
	<?php include 'require/footer.php'; ?>      
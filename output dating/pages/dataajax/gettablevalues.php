<?php date_default_timezone_set('Asia/Kolkata');
include ('../../config/config.inc.php');
date_default_timezone_set('Asia/Kolkata');
//ini_set('display_errors','1');
//error_reporting(E_ALL);
function mres($value) {
    $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
    $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");
    return str_replace($search, $replace, $value);
}
if ($_REQUEST['types'] == 'subscriptiontable') {
    $aColumns = array('id','name', 'validity','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "subscription";
}

if ($_REQUEST['types'] == 'abuse_report_tbl') {
    $aColumns = array('id','created_at','user_id', 'reported_user_id');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "abuse_report_tbl";
}
if ($_REQUEST['types'] == 'assignedordertable' || $_REQUEST['types'] == 'cancelledordertable') {
    $aColumns = array('id','date','driver_id','userid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "booking";
}
if ($_REQUEST['types'] == 'activeordertable') {
    $aColumns = array('id','date','driver_id','userid','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "booking";
}
if ($_REQUEST['types'] == 'completedordertable') {
    $aColumns = array('id','date','driver_id','userid','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "booking";
}

if ($_REQUEST['types'] == 'enquirytable') {
    $aColumns = array('id','date', 'name','emailid','mobileno','message');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "enquiry";
}
if ($_REQUEST['types'] == 'drivertable') {
    $aColumns = array('id','name','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "driver";
}
if ($_REQUEST['types'] == 'vendortable') {
    $aColumns = array('id', 'date','name','emailid','mobileno');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable servicestable
    $sTable = "vendor";
}

if ($_REQUEST['types'] == 'districttable') {
    $aColumns = array('id', 'district_name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "village";
}
if ($_REQUEST['types'] == 'educationtable') {
    $aColumns = array('id', 'education','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable servicestable
    $sTable = "education";
}

if ($_REQUEST['types'] == 'servicestable') {
    $aColumns = array('id', 'type','name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable servicestable
    $sTable = "services";
}

if ($_REQUEST['types'] == 'brandstable') {
    $aColumns = array('id', 'brand_name','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "brand";
}

if ($_REQUEST['types'] == 'offerstable') {
$aColumns = array('id', 'name','status');
$sIndexColumn = "id";
//$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
$sTable = "sales_offers";
}

if ($_REQUEST['types'] == 'helptable') {
$aColumns = array('id', 'question','answer','status');
$sIndexColumn = "id";
//$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
$sTable = "faq";
}

if ($_REQUEST['types'] == 'serviceadstable') {
    $aColumns = array('id', 'name','image','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "service_ads";
}

if ($_REQUEST['types'] == 'serviceofferstable') {
    $aColumns = array('id', 'name','image','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "service_offers";
}


if ($_REQUEST['types'] == 'types_bannertable') {
    $aColumns = array('id', 'name','image','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "types_banner";
}

if ($_REQUEST['types'] == 'producttable') {
    $aColumns = array('id','productname_e','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "products";
}


if ($_REQUEST['types'] == 'settingtable') {
    $aColumns = array('id','mobile','email');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "setting";
}

if ($_REQUEST['types'] == 'complainttable') {
    $aColumns = array('id', 'type');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "complaint";
}

if ($_REQUEST['types'] == 'categorytable') {
    $aColumns = array('id', 'category');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "category";
}

if ($_REQUEST['types'] == 'modelstable') 
{
    $aColumns = array('id', 'model_name','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "models";
}
///list users start
if ($_REQUEST['types'] == 'register') 
{

    $aColumns = array('id','username','gender','dob');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "register";
}
///list users end

///list notifications
if ($_REQUEST['types'] == 'push_notification_tbl') 
{

    $aColumns = array('id','user_type','notification_message','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "push_notification_tbl";
}
///list notifications


if ($_REQUEST['types'] == 'complaintstable') 
{
    $aColumns = array('id', 'type','name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "complaints";
}

if ($_REQUEST['types'] == 'jobtable') {
    $aColumns = array('id', 'job','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner"; complaintstable
    $sTable = "job";
}


if ($_REQUEST['types'] == 'experiencetable') {
    $aColumns = array('id', 'experience','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "experience";
}


if ($_REQUEST['types'] == 'employeetable') {
    $aColumns = array('id','manager','name', 'mobileno', 'username', 'password','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "employee";
}
if ($_REQUEST['types'] == 'supervisortable') {
    $aColumns = array('id', 'name', 'mobileno', 'username', 'password','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "supervisor";
}
if ($_REQUEST['types'] == 'managertable') {
    $aColumns = array('id','supervisor', 'name', 'mobileno', 'username', 'password','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "manager";
}


if ($_REQUEST['types'] == 'panchayattable') {
    $aColumns = array('id', 'district_name','block_name','panchayat_name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "village";
}
if ($_REQUEST['types'] == 'blocktable') {
    $aColumns = array('id', 'district_name','block_name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "village";
}


if ($_REQUEST['types'] == 'registertable') {
    $aColumns = array('id', 'date','name','emailid','mobileno');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "customer";
}
if ($_REQUEST['types'] == 'formtable') {
    $aColumns = array('id', 'date','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}

if ($_REQUEST['types'] == 'employeeformtable') {
    $aColumns = array('id', 'date','manager','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}

if ($_REQUEST['types'] == 'managerformtable') {
    $aColumns = array('id', 'date','manager','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}



if ($_REQUEST['types'] == 'nmanagerformtable') {
    $aColumns = array('id', 'date','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}


if ($_REQUEST['types'] == 'formtable1') {
    $aColumns = array('id', 'date','userid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}
/* Declaration table name start here */



$aColumns1 = $aColumns;

function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}

$sLimit = "";

if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
}

  if ($_REQUEST['types'] == 'districttable') {
   $sOrder = "GROUP BY `district_code` ORDER BY `$sIndexColumn` DESC ";
    }
    else if ($_REQUEST['types'] == 'blocktable') {
   $sOrder = "GROUP BY `block_name` ORDER BY `$sIndexColumn` DESC ";
    }
    else  if ($_REQUEST['types'] == 'panchayattable') {
  $sOrder = "GROUP BY `panchayat_name` ORDER BY `$sIndexColumn` DESC ";
    }
    
    else
    {
    $sOrder = "ORDER BY `$sIndexColumn` DESC";
    }
    

if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    if (in_array("order", $aColumns)) {
        $sOrder .= "`order` asc, ";
    } else if (in_array("Order", $aColumns)) {
        $sOrder .= "`Order` asc, ";
    }
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY ") {
            $sOrder = " ";
        }
    }
}

$sWhere = "";


if ($sWhere != '') {

     $sWhere = "WHERE `$sIndexColumn`!='' $sWhere";    
  
}
else
{ 
  if ($_REQUEST['types'] == 'register') 
{
    if($_REQUEST['usertype']=='block') {
     $sWhere = " WHERE `status`='0' "; 
    }
    else
    {
        if($_REQUEST['usertype']!='') {
      $sWhere = " WHERE `gender`='".$_REQUEST['usertype']."' "; 
      }   
    }
}


   
      if ($_REQUEST['types'] == 'blocktable') {
   $sWhere = " WHERE `block_code`!='' "; 
    }
      if ($_REQUEST['types'] == 'panchayattable') {
   $sWhere = " WHERE `panchayat_code`!='' "; 
    }
    
	if ($_REQUEST['types'] == 'formtable') {
		if($_REQUEST['formid']!='') { 
   $sWhere = "WHERE `userid`='".$_REQUEST['formid']."' AND `type`='".$_SESSION['usertype']."'";    
		}
	if($_SESSION['GRUID']!='1') { 
  	$sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='supervisor'";  	    
		}
		
		
    }
    	if ($_REQUEST['types'] == 'employeeformtable') {
    	    if($_SESSION['usertype']=='supervisor') {
    	 $sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='employee' ";  	    
    	    }
    	    if($_SESSION['usertype']=='manager') {
    	 $sWhere = "WHERE `manager`='".$_SESSION['usertypeid']."' AND `type`='employee' ";  	    
    	    }
    	    if($_SESSION['usertype']=='employee') {
    	 $sWhere = "WHERE `employee`='".$_SESSION['usertypeid']."' AND `type`='employee'";  	    
    	    }
    	}
    	
    	if ($_REQUEST['types'] == 'managerformtable') {
    	    if($_SESSION['usertype']=='supervisor') {
    	 $sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='manager' ";  	    
    	    }
    	     if($_SESSION['usertype']=='manager') {
    	 $sWhere = "WHERE `manager`='".$_SESSION['usertypeid']."' AND `type`='manager'";  	    
    	    }
    	  
    	}
    		if ($_REQUEST['types'] == 'nmanagerformtable') {
    	    if($_SESSION['usertype']=='supervisor') {
    	 $sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='manager' ";  	    
    	    }
    	     if($_SESSION['usertype']=='manager') {
    	 $sWhere = "WHERE `manager`='".$_SESSION['usertypeid']."' AND `type`='manager'";  	    
    	    }
    	  
    	}
    	
    	
    	
    
}

  if ($_REQUEST['types'] == 'pendingordertable') {
   $sWhere = " WHERE `status`='Pending' "; 
    }
	
	
    if ($_REQUEST['types'] == 'assignedordertable') {
   $sWhere = " WHERE `status`='Confirmed' "; 
    }
	 if ($_REQUEST['types'] == 'activeordertable') {
   $sWhere = " WHERE `status`='Started' "; 
    }
	if ($_REQUEST['types'] == 'completedordertable') {
   $sWhere = " WHERE `status`='Closed' "; 
    }
	if ($_REQUEST['types'] == 'cancelledordertable') {
   $sWhere = " WHERE `status`='Cancelled' "; 
    }
    if ($_REQUEST['types'] == 'formtable1') {
   $sWhere = " WHERE `userid`='".$_SESSION['GRUID']."' AND `type`='".$_SESSION['usertype']."' "; 
    }
   $sQuery = "SELECT SQL_CALC_FOUND_ROWS `" . str_replace(",", "`,`", implode(",", $aColumns)) . "` FROM $sTable $sWhere $sOrder $sLimit ";



$rResult = $db->prepare($sQuery);
$rResult->execute();

 $sQuery = "SELECT FOUND_ROWS()";

$rResultFilterTotal = $db->prepare($sQuery);
$rResultFilterTotal->execute();

$aResultFilterTotal = $rResultFilterTotal->fetch();
$iFilteredTotal = $aResultFilterTotal[0];

$sQuery = "SELECT COUNT(" . $sIndexColumn . ") FROM $sTable";
$rResultTotal = $db->prepare($sQuery);
$rResultTotal->execute();

$aResultTotal = $rResultTotal->fetch();
$iTotal = $aResultTotal[0];

$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);

$ij = 1;
$k = $_GET['iDisplayStart'];

while ($aRow = $rResult->fetch(PDO::FETCH_ASSOC)) {
    $k++;
    $row = array();
    $row1 = '';
    for ($i = 0; $i < count($aColumns1); $i++) {
        if ($_REQUEST['types'] == 'registertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        
        else if ($_REQUEST['types'] == 'employeeformtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                } elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }elseif ($aColumns1[$i] == 'manager') {
                $row[] =getmanager('name',$aRow[$aColumns1[$i]]);
            }elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'managerformtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }
            elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }
            elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }  
        else if ($_REQUEST['types'] == 'abuse_report_tbl') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'created_at') {
                $row[] = date('d-m-Y',strtotime($aRow[$aColumns1[$i]]));
            }  elseif ($aColumns1[$i] == 'user_id') {
                $row[] = getuserss('username',$aRow[$aColumns1[$i]]);
            } elseif ($aColumns1[$i] == 'reported_user_id') {
                $row[] = getuserss('username',$aRow[$aColumns1[$i]]);
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
         else if ($_REQUEST['types'] == 'enquirytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }
            elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
         else if ($_REQUEST['types'] == 'nmanagerformtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }
            elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }
            elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'formtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            } elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        
        else if ($_REQUEST['types'] == 'formtable1') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }elseif ($aColumns1[$i] == 'userid') {

                $row[] = getusers('name',$aRow[$aColumns1[$i]]);
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }else if ($_REQUEST['types'] == 'districttable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }else if ($_REQUEST['types'] == 'supervisortable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		
		 else if ($_REQUEST['types'] == 'pendingordertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-m-Y',strtotime($aRow[$aColumns1[$i]]));
		 } elseif ($aColumns1[$i] == 'userid') {
                $row[] = getcustomer('name',$aRow[$aColumns1[$i]]);
				$row[] = getcustomer('mobileno',$aRow[$aColumns1[$i]]);
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		
        else if ($_REQUEST['types'] == 'assignedordertable' || $_REQUEST['types'] == 'activeordertable' || $_REQUEST['types'] == 'completedordertable' || $_REQUEST['types'] == 'cancelledordertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-m-Y',strtotime($aRow[$aColumns1[$i]]));
		 } elseif ($aColumns1[$i] == 'userid') {
                $row[] = getcustomer('name',$aRow[$aColumns1[$i]]);
		 } elseif ($aColumns1[$i] == 'driver_id') {
                $row[] = getdriver('name',$aRow[$aColumns1[$i]]);
		 }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
       
	   
	   
   	else {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'Status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
    }

    /* Edit page  change start here */
  
    if (($_REQUEST['types'] == 'registertable') || ($_REQUEST['types'] == 'pendingordertable') || ($_REQUEST['types'] == 'assignedordertable') || ($_REQUEST['types'] == 'completedordertable') || ($_REQUEST['types'] == 'activeordertable')  || ($_REQUEST['types'] == 'cancelledordertable') ) {
        $row[] = "<i class='fa fa-eye' onclick='javascript:viewthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'> </i>";
    }
    
    else {
        if($_REQUEST['types'] != 'ordertable')
        {
        $row[] = "<i class='fa fa-edit' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'> Edit </i>";
        }
        
    }

    $row[] = '<input type="checkbox"  name="chk[]" id="chk[]" value="' . $aRow[$sIndexColumn] . '" />';



    $output['aaData'][] = $row;
    $ij++;
}

echo json_encode($output);
?>
 

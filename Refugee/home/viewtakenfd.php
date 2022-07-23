
<?php
	//Start session
	include("../config.php");
	
	//Unset the variables stored in session
	
	
	?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html lang="en">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>refugee food management system</title>
<link href="../styles/layout.css" rel="stylesheet" type="text/css" />
<link href="../styles/viewcss.css" rel="stylesheet" type="text/css" />
<link href="../styles/table.css" rel="stylesheet" type="text/css" />
    
	<SCRIPT TYPE="text/javascript"> 
 
var message="Sorry, right-click has been disabled"; 

function clickIE() {if (document.all) {(message);return false;}} 
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) { 
if (e.which==2||e.which==3) {(message);return false;}}} 
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
document.oncontextmenu=new Function("return false") 
</SCRIPT>

<script type="text/javascript">
	function confirmDelete()
	{
		if (confirm("You are just about to delete this record\n Caution: This Operation cannot be undone")) { 
			return true;
		}	
		else
			return false;
	}
</script>
 
 
 <!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  
  </head>
  <body>
  <div id="header"> 
<p></p>
<h1><strong>REFUGEE FOOD MANAGEMENT SYSTEM <font color="red"></font></strong></h1>

</div>
<div id="menu">
<?php include("menu.php");?>
</div>
 <div id="wrap">

    	<div class="cont_details">

                <legend>Welcome <?php echo $_SESSION['SESS_LAST_NAME'];?> to the system!
			<a href="../logout.php">Logout</a></legend>
</div>
</div>
 <div id="wrap2">
 	  <?php
if (isset($_GET['tfid'])){
		$Id =$_GET['tfid'];
		$fid=$_GET['foodreg_rfid'];
		$qty=$_GET['qty'];

	$sql=mysql_query("UPDATE foodreg SET qtyleft =qtyleft + $qty, qtytaken =qtytaken -$qty WHERE fdid='$fid'");
		//if (mysql_query("Update foodreg Set qtyleft=qtyleft + $qty,qtytaken=qtytaken-$qty WHERE foodreg.fdid ='$Id'"))

		if (mysql_query("DELETE FROM takenfood WHERE tfid = '$Id'"))
			echo "<p><span style='font-weight:bold; color:#FF0000; margin-left:150px;'>refugee Details successfully deleted</span></p>";				
			
		else
			echo "<p><span style='font-weight:bold; color:#FF0000; margin-left:150px;'>Error deleting a patient Detail ".mysql_error()."</span></p>";
	}

?> 	
<?php
error_reporting(E_ALL^E_NOTICE);
////////////////////////////////////////////////////////
$per_page =8;
            $pages_query =  mysql_query("SELECT COUNT(tfid) FROM  takenfood");
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$start = ($page - 1) * $per_page;

/////////////////////////////////////////////////////////
	$query="select * from  refugee, nationality,takenfood,foodreg WHERE refugee.nationality_nid = nationality.nid AND refugee.refNo = takenfood.Refugee_rfid AND takenfood.foodreg_rfid= foodreg.fdid LIMIT $start, $per_page";
	 
	
$result = mysql_query($query) or die("data retrieval failed ".mysql_error());
 
$num_row = mysql_num_rows($result);

if(mysql_num_rows($result) > 0){
	
	$query1 = '';
?>
<script type="text/javascript">
             $(document).ready(function()
                {
                    $("#myTable").tablesorter({widgets: ['zebra']})
                                 .tablesorterPager({ container: $("#pagerOne"), positionFixed: false })
                }
            );
         </script>
		 
    	<div class="cont_details">
		 <table class="tablesorter"  align="center">
                  <thead>
                   <th width="5">RefugeeNo</th>
                 <th colspan="2"> <center> RefugeeNames</center></th>
                 <th> <center> Nationality</center></th>
                 <th> <center>Foods</center></th>
                   <th >Quantity</th>
                   <th>Contact</th>
                   <th >Date</th>
                   <th >Status</th>
                   <th colspan="2">Action</th>
                  </thead>
                  <tbody>
                   <?php 
                     	$sno = 0; 
				while($e=mysql_fetch_array($result)){
				$sno = $sno + 1;

					
					?>
				
<tr class = "table_row">
	<td><?php echo $e['refNo'];?></td>
	<td ><?php echo $e['Fname'];?></td>
	<td ><?php echo $e['Lname'];?></td>
	<td><?php echo $e ['nationName'];?></td>		
	<td><?php echo $e['foodname'];?></td>
	<td><?php echo $e['qty'];?></td>
	<td><?php echo $e['contact'];?></td>	
	<td><?php echo $e['takenDate'];?></td>
	  
 <td></td><td><a  style="text-decoration:none"  onClick="return confirmDelete()" href="viewtakenfd.php?tfid=<?php echo $e['tfid']; ?>&qty=<?php echo $e['qty'];?>&foodreg_rfid=<?php echo $e['foodreg_rfid'];?>"> Delete</a></td>
                  
	<?php					 
						  
}
}
                   ?>
				   
	<tfoot>
  <tr id="pagerOne">
    <td colspan="6"> <?php 
		if($pages>=1 && $page<=$pages)
{
echo " Page   "; 
for($x=1; $x<=$pages;$x++)
{
//echo '<a href="?page='.$x.'">'.$x.'</a>';

echo($x==$page) ? '<strong><a href="?page='.$x.'" style="text-decoration:none">'.$x.'          </a>&nbsp;</strong>                   ' : '<a href="?page='.$x.'">'.$x.'               </a> &nbsp;              ';
}
}
	echo "   of $pages pages";
		?>
    </td>
  </tr>
</tfoot>			   
				   
				   
                  </tbody>	
				  </table>
				

      </div>
    </div>
  
</div>
</div>
<!--############################################################################################################################################-->
<div id="footer"> 
<p>Copy right! <?php echo date('d-m-Y');?></p>




</div>
<!--##############################################################################################################################################-->

</body>
</html>

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
if (isset($_GET['staffid'])){
		$Id = $_GET['staffid'];
		if (mysql_query("DELETE FROM staff WHERE staffid = '$Id'"))
			echo "<p><span style='font-weight:bold; color:#FF0000; margin-left:150px;'>refugee Details successfully deleted</span></p>";				
		else
			echo "<p><span style='font-weight:bold; color:#FF0000; margin-left:150px;'>Error deleting a patient Detail ".mysql_error()."</span></p>";
	}

?> 
<?php
error_reporting(E_ALL^E_NOTICE);
////////////////////////////////////////////////////////
$per_page =11;
            $pages_query =  mysql_query("SELECT COUNT(staffid) FROM  staff");
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$start = ($page - 1) * $per_page;

/////////////////////////////////////////////////////////
	$query="select * from  staff  LIMIT $start, $per_page";
	 
	
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
                   <th width="5">U/No</th>
                 <th> <center>UserName</center></th>
                   <th>Role</th>
                   <th colspan="2">Action</th>
                  </thead>
                  <tbody>
                   <?php 
                     	$sno = 0; 
				while($e=mysql_fetch_array($result)){
				$sno = $sno + 1;

					
					?>
				
<tr class = "table_row"><td><?php echo $sno; ?></td>
	<td><?php echo $e['1'];?></td>
	<td><?php echo $e['3'];?></td>
 <td> </td><td><a href='viewpatients.php?staffid=<?php echo $e["0"]?>' style="text-decoration:none"  onClick="return confirmDelete()"> Delete</a></td>
                  
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
<?php
	//Start session
	include("../config.php");
	
	//Unset the variables stored in session
	
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>refugee food management system</title>
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link href="../styles/layout.css" rel="stylesheet" type="text/css" />
<link href="../styles/forms.css" rel="stylesheet" type="text/css" />



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
			<a href="../logout.php">Logout</a>
         <fieldset>	     
		 <table align="center">
		 <?php
		  $dt = date("Y-m-d");

		 
	
    if(isset($_POST['Register'])){
  $conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"foodmanagement");
// return array
$rowCount = count($_POST["food"]);
for($i=0;$i<$rowCount;$i++) {
if(isset($_POST['food'][$i])){
$fid = $_POST['food'][$i]; 
$nam = $_POST['a'][$i]; 
$qty = $_POST['b'][$i]; 
$id = $_POST['refNo']; 
$date = date('Y-m-d'); 
$slquery =("SELECT 1 FROM  refugee WHERE refNo='$id'");
$selectresult = mysql_query($slquery);
    if(mysql_num_rows($selectresult)>0)
    {
$sql=mysql_query("UPDATE refugee SET received ='yes' WHERE refNo='$id'") or mysql_error();
$sql=mysql_query("UPDATE foodreg SET qtyleft =qtyleft -$qty, qtytaken =qtytaken +$qty WHERE fdid='" . $_POST["food"][$i] . "'") or mysql_error();
$sql=mysql_query("INSERT  INTO  takenfood VALUES ('','$date','$qty','$fid','$id')");
 if(!$sql) { die(mysql_error()); }


			if($sql){

				echo 'successfully registered... ';

				echo '<script type="text/javascript">

						var myVar=setInterval(function(){myTimer()},2000);

				function myTimer()
				{
					window.location="served.php";

				}
			</script>';
			}
			
			
    }
	else
	{
        echo 'refugge id does not exists........';
		
				echo '<script type="text/javascript">

						var myVar=setInterval(function(){myTimer()},2000);

				function myTimer()
				{
					window.location="served.php";

				}
			</script>';
			}


	}
	}
}
/*
$resapp = mysql_query("SELECT * FROM refugee");
$premonth = mktime(0,0,0,date("m"),date("d")-31,date("Y"));
$pm1 = date("Y-m-01", $premonth);
 $pm2 = date("Y-m-31", $premonth);
$stdate= date("Y-m-01");
$enddate= date("Y-m-31");

$resapp1 = mysql_query("SELECT * FROM takenfood ");
$resapp21 = mysql_query("SELECT * FROM takenfood where foodreg_rfid BETWEEN '$stdate' AND '$enddate'");
$reccount= mysql_num_rows($resapp21);
*/
	?>
	<form method="Post">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Served Food here!</legend>

		<tr>
<td>
<label>RefugeeNo</label>
</td>
<td>
 <div class="input_container">
                    <input type="text" name="refNo" id="country_id" onkeyup="autocomplet()">
                   
				   <ul id="country_list_id">
				   
				   
				   </ul>
				   
                </div>
</td>

</tr>
	<?php
	$conn = mysqli_connect("localhost","root","");
	$sql= mysqli_query($conn,"select * FROM  foodreg WHERE qtyleft >0");
	while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
	$fdname=$row['foodname'];
	$id=$row['fdid'];
	
	
	
?>
<tr>
          <td><input type="checkbox" name="food[]" value="<?php echo $id['fdid'];?>" required>  </td>
          <td><input type="text" name="a[]" tabindex="2"value="<?php echo $fdname;?>"readonly required /></td>
          <td><input type="text" placeholder="quantity" name="b[]"  size="10"required /></td>
		  </td>
        </tr>

		
<?php
}	
	?>	
		
		<tr>
          <td></td>
          <td><input type="submit" style="background-color:green; width: 150px; color:white; border-radius: 10px;"  name="Register" value="Register"/></td>
        </tr>
</fieldset>
	
			</table>
				
</form>
</div>
</div>
<!--############################################################################################################################################-->
<div id="footer"> 
<p>Copy right! <?php echo date('d-m-Y');?></p>




</div>
<!--##############################################################################################################################################-->

</body>
</html>

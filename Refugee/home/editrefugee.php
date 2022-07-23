
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
<link href="../styles/layout.css" rel="stylesheet" type="text/css" />
<link href="../styles/form.css" rel="stylesheet" type="text/css" />

</head>
<body >
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
<?php
if(isset($_POST['Register'])){

$a = $_POST['a'];
$f = $_POST['b'];
$l = $_POST['c'];
$s = $_POST['sex'];
$aa = $_POST['d'];
$c = $_POST['e'];
$nationality_nid= $_POST['nationality_nid'];

$qry1 = mysql_query(" UPDATE refugee SET Fname='$f', Lname='$l', sex='$s',age='$aa', contact ='$c', 
nationality_nid='$nationality_nid' WHERE rfid='$a' ");
	

			if($qry1){

				echo 'successfully updated... ';

				echo '<script type="text/javascript">

						var myVar=setInterval(function(){myTimer()},2000);

				function myTimer()
				{
				window.location="pagenateRefugeesList.php";

				}
			</script>';
			}else {	echo mysql_error();	}

	
	}
?>		 
		 <table align="center">
		 
		 
		 <?php
		 $pos=$_SESSION['SESS_LAST_NAME'];
if($pos=='field monitor') {
$a=$_GET['rfid'];
$d=mysql_fetch_array(mysql_query("SELECT * FROM refugee WHERE rfid='$a'")); 
?>
<form method="Post">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Update Refugee infor here!</legend>
	<input name="a" type="hidden" Value="<?php echo $a?>" />

		<tr>
          <td><label>First Name:</label></td>
          <td ><input name="b" type="text" value="<?php echo $d['Fname']?>" style="color:blue"/></td>
        </tr>
<tr>
          <td><label>Last Name:</label></td>
          <td ><input name="c" type="text" value="<?php echo $d['Lname']?>" style="color:blue"/></td>
        </tr>
			<tr>
          <td><label>Gender:</label></td>
          <td ><select name="sex" tabindex="2" required />
		  <option>select<------>gender</option>
		  <option value="male">Male</option>
		  <option value="female">Female</option>
		  </select>
		  </td>
        </tr>
<tr>
          <td><label>Age:</label></td>
          <td ><input name="d" type="text" Value="<?php echo $d['age']?>" style="color:blue"/></td>
        </tr>
		<tr>
          <td><label>Contact:</label></td>
          <td ><input name="e" type="text" value="<?php echo $d['contact']?>" style="color:blue"/></td>
        </tr>
		<tr>
          <td><label>Nation:</label></td>
          <td >
		  <select name="nationality_nid" tabindex="2" required />
		  <option>Select<------->value</option>
	<?php	
		$result = mysql_query("SELECT * FROM  nationality ORDER BY nid DESC");
		while( $row = mysql_fetch_array($result)){
		echo '<option value="'.$row['nid'].'">'.$row['nationcode'].'-'.$row['nationName'].'</option>';
		}
		
		
		
	?>
	</select>
		  
		  </td>
        </tr>
		<tr>
          <td></td>
          <td><input type="submit"style="background-color:green; width: 150px; color:white; border-radius: 10px;"  name="Register" value="Update"/></td>
        </tr>
		
				</table>
</form>

<?php
	}
		else
		{
			
include ("addusers.php");			}
			?>
			</fieldset>

</div>

</div>

<!--############################################################################################################################################-->
<div id="footer"> 
<p>Copy right! <?php echo date('d-m-Y');?></p>




</div>
<!--##############################################################################################################################################-->

</body>
</html>

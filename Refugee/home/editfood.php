
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
$aa = $_POST['d'];

$qry1 = mysql_query(" UPDATE foodreg SET foodname='$f', qtyleft='$l',footType_typeid='$aa' WHERE fdid='$a' ");
	

			if($qry1){

				echo 'successfully updated... ';

				echo '<script type="text/javascript">

						var myVar=setInterval(function(){myTimer()},2000);

				function myTimer()
				{
				window.location="viewfd.php";

				}
			</script>';
			}else {	echo mysql_error();	}

	
	}
?>		 
		 <table align="center">
		 
		 
		 <?php
		 $pos=$_SESSION['SESS_LAST_NAME'];
if($pos=='field monitor') {
$a=$_GET['fdid'];
$d=mysql_fetch_array(mysql_query("SELECT * FROM  foodreg WHERE fdid='$a'")); 
?>
<form method="Post">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Update Food infor here!</legend>
	<input name="a" type="hidden" Value="<?php echo $a?>" />

		<tr>
          <td><label> Name:</label></td>
          <td ><input name="b" type="text" value="<?php echo $d['foodname']?>" style="color:blue"/></td>
        </tr>
<tr>
          <td><label>Qty:</label></td>
          <td ><input name="c" type="text" value="<?php echo $d['qtyleft']?>" style="color:blue"/></td>
        </tr>
			
			

		<tr>
          <td><label>FoodType:</label></td>
          <td >
		  <select name="d" tabindex="2" required />
		  <option>Select<------->value</option>
	<?php	
		$result = mysql_query("SELECT * FROM  foodtype ORDER BY typeid DESC");
		while( $row = mysql_fetch_array($result)){
		echo '<option value="'.$row['typeid'].'">'.$row['typeid'].'-'.$row['typename'].'</option>';
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

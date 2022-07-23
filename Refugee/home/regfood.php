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
		 <table align="center">
		 <?php
    if(isset($_POST['Register'])){

$a = $_POST['a'];
$f = $_POST['b'];
$l = $_POST['c'];
$qtytaken =0;
$date =date('Y-m-d');



$qry1 = mysql_query("
	insert into  foodreg
	
	values(
	'',
		'$a',
		'$f',
		'$qtytaken',
		'$date',
		'$l'
		
		
	)
	");
	

			if($qry1){

				echo 'successfully registered... ';

				echo '<script type="text/javascript">

						var myVar=setInterval(function(){myTimer()},2000);

				function myTimer()
				{
					window.location="regfood.php";

				}
			</script>';
			}else {	echo mysql_error();	}

	
	}
?>
<form method="Post">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Register Food here!</legend>

		<tr>
          <td><label>Food Name:<label></td>
          <td ><input type="text" autocomplete="off" name="a" tabindex="2" required /></td>
        </tr>
<tr>
          <td><label>Qty:<label></td>
          <td ><input type="text" autocomplete="off" name="b" tabindex="2" required /></td>
        </tr>
		

		<tr>
          <td><label>FoodType:<label></td>
          <td >
		  <select name="c" tabindex="2" required />
		  <option>Select<------->value</option>
	<?php	
		$result = mysql_query("SELECT * FROM  foodtype ORDER BY typeid  ASC");
		while( $row = mysql_fetch_array($result)){
		echo '<option value="'.$row['typeid'].'">'.$row['typeid'].'-'.$row['1'].'</option>';
		}
	?>
	</select>
		  
		  </td>
        </tr>
		<tr>
          <td></td>
          <td><input type="submit" style="background-color:green; width: 150px; color:white; border-radius: 10px;" name="Register" value="Register"/></td>
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

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
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
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
		 
<form method="Post" action="refugeesreport.php">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Refugee Report!</legend>

		<tr>
          <td><label>Select date1:<label></td>
          <td ><input type="text" autocomplete="off" name="a" class="tcal" tabindex="2" required /></td>
                   <td><label>Date2:<label></td>
           <td ><input type="text" autocomplete="off" name="b" class="tcal" tabindex="2" required /></td>
      
          <td><input type="submit" style="background-color:green; width: 150px; color:white; border-radius: 10px;" name="Register" value="Search"/></td>
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

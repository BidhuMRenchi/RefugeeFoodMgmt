<?php
	//Start session
	include("../config.php");
	
	//Unset the variables stored in session
	
	
	?>

     
		 <table align="center">
		 <?php
if(isset($_POST['Register'])){
$a = $_POST['a'];
$f =sha1( $_POST['b']);
$l = sha1($_POST['c']);
$n = $_POST['d'];

if($_POST['b'] != $_POST['c']){
   echo "Your passwords did not match.";
}

else {
	
$qry1 = mysql_query("
	insert into  staff
	
	values(
	'',
		'$a',
		'$f',
		'$n'
		
		
	)
	");
	

			if($qry1){

				echo 'successfully registered... ';

				echo '<script type="text/javascript">

						var myVar=setInterval(function(){myTimer()},2000);

				function myTimer()
				{
					window.location="home.php";

				}
			</script>';
			}else {	echo mysql_error();	}

	
	}
	}
?>
<form method="Post">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Register user here!</legend>

		<tr>
          <td><label>Username:<label></td>
          <td ><input type="text" autocomplete="off" name="a" tabindex="2" required /></td>
        </tr>
<tr>
          <td><label>Password:<label></td>
          <td ><input type="password" autocomplete="off" name="b" tabindex="2" required /></td>
        </tr>
		

		<tr>
          <td><label>Comfirm:<label></td>
                   <td ><input type="password" autocomplete="off" name="c" tabindex="2" required /></td>

        </tr>
		<tr>
          <td><label>Role:<label></td>
                   <td ><select type="text" name="d" tabindex="2" required />
				   <option><-----selectroles---></option>
				   <option>admin</option>
				   <option>field monitor</option>
				   <option>   </option>
				   
				   
				   </td>

        </tr>
		<tr>
          <td></td>
          <td><input type="submit" name="Register" value="Register"/></td>
        </tr>
</fieldset>
	
				
</table>
					</center>
					</form> 
				</td>
			</tr>
		</table>	
	</center>
		</table>
	</center>
					
</form>

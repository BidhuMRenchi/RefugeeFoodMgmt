<?php
if(isset($_POST['Register'])){

$a = $_POST['refNo'];
$f = $_POST['Fname'];
$l = $_POST['Lname'];
$s = $_POST['sex'];
$aa = $_POST['age'];
$c = $_POST['contact'];
$nationality_nid= $_POST['nationality_nid'];
$date =date('Y-m-d');



$qry1 = mysql_query("
	insert into refugee
	
	values(
	'',
		'$f',
		'$l',
		'$s',
		'$aa',
		'$c',
		'$date',
		'active',
		'Null',
		'$nationality_nid',
		'$a'
		
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
?>
<form method="Post">
<legend style="background-color:purple; width:800px; color:white; border-radius: 10px;">Register Refugee here!</legend>
	<tr>
          <td><label>Refugee No:<label></td>
          <td ><input type="text" name="refNo" tabindex="2" required /></td>
        </tr>
		<tr>
          <td><label>First Name:<label></td>
          <td ><input type="text"  name="Fname" tabindex="2" required /></td>
        </tr>
<tr>
          <td><label>Last Name:<label></td>
          <td ><input type="text"  name="Lname" tabindex="2" required /></td>
        </tr>
			<tr>
          <td><label>Gender:<label></td>
          <td ><select name="sex" tabindex="2" required />
		  <option>select<------>gender</option>
		  <option value="male">Male</option>
		  <option value="female">Female</option>
		  </select>
		  </td>
        </tr>
<tr>
          <td><label>Age:<label></td>
          <td ><input type="text"  name="age" tabindex="2" required /></td>
        </tr>
		<tr>
          <td><label>Contact:<label></td>
          <td ><input type="text"  name="contact" tabindex="2"  /></td>
        </tr>
		<tr>
          <td><label>Nation:<label></td>
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
          <td><input type="submit" style="background-color:green; width: 150px; color:white; border-radius: 10px;" name="Register" value="Register"/></td>
        </tr>
		
				</table>
</form>

<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysqli_connect('localhost','root',"");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysqli_select_db( $link,'foodmanagement');
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$link = mysqli_connect('localhost','root',"");
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($link,$str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['user']);
	$password = clean(sha1($_POST['pass']));
	
	
	
	//Create query
	$qry="SELECT * FROM staff WHERE username='$login' AND password='$password'";
	$result=mysqli_query($link,$qry);
	if(!$result){echo mysqli_error();}
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['staffid'];
			$_SESSION['SESS_FIRST_NAME'] = $member['username'];
			$_SESSION['SESS_LAST_NAME'] = $member['role'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: home/home.php");
			exit();
		}else  {
			//Login failed
			isset($_SESSION['error']);
			
			
			$_SESSION['error'] = "Incorrect username or password";
			
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>
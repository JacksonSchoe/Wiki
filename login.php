<?php
include("header.html");

$database  = mysql_connect("localhost","root","babak16") or die (mysql_error());
mysql_select_db("cu_wiki", $database);
/*
//If a cookie already exists
//This part is probably not needed
if(isset($_COOKIE['ID_cu_wiki'])){
	$username = $_COOKIE['ID_cu_wiki'];
	$password = $_COOKIE['KEY_cu_wiki'];
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$check = mysql_query($sql, $database) or die (mysql_error());
	while($info = mysql_fetch_array($check)){
		if($password != $info['password']){
			
		} else {
			header("Location: landing.php"); //Redirect to the logged in page
			die(); //In case something weird happens and the redirect doesn't occur
		}
	}
} */
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$check = mysql_query($sql, $database) or die (mysql_error());
	if(mysql_num_rows($check) == 0){ //If no accounts exist with that name
		die('Username does not exist!<p><form action="index.php"><input type = "submit" value = "Back"></form></p>');
	}
	while($info = mysql_fetch_array($check)){
		$password = stripslashes($password);
		$info['password'] = stripslashes($info['password']);
		$password = md5($password);
		if($password != $info['password']){ //If wrong password is given
			die('Incorrect password!<p><form action="index.php"><input type = "submit" value = "Back"></form></p>');
		} else {
			$username = stripslashes($username);
			$hour = time() + 3600;
			setcookie(ID_cu_wiki, $username, $hour);
			setcookie(KEY_cu_wiki, $password, $hour);
			header("Location: landing.php"); //Redirect to the logged in page
			die(); //In case something weird happens and the redirect doesn't occur
		}
	}
}

?>
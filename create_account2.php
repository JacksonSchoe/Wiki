<?php
include("header.html");

$database  = mysql_connect("localhost","root","babak16") or die (mysql_error());
mysql_select_db("cu_wiki", $database);
$_POST['password'] = md5($_POST['password']);
if (!get_magic_quotes_gpc()) {
	$_POST['password'] = addslashes($_POST['password']);
	$_POST['username'] = addslashes($_POST['username']);
}
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO users (username, password) VALUES('$username', '$password')";
$sql2 = "SELECT * FROM users WHERE username = '$username'";
$result = mysql_query($sql2, $database) or die (mysql_error());
if($username == "" or $password == ""){
		header("Location: create_account.php?miss=1"); //Redirect to the previous form with an error variable
		die(); //In case something weird happens and the redirect doesn't occur
}

while($row = mysql_fetch_array($result)){
	if($username == $row['username']){
		header("Location: create_account.php?same=1"); //Redirect to the previous form with an error variable
		die(); //In case something weird happens and the redirect doesn't occur
	}
}

mysql_query($sql, $database) or die (mysql_error());	
echo "<b><p><h3>Thank you, your account has been created.</h3></p></b>";
?>
<html><body><form action = "index.php"><input type = "submit" value = "Back"></form></body><html>
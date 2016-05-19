<?php


$users  = mysql_connect("localhost","root","schoenermarck")
or die (mysql_error());

mysql_select_db("cu_wiki", $users);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, password) VALUES('$username', '$password')";
	
$sql2="SELECT * FROM users";

$result = mysql_query($sql2, $users);

if($username == "" or $password == ""){
		header("Location: create_account.php?miss=1"); //Redirect to the previous form with an error variable
		die(); //In case something weird happens and the redirect doesn't occur</body><html>
					
}

while($row = mysql_fetch_array($result)){
		
	if($username == $row['username']){
		header("Location: create_account.php?same=1"); //Redirect to the previous form with an error variable
		die(); //In case something weird happens and the redirect doesn't occur</body><html>
					
	}
}
	
mysql_query($sql, $users);	
echo "<b><h3>Thank you, your account has been created.";
?> <html><body><form action = "index.php"><input type = "submit" value = "Go back"></body><html><?php
?>

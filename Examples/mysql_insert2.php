<!-- This page only to be redirected to from mysql_insert.php -->
<html>
<body>
<?php

//Attempt to connect to the MySQL server and access the 'accounts' database
$accounts = mysql_connect("localhost", "root", "babak16") or die(mysql_error());
mysql_select_db("accounts", $accounts);

//Fetch variables from the previous form
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$icecream = $_POST['icecream'];

//Check if any fields were left blank
if($username=="" or $password=="" or $password2==""){
	header("Location: mysql_insert.php?miss=1"); //Redirect to the previous form with an error variable
	die(); //In case something weird happens and the redirect doesn't occur
}
//If password and confirm password don't match
if($password != $password2){
	header("Location: mysql_insert.php?passmm=1");
	die();
}

if($name=="" && $icecream==""){
	$sql = "INSERT INTO users2 (Username, Password) VALUES('$username', '$password')";
} else if($name == ""){
	$sql = "INSERT INTO users2 (Username, Password, IceCream) VALUES('$username', '$password', '$icecream')";
} else if($icecream == ""){
	$sql = "INSERT INTO users2 (Username, Password, Name) VALUES('$username', '$password', '$name')";
} else{
	$sql = "INSERT INTO users2 (Username, Password, Name, IceCream) VALUES('$username', '$password', '$name', '$icecream')";
}

mysql_query($sql, $accounts) or die(mysql_error());

echo "Account '$username' created successfully!";
?>

<form action="index.php">
	<input type="submit" value="Back">
</form>

</body>
</html>
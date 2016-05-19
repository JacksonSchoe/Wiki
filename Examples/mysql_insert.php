<html>
<body style="background-color:lightgrey;">

<font face="britannic"><h2>Create New Account</h2></font>

<?php
$colorfields = 'black';
$coloruserf = 'black';
//If a mandatory field was left blank
if(isset($_GET['miss'])){
	if($_GET['miss'] == 1){
		$colorfields = 'red';
		$coloruserf = 'red';
		echo '<p><font color="red">One or more required fields were not filled out</font></p>';
	}
}
//If passwords did not match
if(isset($_GET['passmm'])){
	if($_GET['passmm'] == 1){
		echo '<p><font color="red">Passwords entered did not match!</font></p>';
	}
}
?>

<form action="mysql_insert2.php" method="POST">
	<b><font color="<?php echo $coloruserf; ?>">Username*</font></b><br><input type="text" name="username"><br>
	<b><font color="<?php echo $colorfields; ?>">Password*</font></b><br><input type="password" name="password"><br>
	<b><font color="<?php echo $colorfields; ?>">Confirm Password*</font></b><br><input type="password" name="password2"><br>
	<b>Name</b><br><input type="text" name="name"><br>
	<b>Favorite Ice Cream</b><br><input type="text" name="icecream"><br>
	<br><input type="submit" value="Confirm">
	<br><h6><font color="<?php echo $colorfields; ?>">* are required fields</font></h6>
</form>

</body>
</html>

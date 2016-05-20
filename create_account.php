<html>
<body>
<?php include('header.html'); ?>

<h1>Welcome to the account creator!</h1>

<?php
$colorfields = 'black';
$coloruserf = 'black';
//If a mandatory field was left blank
if(isset($_GET['same'])){
	if($_GET['same'] == 1){
		$coloruserf = 'red';
		echo '<p><font color="red">This username has been taken, please use another name.</font></p>';
	}
}
/*
if(isset($_GET['miss'])){
	if($_GET['miss'] == 1){
		$colorfields = 'red';
		$coloruserf = 'red';
		echo '<p><font color="red">One or more required fields were not filled out</font></p>';
	}
}
*/
?>


<form action = "create_account2.php" method = "POST">
<b><font color="<?php echo $coloruserf; ?>">Username*</font></b><br><input type="text" name="username" maxlength="30" required="required"><br>
<b><font color="<?php echo $colorfields; ?>">Password*</font></b><br><input type="password" name="password" maxlength="30" required="required"><br>
<br><input type="submit" value="Confirm">
</form>
<h6><font color="<?php echo $colorfields; ?>">* are required fields</font></h6>


</body>
</html>
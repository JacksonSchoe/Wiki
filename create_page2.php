<html>
<body>
<?php include("header.html"); ?>

<!-- Creating the page and inserting it into the database -->
<?php
$database  = mysql_connect("localhost","root","schoenermarck") or die (mysql_error());
mysql_select_db("cu_wiki", $database) or die (mysql_error());
$title = $_POST['title'];
$title = addslashes($title);
$body = $_POST['body'];
$body = addslashes($body); //Adds slashes to avoid character conflict
if($logged_in){ //This variable is set in the header
	//$username is also set in the header
	$sql = "INSERT INTO pages (title, body, last_edit) VALUES('$title', '$body', '$username')";
} else { //If the user is not logged in
	$sql = "INSERT INTO pages (Title, Body) VALUES('$title', '$body')";
}

$sql2 = "SELECT * FROM pages WHERE title = '$title'";
$result = mysql_query($sql2, $database) or die (mysql_error());


//While loop to search through the database checking to see if the title the user put is already in use
while($row = mysql_fetch_array($result)){
	if($title == $row['title']){
		header("Location: create_page.php?same=1&title=$title"); //Redirect to the previous form with an error variable
		die(); //In case something weird happens and the redirect doesn't occur
	}
}


mysql_query($sql, $database) or die (mysql_error());

echo "A page for $title has been created!<br><br>";
?>

<form action="index.php" method="get">
	<input type="submit" value="Back">
</form>
<form action="page.php">
	<!-- The hidden field is needed to be able to reference whatever page the user created -->
	<input type="hidden" name="page" value=<?php echo "$title"; ?>>
	<input type="submit" value="Go to your page">
</form>

</body>
</html>
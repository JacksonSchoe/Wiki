<html>
<body>
<?php include('header.html');

// Creating the page and inserting it into the database

$database  = mysql_connect("localhost","root","babak16") or die (mysql_error());
mysql_select_db("cu_wiki", $database) or die (mysql_error());
$body = $_POST['body'];
$title = $_POST['page'];
$title = str_replace('_', ' ', $title); //Fix issues with spaces in the URL
$body = addslashes($body); //Adds slashes to avoid character conflict
if($logged_in){ //This variable is set in the header
	//$username is also set in the header
	$sql = "UPDATE pages SET body='$body', last_edit='$username' WHERE title='$title'";
} else { //If the user is not logged in
	$sql = "UPDATE pages SET body='$body', last_edit='Anonymous' WHERE title='$title'";
}
$sql2 = "SELECT * FROM pages WHERE title = '$title'";
$result = mysql_query($sql2, $database) or die (mysql_error());


//While loop to search through the database to find the appropriate page
while($row = mysql_fetch_array($result)){
	if($title == $row['title']){
		mysql_query($sql, $database) or die (mysql_error());
	}
}

echo "The page for $title has been updated!<br><br>";
$title = str_replace(' ', '_', $title); //Fix issues with spaces in the URL
?>
<form action="page.php">
	<!-- The hidden field is needed to be able to reference whatever page the user created -->
	<input type="hidden" name="page" value=<?php echo "$title"; ?>>
	<input type="submit" value="Go to your page">
</form>

</body>
</html>
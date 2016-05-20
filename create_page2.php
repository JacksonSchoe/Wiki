<html>
<body>
<?php include("header.html"); ?>

<!-- Creating the page and inserting it into the database -->
<?php
$database  = mysql_connect("localhost","root","babak16") or die (mysql_error());
mysql_select_db("cu_wiki", $database) or die (mysql_error());
$title = $_POST['title'];
$title = addslashes($title);
$body = $_POST['body'];
$body = addslashes($body); //Adds slashes to avoid character conflict
$sql = "INSERT INTO pages (Title, Body) VALUES('$title', '$body')";
$sql2 = "SELECT * FROM pages";
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
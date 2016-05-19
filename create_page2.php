<html>
<body>
<?php include("header.html"); ?>

<!-- Page content starts here -->
<?php
$pages  = mysql_connect("localhost","root","notarealpassword") or die (mysql_error());
mysql_select_db("cu_wiki", $pages);
$title = $_POST['title'];
$body = $_POST['body'];
$sql = 
mysql_query($sql, $accounts);
?>

</body>
</html>

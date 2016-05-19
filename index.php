<html>
<body>

<!-- Style tags below are CSS for the sidebar-->
<style>
.clearFix {
    clear: both;
}

#sidebar {
    width: 150px;
    height: 400px;
    background-color: lightgrey;
    float: left;
}
</style>

<!-- Website HTML begins here -->
<form action="index.php">
	<DIV style="position:absolute; top:200px; left:200px;">Home page</DIV>
	<center><input type="image" src="cw_logo.png" alt="Home Page"></center><br><br><br>
</form>

<div id="sidebar">
<form action="create_page.php">
	<center><br><input type="submit" value="Create New Page"></center>
</form>
</div>
<div align="right">
<form action="search.php" method="GET">
	<input type="text" name="search_term">
	<input type="submit" value="Search">
</form>

</html>
</body>

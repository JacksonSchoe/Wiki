<html>
<body>

<!-- Style tags below are CSS for the sidebar-->
<style>
<!-- I don't actually know clearfix is for but it might fix something -->
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
	<center><input type="image" src="cw_logo.png" alt="Home Page"></center><br><br><br>
</form>

<div id="sidebar">
<form action="create_page.html">
	<center><br><input type="submit" value="Create New Page"></center>
</form>
<form action="create_account.php">
	<center><br><input type="submit" value="Create New Account"></center>
</form>

</div>
<div align="right">
<form action="search.php" method="GET">
	<input type="text" style="width: 300px;" name="search_term">
	<input type="submit" value="Search">
</form>
</div>

<!-- Page content starts here -->
<div style="position:relative; left:20px;">This is the home page</div>

</html>
</body>

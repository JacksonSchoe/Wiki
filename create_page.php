<html>
<body>
<?php include("header.html"); ?>

<!-- Page content starts here -->
<div style="position:relative; left:20px;">
<form action = "create_page2.php" method = "get">
<b>Title for your page:<br></b> <input type = "text" name ="title"> <br><br>
<b>Text about your page:<br></b> <textarea name = "body" rows="10" cols="40"></textarea> <br>
</div>
<div style="position:absolute; left:180px;">
<input type="submit" value="Create Page">
</div>
</form>

</body>
</html>

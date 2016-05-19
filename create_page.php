<html>
<body>
<?php include("header.html"); ?>

<!-- Page with two text fields to create a new wiki page -->
<form action = "create_page2.php" method = "POST">
<b>Title for your page:<br></b> <input type = "text" name ="title"> <br><br>
<b>Text about your page:<br></b> <textarea name = "body" rows="10" cols="40"></textarea> <br>
</div>
<div style="position:absolute; left:180px;">
<input type="submit" value="Create Page">
</form>

</body>
</html>
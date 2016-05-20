<html>
<body>
<?php include("header.html"); ?>

<!-- Page with two text fields to create a new wiki page -->
<form action = "create_page2.php" method = "POST">
<p><input type="submit" value="Create Page"></p>
<b>Title for your page:<br></b> <input type = "text" name ="title" placeholder="Title" required="required"> <br><br>
<b>Text about your page:<br></b> <textarea name = "body" rows="10" cols="40" placeholder="Text" required="required"></textarea> <br>
</div>
</form>

</body>
</html>
<html>
<body>
<?php include("header.html"); 

//Checks to see if the same title is already in use and if it is display the appropriate error message 
//and prompt the user to go to the page with the title they've inputted 
if(isset($_GET['same'])){
	if($_GET['same'] == 1){
		$title = $_GET['title'];
		
		$coloruserf = 'red';
		echo '<p><font color="red">The title you have have requested is already in use. Visit the page here:</font></p>';
		?>
		
		<form action="page.php">
		<!-- The hidden field is needed to be able to reference whatever page the user created -->
		<input type="hidden" name="page" value=<?php echo "$title"; ?>>
		<input type="submit" value="Go to your page">
		</form>
		
		
		<?php
		
		
	}
}

?>


<!-- Page with two text fields to create a new wiki page -->
<form action = "create_page2.php" method = "POST">
<p><input type="submit" value="Create Page"></p>
<b>Title for your page:<br></b> <input type = "text" name ="title" placeholder="Title" required="required"> <br><br>
<b>Text about your page:<br></b> <textarea name = "body" rows="10" cols="40" placeholder="Text" required="required"></textarea> <br>
</div>
</form>

</body>
</html>
<html>
<body>
<?php include('header.html');

// This page displays any wiki page in the database

if(isset($_GET['page'])){ //'page' is what wiki page the user is visiting
	$page = $_GET['page'];
	$page = str_replace('_', ' ', $page);
	
	//Connecting to the MySQL database and opening the 'pages' table
	$database = mysql_connect("localhost", "root", "babak16") or die(mysql_error());
	mysql_select_db("cu_wiki", $database) or die (mysql_error());
	$sql = "SELECT * FROM pages WHERE title = '$page'";
	$result = mysql_query($sql, $database) or die (mysql_error());
	
	$match = false; //Boolean to represent if the page was found
	while($row = mysql_fetch_array($result)){ //Loop through each page in the table
		if($row['title'] == $page){ //If the current table entry is the correct one
			//Record the relevant info and set match to true
			$title = $row['title'];
			$body = $row['body'];
			$last = $row['last_edit'];
			$match = true;
			break; //Page has been found, so stop the loop
		}
	}
	if($match){ //Display the page
		echo "<h1>$title</h1>";
		$title = str_replace(' ', '_', $title);
		?>
		<form action = "edit2.php" method = "POST">
			<textarea name = "body" rows="10" cols="40" placeholder="Text" required="required"><?php echo $body; ?></textarea>
			<input type="hidden" name="page" value=<?php echo "$title"; ?>>
			<p><input type="submit" value="Submit Changes"></p>
		</form>
		<form action="page.php">
			<!-- The hidden field is needed to be able to reference whatever page the user created -->
			<input type="hidden" name="page" value=<?php echo "$title"; ?>>
			<input type="submit" value="Discard Changes">
		</form>
		<?php
	} else { //If the page can't be found
		echo "<div style='position:relative; left:20px;'><p><b>Uh-oh! Something went wrong!</b></p>";
		echo "<form action='index.php'><input type='submit' value='Back'></form></div>";
	}
} else { //If no page variable is set, the user manually typed in an invalid URL
	echo "<div style='position:relative; left:20px;'><p><b>Uh-oh! Something went wrong!</b></p>";
	echo "<form action='index.php'><input type='submit' value='Back'></form></div>";
}


?>

</body>
</html>
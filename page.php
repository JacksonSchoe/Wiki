<html>
<body>
<?php include("header.html"); ?>

<!-- This page displays any wiki page in the database -->
<?php
if(isset($_GET['page'])){ //'page' is what wiki page the user is visiting
	$page = $_GET['page'];
	
	//Connecting to the MySQL database and opening the 'pages' table
	$database = mysql_connect("localhost", "root", "babak16") or die(mysql_error());
	mysql_select_db("cu_wiki", $database);
	$sql = "SELECT * FROM pages";
	$result = mysql_query($sql, $database);
	
	$match = false; //Boolean to represent if the page was found
	while($row = mysql_fetch_array($result)){ //Loop through each page in the table
		if($row['Title'] == $page){ //If the current table entry is the correct one
			//Record the relevant info and set match to true
			$title = $row['Title'];
			$body = $row['Body'];
			$match = true;
			break; //Page has been found, so stop the loop
		}
	}
	if($match){ //Display the page
		echo "<div style='position:relative; left:20px;'><h1>$title</h1>";
		echo "<p>$body</p></div>";
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
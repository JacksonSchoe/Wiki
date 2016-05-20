<?php
include('header.html');

if(isset($_GET['search'])){
	$search = $_GET['search'];
	//Connecting to the MySQL database and opening the 'pages' table
	$database = mysql_connect("localhost", "root", "babak16") or die(mysql_error());
	mysql_select_db("cu_wiki", $database) or die (mysql_error());
	$sql = "SELECT * FROM pages"; // WHERE title LIKE '$search'
	$result = mysql_query($sql, $database) or die (mysql_error());
	$found = false;
	echo "<h2><p>Results:</p></h2>";
	$findings = array();
	while($row = mysql_fetch_array($result)){
		$title = $row['title'];
		$findings[$title] = similar_text(strtolower($search), strtolower($title));
		//$findings[$title] = levenshtein($search, $title);
		$found = true;
	}
	if(!$found){ //If there are no matches
		echo "<div style='position:relative; left:20px;'><p><b>No pages found for your search!</b></p>";
		echo "<form action='index.php'><input type='submit' value='Back'></form></div>";
	} else {
		//var_dump($findings);
		asort($findings);
		$findings = array_reverse($findings);
		//var_dump($findings);
		foreach($findings as $finding=>$value){
			$acceptable = strlen($search)*0.5; //Threshold of how close string must be
			if($value >= $acceptable){
				echo "<h3><p><a href=\"page.php?page=$finding\">$finding</a></p></h3>";
			}
		}
	}
} else { //If no page variable is set, the user manually typed in an invalid URL
	echo "<div style='position:relative; left:20px;'><p><b>Uh-oh! Something went wrong!</b></p>";
	echo "<form action='index.php'><input type='submit' value='Back'></form></div>";
}

?>
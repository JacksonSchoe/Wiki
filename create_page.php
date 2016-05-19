<?php

$pages  = mysql_connect("localhost","root","schoenermarck")
or die (mysql_error());

mysql_select_db("cu_wiki", $pages);

$title = $_GET['title'];
$body = $_GET['body'];

mysql_query($sql, $accounts);

?>
<html>
<body>
<?php
include("header.html");

//Set expiration time to the past to destroy the cookie
$past = time() - 100;
setcookie('ID_cu_wiki', 'gone', $past);
setcookie('KEY_cu_wiki', 'gone', $past);
?>

You have successfully logged out!
<form action = "index.php"><input type = "submit" value = "Back"></form>

</body>
</html>
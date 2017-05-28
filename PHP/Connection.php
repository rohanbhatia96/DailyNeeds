<html>
<head>
<title> Connection Page </title>
<body>
<?php 

$server = "localhost";
$username = "root";
$pass = "";

// Create Connection
$conn = new mysqli($server, $username, $pass);

// Check Connection 
 
if (mysqli_connect_error()) 
{ 
	die('Could not connect to MySQL: ' . mysql_error());
} 




// Open Database

mysqli_select_db($conn,"daily_needs");



?>

</body>
</html>
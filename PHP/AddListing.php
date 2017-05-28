<html>
<head>
<title>Login</title>
</head>
<body>
<br>
<script type="text/javascript"> 
function callme()
{
alert("Listing Added");

window.open("../HTML/Seller Home.html","_self");
}
</script>
 
<?php 
include 'Connection.php' ;
$pn=$_POST["pname"];
$pr=$_POST["mrp"];
$qn=$_POST["qnty"];
$dt=$_POST["dat"];
$si=$_POST["sec_id"];

$sql_1 = "SELECT Prod_ID from products;"; 
$result_1 = $conn->query($sql_1);
$id=($result_1->num_rows)+1;
	

$sql="INSERT INTO products VALUES ('$id', '$pn', '$pr', '$dat', '$si', '$qn');";
if($conn->query($sql) )
{	echo '<script type="text/javascript">'
 , 'callme();'
 , '</script>'
;
}
else
echo 'Listing Error';

?>
</body>
</html>
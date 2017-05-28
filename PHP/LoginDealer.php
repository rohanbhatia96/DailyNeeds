<html>
<head>
<title>Login</title>
</head>
<body>
<br>
<script type="text/javascript"> 
function callme()
{
alert("Login Successful");

window.open("../HTML/Seller Home.html","_self");
}
</script>
 
<?php 
include 'Connection.php' ;
$em= $_POST["email"];
$ps=$_POST["pass"];
$sql = "SELECT Dealer_Email, Dealer_Password from dealers where ( Dealer_Email='$em' AND Dealer_Password='$ps' );"; 
$result = $conn->query($sql);

if( ($result->num_rows) !=0 )
{echo '<script type="text/javascript">'
   , 'callme();'
   , '</script>'
;
}
else
echo 'No Match';
?>
</body>
</html>
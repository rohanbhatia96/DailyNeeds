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

window.open("../HTML/Categories.html","_self");
}
</script>
 
<?php 
include 'Connection.php' ;
$em= $_POST["email"];
$ps=$_POST["pass"];
$sql = "SELECT Customer_Email, Customer_Password from Customers where ( Customer_Email='$em' AND Customer_Password='$ps' );"; 
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

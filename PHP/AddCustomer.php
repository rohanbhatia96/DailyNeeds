<html>
<head>
<title>Sign Up</title>
</head>
<body>
<br>
<script type="text/javascript"> 
function callme()
{
alert("Signed Up Successfully");

window.open("../index.html","_self");
}
</script>
 
<?php 
include 'Connection.php' ;
$cn=$_POST["cname"];
$cphn=$_POST["cphn"];
$cem=$_POST["cmail"];
$cpswd=$_POST["pswd"];
$sql_1 = "SELECT Customer_Email from customers;"; 
$result_1 = $conn->query($sql_1);
$id=($result_1->num_rows)+1+300;
$flag=1;
	
while($row=$result_1->fetch_assoc())
  {
  		
		if( ($row['Customer_Email']) == $cem )
		{
			echo "Email ID already Registered";
			echo "<br>";
			$flag=0;
			break;
		}	
		
		
  }

if($flag==1)
{
	$sql="INSERT INTO customers VALUES ('$id', '$cn', '$cphn', '$cem', '$cpswd');";
	if($conn->query($sql) )
	{	echo '<script type="text/javascript">'
		, 'callme();'
		, '</script>'
		;
	}
	
}	
else
echo 'Error->Try Again Later';

?>
</body>
</html>
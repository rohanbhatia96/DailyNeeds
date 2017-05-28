<html>
<head>
<title>Login</title>
</head>
<body>
<br>
<script type="text/javascript"> 

function callme()
{
alert("Order Placed");

window.open("../HTML/Categories.html","_self");
}
</script>
 
<?php 
include 'Connection.php' ;
$em=$_POST["cmail"];
$pn=$_POST["pname"];
$qn=$_POST["qnt"];

$flag=1;

$sql_1 = "SELECT Customer_ID from customers where Customer_Email='$em';"; 
$result_1 = $conn->query($sql_1);
if( ($result_1->num_rows) == 0 )
{	echo 'Email ID Not Registered.';
	$flag=0;
}
$sql_2= "SELECT Prod_ID,MRP,Sec_ID,Quantity from products where Prod_Name='$pn';";
$result_2 = $conn->query($sql_2);
if( ($result_2->num_rows) == 0 )
{	echo 'Invalid Product Name.';
	$flag=0;
}
$row_1=$result_1->fetch_assoc();
$row_2=$result_2->fetch_assoc();

$cus=$row_1['Customer_ID'];
$sec=$row_2['Sec_ID'];
$qnti=$row_2['Quantity'];
$prod=$row_2['Prod_ID'];


if($qnti<$qn)
{
	echo 'Out of Stock';
	echo "<br>";
	echo 'Maximun Stock is: ';
	echo $qnti;
	$flag=0;
}



$sql_3= "SELECT Discounts from sections where Section_ID='$sec';";
$result_3 = $conn->query($sql_3);
$row_3=$result_3->fetch_assoc();

$amount=($qn)*($row_2['MRP'])*(100- $row_3['Discounts']);
$amount=$amount/100;

$sql_4= "SELECT Order_No from orders;";
$result_4 = $conn->query($sql_4);
$cnt=($result_4->num_rows)+1;


if($flag==1)
{	
	
	$sql="INSERT INTO orders VALUES ('$cnt', '$prod', '$cus', NOW(), '$qn', '$amount');";
	$conn->query($sql);
	
	$newq=$qnti-$qn;
	$sqli="UPDATE `daily_needs`.`products` SET `Quantity`='$newq' WHERE `Prod_ID`='$prod';";
	$conn->query($sqli);
	
		echo '<script type="text/javascript">'
			,'callme();'
			,'</script>'
			;
	
}
else
{
	echo "<br>";
	echo 'Order not placed';
}
?>
</body>
</html>
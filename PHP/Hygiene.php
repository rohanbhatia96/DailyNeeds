<html>
<head>
<title>Hygiene</title>
</head>
<body>
<img src="../Images/Hygiene.jpg" width="1024" height="274" border="0" usemap="#map1">
<map name="map1">
<area shape="rect" coords="885,17,1014,43" href="../index.html">
<area shape="rect" coords="19,18,187,42" href="../HTML/Categories.html"></map>

<br><br><br><br><br><br>
<font face="verdana" color="blue">
<div align = "left">
<h3><b>Product Name &nbsp; &nbsp; &nbsp; &nbsp; Price  </b></h4>
<br><br><br>
<?php 

include 'Connection.php' ;

$sql = "SELECT Prod_Name, MRP from products where Sec_ID = 105;"; 
  $result = $conn->query($sql);
  
  while($row=$result->fetch_assoc())
  {
  		
		echo $row['Prod_Name'];
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $row['MRP'];
		echo "<br>";
		
  }

?>
</div>
</font>

<br><br><br>
<div align = "center">
<form action="../HTML/Order.html" method="post">
	<input type="submit" name="submit" value="Click To Buy Now" />
</form>
</div>

</body>
</html>

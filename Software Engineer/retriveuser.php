<!DOCTYPE html>
<html>
<head>

	<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql1 = "SELECT  *  FROM `user`";
$result1 = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1) > 0)
{

	$RIDs= 0;
	$y = 0;
	echo  "<table>";

	while($row = mysqli_fetch_array($result1))
	{
	$R = $row['typeId'];
	$sql3 = "SELECT Type FROM `usertype` WHERE id='$R'";
	$result3 = mysqli_query($conn, $sql3);
	while ($x = mysqli_fetch_array($result3)) {
	$RIDs= $x[0];
}
		echo "<tr>	
		<td>".$row['id']."</td>
		<td>".$row['firstName']."</td>
		<td>".$row['lastName']."</td>
		<td>".$RIDs."</td>
		</tr>";


	}
	echo "</table>";
$y = $y + 1;
}
	?> 
	<title></title>
</head>
<body>




</body>
</html>
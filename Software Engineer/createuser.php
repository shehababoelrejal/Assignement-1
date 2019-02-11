<!DOCTYPE html>
<html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$Rs = array();
$sql2 = "SELECT  Type  FROM `usertype`";
$result2 = mysqli_query($conn, $sql2);
while ($x = mysqli_fetch_array($result2)) {
    global $Rs;
array_push($Rs, $x[0]);
}


$RIDs =0;

?>

<head>
	<title>CreateUser</title>
</head>
<body>

<form method="post" >
	<label>FirstName: <label>
    <input type="text" name="FName"><br>
	<label>LastName: <label>
	<input type="text" name="LName"><br> 
	<label>Date Of Birth: <label>
	<input type="date" name="DOB"><br>
	<label> Gender: <label>
<select name = "Gender">
	<option>Male</option>
	<option>Female</option>
</select>
<br>
<label>Role</label>
	<select name = "Type">

  <?php 
  
   $length = count($Rs);  
 	for ($x = 0; $x <count($Rs); $x++)    
    {
    	$Rid = $RIDs[$x];

    ?>
<option name="Type" > <?php  echo $Rs[$x]; ?>  </option>

<?php
    }
 ?>

	</select>
	<br>
	<input type="submit" name="submit">
	<br>
</form>


<?php
$con = new mysqli("localhost", "root", "","pharmacy");
if(isset($_POST['submit']))
{
$R = $_POST['Type'];
$sql3 = "SELECT id FROM `usertype` WHERE Type='$R'";
$result3 = mysqli_query($conn, $sql3);
while ($x = mysqli_fetch_array($result3)) {
$RIDs= $x[0];
}
//echo $RIDs;
	$F = $_POST['FName'];
	$L = $_POST['LName'];
 	$D = $_POST['DOB'];
    $G = $_POST['Gender'];
    $R = $RIDs;
$sql = "Insert INTO user (typeId,dob,gender,firstName,lastName)  	 values('".$R."','".$D."','".$G."','".$F."','".$L."')" ;
     mysqli_query($con,$sql);
}
?>



</body>
</html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$pasword = "";
$dbname = "pharmacy";
// create connection
$dele = $_SESSION["username"];
$conn = mysqli_connect($servername, $username, $pasword, $dbname);
$sql2 = "DELETE FROM user WHERE username = '$dele'";
mysqli_query($conn, $sql2);
mysqli_close($conn);
?>
<?php
session_start();
$servername = "localhost";
$username = "root";
$pasword = "";
$dbname = "pharmacy";
// create connection
$conn = new mysqli ($servername, $username, $pasword, $dbname);
echo "
<head>
<title> edit </title>
</head>
<h1> Edit Profile </h1>
<form action='' method='post'>
    <table>
    <tr><td><label>FirstName:</label></td>
    <td><input type='text' value='".$_SESSION['FirstName']."' name='FirstName'></td></tr>
    <tr><td><label>LastName:</label></td>
    <td><input type='text' value='".$_SESSION['LastName']."' name='LastName'></td></tr>
    <tr><td><label>username:</label></td>
    <td><input type='text' value='".$_SESSION['username']."' name='username'></td></tr>
    <tr><td><label>Password:</label></td>
    <td><input type='text' value='".$_SESSION['Password']."' name='Password'></td></tr>
    <tr><td><label>Date of Birth:</label></td>
    <td><input type='date' name='DOB' value='".$_SESSION['DOB']."'></td></tr>
    <tr><td  colspan='2'id='editsubmit'><input type='submit' value='submit' name='edit'></td></tr> 
    </table>
    </form>";
if(isset($_POST['edit']))
{ 
    // check if form was submitted
    $sql = "update user set firstName = '" . $_POST["FirstName"] . 
	"' , lastName ='" . $_POST["LastName"] .  
	"' , username ='" . $_POST["username"] . 
    "' , password ='" . $_POST["Password"] . 
    "' , dob ='" . $_POST["DOB"] . 
    "'   WHERE username = '" . $_SESSION["username"] . "'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $_SESSION["FName"] = $_POST["FirstName"];
        $_SESSION["LName"] = $_POST["LastName"];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["Password"] = $_POST["Password"];
        $_SESSION["DOB"] = $_POST["DOB"];
        header("Location:Login.php");
    }
    else
    {
        return $sql;
    }
}
?>

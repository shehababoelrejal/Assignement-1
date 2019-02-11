<html>
<title></title>
<?php
session_start();
$servername = "localhost";
$username = "root";
$pasword = "";
$dbname = "pharmacy";

// create connection
$conn = new mysqli ($servername, $username, $pasword, $dbname);
//Link between pages and user
if(isset($_POST['submit'])){ // check if form was submitted
    $sql = "select * from user where username = '" . $_POST["username"] . "' and password ='" . $_POST["password"] . "'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_array($result))
    {
        $typeId = $row["typeId"];
        $_SESSION["FirstName"] = $row["firstName"];
        $_SESSION["LastName"] = $row["lastName"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["Password"] = $row["password"];
        $_SESSION["DOB"] = $row["dob"];
        $sql2="SELECT * FROM `usertypelinks` WHERE typeId = $typeId";
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_array($result2))
        {
            $linkId = $row2["linkId"];
            $sql3="SELECT * FROM `links` WHERE id = $linkId";
            $result3 = mysqli_query($conn, $sql3);
            if($row3 = mysqli_fetch_array($result3))
            {
                $site = $row3["physicalLink"];
                $Name=$row3["linkName"];
                echo"<p><a href='$site'>$Name</a></p>";
                echo"<p><a href='Update.php'>Update</a></p>";
                echo"<p><a href='Delete.php'>Delete</a></p>";
            }
        }
    }
    else
    {
        echo "Invalid Email or Password";
    }
}
?>
</html>

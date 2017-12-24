<html>
    <head>
        <style>
            body
            {
                background-color: powderblue;
                color: maroon;
            }
            
        </style>
    </head>
<body>
<center>
    <br><br><br><br>
<h1>USER VALIDATION</h1><br><br><br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "kawshik8";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername , $username, $password , $dbname); 
// Check connection
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
//echo "success";

$pass = $_POST["pass"];
$id = $_POST['lid']; 

$sql = "SELECT name from users where id = $id and password = '$pass';";
//echo $sql;
// if($conn->query($sql) === TRUE)
// {
//     echo "success";
// }

$result = $conn->query($sql);

    // output data of each row


//$name = $result["name"];
//echo $result["name"];
if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) 
    {
    echo 'LOGIN SUCCESSFULL<br><br><br>';
    $sql1 = "INSERT into transcript(lid) values($id);";
    $result1 = $conn->query($sql1);
    echo '<form action="mainpage.php" method="post"><input type="hidden" name="id" value= '.$id.'><input type="submit" value="GO TO HOME"></form>';
    }
}
else 
{
    echo 'LOGIN FAILURE<br><br><br>';
    echo '<form action="login.html" ><input type="submit" value = "REVERT to LOGIN page"></form>';
}
?>
</center>
</body>
</html>
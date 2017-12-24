<html>
<head>
    <style>
        body
        {
            background-color:powderblue;
        }
    </style>
    </head>
<body>
    <center>
<?php 
$pass = $_POST["pass"];
$id = $_POST["user"];

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
$id = $_POST["user"];
$sql = "SELECT * from walpay where uid = $id and password = '$pass';";
//echo $sql;

$result = $conn->query($sql);

if($result->num_rows>0)
{
    echo "<br><br><br><h1>PAYMENT SUCCESSFULL</h1><br><br><br><br>";
    echo "<form action = 'trans.php' method = 'POST'><input type = 'hidden' name = 'user' value=$id><input type = 'submit' value = 'PRINT TRANSCRIPT'></form>";
}
else
{
    echo "<br><br><br><h1>PASSWORD does not MATCH</h1><br><br><br><br>";
    echo "<form action = 'payment.php'><input type = 'submit' value = 'PAYMENT PAGE'></form>";
}
?>
</center>
</body>
</html>

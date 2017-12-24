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
 
$name = $_POST["wallet"];
$phno = $_POST["phno"];
$id = $_POST["user"];

$sql = "SELECT * from walpay where uid = '$id' and walname = '".$name."' and phno = ".$phno." ;";
//echo $sql;
$result = $conn->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) 
    {
        echo "<br><br><br><h1>".$row["walname"]."</h1><br><br><br><br>";
        echo "<form action = 'authpay.php' method = 'POST'><input type = 'hidden' name ='user' value=$id><input type = 'password' name = 'pass' placeholder = 'PASSWORD'><br><br><input type ='submit' value = 'Validate Payment'></form>";
    }
}

else
{
    echo "<h1>Details INCORRECT</h1>";
    echo "<form action = 'payment.php'><input type = 'submit' value = 'Go to Payment Page'></form>";
}
?>
</center>
</body>
</html>

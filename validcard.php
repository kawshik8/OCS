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
 
$cno = $_POST["cardno"];
$cvv = $_POST["cvv"];
$expd = $_POST["expiry"];
$id = $_POST["user"];

$sql = "SELECT * from cardpay where uid = '$id' and cardno = ".$cno." and cvv = ".$cvv." and expiry = '".$expd."' ;";
//echo $sql;
$result = $conn->query($sql);

if($result->num_rows>0)
{
    echo "<h1>PAYMENT GATEWAY</h1>";
    echo "<form action = 'authpay.php' method = 'POST'><input type = 'hidden' name ='user' value=$id><br><br><input type = 'password' name = 'pass' placeholder = 'PASSWORD'><br><br><br><input type ='submit' value = 'Validate Payment'></form>";
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

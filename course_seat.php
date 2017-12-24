<html>
    <head>
        <style>
            table
            {
                margin-top:100px;
            }
            table, th, td
            {
                border: 1px solid black;
                border-collapse: collapse;
                width:90%;
            }
            th
            {
                height: 50px;
            }
        </style>
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
$id = $_POST["user"];
$sql = "SELECT name from users where id = $id";
//$name = $_POST["name"];
//echo $sql;

$result = $conn->query($sql);

$clg = $_POST["college"];
$id = $_POST["user"];

$sql1 = "SELECT name from college where clgid = '".$clg."';";
$result1 = $conn->query($sql1);

if($result1->num_rows>0)
{
    $row = $result1->fetch_assoc();
    echo "<h1>".$row["name"]."</h1>";
    $sql = "UPDATE transcript set college = '".$row['name']."' where lid=$id;";
    //echo $sql;
    $result2 = $conn->query($sql);
}
else
{
    echo "BYEEEEE"; 
}

//echo "<h1>".$row["name"]."</h1>";

$sql = "SELECT * from courses where clgid = '".$clg."';";

$result = $conn->query($sql);

echo "<table id = 'tab'><tr><th>COURSES</th><th>GENERAL QUOTA</th><th>SPORTS QUOTA</th><th>FOUNDERS QUOTA</th></tr>";
if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        $cname = $row["name"];
        echo "<tr><td>".$row["course"]."    -   ".$row["name"]."</td><td>".$row["general"]."</td><td>".$row["sports"]."</td><td>".$row["founders"]."</td></tr>";
    }     
}
else
{
    echo "HHAAAAAHAHAHAHAHAH";
}

$result = $conn->query($sql);
$id = $_POST["user"];
//echo $id;
echo "</table><br><br><br><form action = 'payment.php' method='post'>";
echo "<input type='text' name='course' placeholder='COURSE' pattern = [A-Z]{3,5} required><br><br>";
//echo "<input type = 'hidden' name = 'cname' value = '$'>";
echo "<input type='text' name ='quota' placeholder='QUOTA'><br><br>";
echo "<input type = 'hidden' name = 'user' value = $id>";
echo "<input type = 'hidden' name = 'college' value = '$clg'>";
echo "<input type ='submit' name ='seatc' value='confirm_seat'>";
?>
</form>
</center>
</body>
</html>


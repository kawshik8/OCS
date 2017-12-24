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
                
            }
            th
            {
                height: 50px;
            }
            body
            {
                background-color:powderblue;
            }
        </style>
        </head>
<body>
    <center>
<h1> Transcript </h1>
<table>
<tr>
    <th>LOGIN ID</th>
    
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
//echo $id;
$sql = "SELECT * from transcript where lid = $id;";
//echo $sql;
$result = $conn->query($sql);

if($result->num_rows>0)
{
    
    while($row = $result->fetch_assoc())
    {
        $id = $row["lid"];
        $name = $row["name"];
        $college = $row["college"];
        $course = $row["course"];
        $quota = $row["quota"];
        echo "<td>$id</td></tr>";
        echo "<tr><th>NAME</th><td>$name</td></tr>";
        echo "<tr><th>COLLEGE</th><td>$college</td></tr>";
        echo "<tr><th>COURSE</th><td>$course</td></tr>";
        echo "<tr><th>QUOTA</th><td>$quota</td></tr>";
    }
}
else
{
    echo "HAHAHAHHAHAH";
}
?>
</table>
<br><br><form action = 'login.html'><input type = 'submit' value = 'logout'></form>
</center>
</body>
</html>

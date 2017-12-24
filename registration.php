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
<h1>REGISTRATION</h1><br><br><br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "kawshik8";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername , $username, $password, $dbname); 
// Check connection
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT MAX(id) FROM users;";
$results = $conn->query($query);
$row = $results->fetch_assoc();
$id = $row['MAX(id)'] + 1;
$name = $_POST['uname'];
$pass = $_POST['upass'];

// echo $id;
// echo $name;
// echo $pass;

$sql = "SELECT * from users where name = '$name'";
$result = $conn->query($sql);

//echo $sql;

if($result->num_rows==0)
{
    $sql1 = "INSERT INTO users VALUES(".$id.",'".$name."','".$pass."');";
    
    if($conn->query($sql1))
    {
    echo "<br><br><h1>Updated Database Successfully</h1><br><br>";
    echo "<h3>Your APPLICATION NO is $id</h3>";
    $sql2 = "INSERT into transcript(name,lid) values('$name',$id);";
    //echo $sql2;
    $result2 = $conn->query($sql2);

    echo "<form action='mainpage.php' method='post'><input type='hidden' name='id' value= ".$id."><input type = 'submit' value='Go to MainPage'></form>";
    }
    else
    {
        echo "HAHAHAH";
    }
}
else
{
    echo "<br><br><h1>Registration Unsuccessful (USERNAME ALREADY EXISTS)</h1><br><br>";
    echo "<form action='login.html'><input type = 'submit' value='Revert to LOGIN Page'></form>";    
}

?>
</center>
</body>
</html>






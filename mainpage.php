<html>
<body>
    <style>
        body
        {
            background-color:powderblue;
        }
    </style>
<center>
    <br><br><br><br>
<h1>Online Counselling System</h1><br><br><br><br>
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
$id = $_POST["id"];
//echo $id;

$sql = "SELECT name from users where id = $id";
//$name = $_POST["name"];
//echo $sql;

$result = $conn->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
    $username = $row["name"];
    echo 'Hi '.$row["name"];
    echo '<br><br><br>';
    }
}
$sql1 = "UPDATE transcript set name = '$username' where lid = $id;";
//echo $sql1;
$result1 = $conn->query($sql1);

echo "<form action = 'course_seat.php' method = 'post'>";
echo "<input type = 'hidden' name = 'user' value=$id>";
?>

<select name="college">
    <option value="SELECT COLLEGE" selected>SELECT COLLEGE</option>
    <option value="SSN">SSN College Of Engineering</option>
    <option value="MIT">Madras Institute of Technology</option>
</select>
<br><br><br>
<input type="submit" name = "submit" value = "Next">
</form>

<?php
// $selected_val = $_POST['Color'];  // Storing Selected Value In Variable
// echo "You have selected :" .$selected_val;  // Displaying Selected Value 

$selected_val = $_POST["college"];
//if($selected_val)
//echo "<h1>".$selected_val."</h1>";       //$selected_val
echo "<input type = 'hidden' name = 'college' value= ".$selected_val.">";

?>

</form>
</center>
</body> 
</html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usernames = $_POST['username'];

$pass = $_POST['passwords'];

if(empty($usernames))
{
    echo "The User Name is a required field and cannot be blank.</br>";
}

if (empty($pass))
{
    echo "The Password is a required field and cannot be blank. </br>" ;
}

$servername = "localhost";
$username = "root";
$password = "root";
$database_name = "activity1";





// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully </br>";

$sql = "SELECT * FROM `users` WHERE `USERNAME` LIKE '$usernames' AND `PASSWORD` LIKE '$pass' ORDER BY `USERNAME` ASC ";

$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) == 1)
{
    echo "Login was successfull<br>";
}

if (mysqli_num_rows($result) == 0)
{
    echo "Login failed<br>";
}

if (mysqli_num_rows($result) >= 2)
{
    echo "There are multiple users have registered<br>";
}
mysqli_close($conn);

?>





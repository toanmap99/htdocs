<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$firstName = $_POST['FirstName'];

$lastName= $_POST['LastName'];

$username = $_POST['username'];

$pass = $_POST['passwords']; 

$servername = "localhost";
$username = "root";
$password = "root";
$database_name = "activity1";





// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);


if(empty($firstName))
{
   echo "The First Name or is a required field and cannot be blank.</br>";
   mysqli_close($conn);
}

if (empty($lastName))
{
  echo "The Last Name is a required field and cannot be blank. </br>" ;
  mysqli_close($conn);
}





// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully </br>";

$sql = "INSERT INTO `users` (`ID`, `FIRST_NAME`, `LAST_NAME`, `USERNAME`, `PASSWORD`) VALUES (NULL, '$firstName', '$lastName', '$username', '$pass')";


if (mysqli_query($conn, $sql))
{
    echo "New record created successfully <br>";
} else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
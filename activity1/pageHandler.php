<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$firstName = $_POST['FirstName'];

$lastName= $_POST['LastName'];

if(empty($firstName))
{
   echo "The First Name is a required field and cannot be blank.</br>";
}

if (empty($lastName))
{
  echo "The Last Name is a required field and cannot be blank. </br>" ;
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

$sql = "INSERT INTO `users` (`ID`, `FIRST_NAME`, `LAST_NAME`) VALUES (NULL, '$firstName', '$lastName')";


if (mysqli_query($conn, $sql))
{
    echo "New record created successfully <br>";
} else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
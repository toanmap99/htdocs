<?php


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

$sql  = "SELECT * FROM `users` WHERE 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo "The First name is ".$row['FIRST_NAME']. "<br>";
        echo "The Last name is ".$row['LAST_NAME']. "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
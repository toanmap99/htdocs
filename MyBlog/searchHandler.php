<?php
require_once 'myFunctions.php';

$searchUser = $_GET['searchUser'];

$searchID = $_GET['ID'];

// Search Criteria username or ID
$sql = "SELECT * FROM blogpost WHERE registration_USER_NAME = '$searchUser' OR registration_ID = '$searchID'";

$conn = dbConnect();

// Output the search result
if($conn)
{
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        // If the search did not match
        if(mysqli_num_rows($result) == 0) {
            echo "Search failed.";
            exit;
        }
        
        // output the result
        while($row = mysqli_fetch_assoc($result))
        {
            echo "Username: " .$row['registration_USER_NAME']. "<br>";
            echo "Post: " .$row['blogPost']. "<br>";
            echo "============<br>";
        }
    }
    else{
        echo "Error with the SQL ". mysqli_error($conn);
    }
}
else {
    echo "Error connection ".mysqli_connect_error();
}


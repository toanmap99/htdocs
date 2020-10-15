<?php
session_start();

include 'myFunctions.php';

dbConnect();

$sql  = "SELECT * FROM `blogpost` WHERE 1";

$result = mysqli_query(dbConnect(), $sql);

if (mysqli_num_rows($result) > 0)
{
    // output the post of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['registration_USER_NAME'].":  " .$row['blogPost']. "</br>"; 
    }
    exit;
}
else
{
    echo "0 results";
    exit;
}
dbConnect()->close;


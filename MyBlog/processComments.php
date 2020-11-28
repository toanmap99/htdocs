<?php
session_start();
require_once 'myFunctions.php';

$comments = $_GET['comments'];
$id = $_GET['id'];
$rating = $_GET['rate'];
$user_ID = $_SESSION['ID'];
$user_Name = $_SESSION['USER_NAME'];


if (dbConnect() && isset($_SESSION['ID']))
{
    $sql = "INSERT INTO `comments_table` (`id`, `comments_text`, `rate`, `blogpost_ID`, `registration_ID`, `registration_USER_NAME`) VALUES (NULL, '$comments', '$rating', '$id', '$user_ID', '$user_Name');";
    
    $result = mysqli_query(dbConnect(), $sql);
    if ($result)
    {
       echo "Comment and rating inserted successfully.<br>";
       echo "Click <a href='displayAllUser.php'>Blogpost list</a> to return <br>";
            
    }
    else
    {
        echo "There was a sql problem ". mysqli_error(dbConnect());
    }
}

else
{
    echo "error connecting ".mysqli_connect_error();
}

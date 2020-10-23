<?php
session_start();
require_once 'myFunctions.php';

// get variables from the post
$post = $_GET['post'];
$id = $_GET['ID'];
$user_id = $_SESSION['ID'];
$role = $_SESSION['ROLE'];

echo "User ID ". $_SESSION['ID']. "<br>";
if (dbConnect() && isset($_SESSION['ID']) && $role = "admin")
{
   $sql = "UPDATE `blogpost` SET `blogPost` = '$post' WHERE `blogpost`.`ID` = '$id'";
   
   $result = mysqli_query(dbConnect(), $sql);
   if ($result)
   {
       echo "Post updated<br>";
       echo "Click <a href='showAdminPage.php'>Admin</a> to return <br>";
       
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


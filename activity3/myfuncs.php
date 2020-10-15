<?php

function dbConnect()
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
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
   
    return $conn;
}

function saveUserId($id)
{
    session_start();
    $_SESSION["USER_ID"] = $id;
}

function getUserId()
{
    session_start();
    return $_SESSION["USER_ID"];
}


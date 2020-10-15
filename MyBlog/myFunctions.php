<?php
function dbConnect()
{
    // to catch errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // login to the deginated database 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database_name = "myblog";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database_name);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;
}

// Save the user input value
function saveUserId($id)
{
    session_start();
    $_SESSION["ID"] = $id;
}

// Get the user ID
function getUserId()
{
    session_start();
    return $_SESSION["ID"];
}

// Save the user name
function saveUserName($name)
{
    session_start();
    $_SESSION["USER_NAME"] = $name;
}

// Get the user name
function getUserName()
{
    session_start();
    return $_SESSION["USER_NAME"];
}
<?php
session_start();

include 'myFunctions.php';


$content = $_GET['content'];
$userId = $_SESSION['ID'];
$userN = $_SESSION['USER_NAME'];

//Language Filter
$badWords = array("fuck", "asshole", "stupid", "shit");
$replace = array("****", "*******", "*****", "****");

$content = str_replace($badWords, $replace, $content);


dbConnect();

// Prevent blank space
if(empty($content))
{
    echo "Please enter your blog post.</br>";
    exit;
    dbConnect()->close;
}



// Input the value into the Database
$sql = "INSERT INTO `blogpost` (`ID`, `blogPost`, `registration_ID`, `registration_USER_NAME`) VALUES (NULL, '$content', '$userId', '$userN')";

if (mysqli_query(dbConnect(), $sql))
{
    include ('blogShowAll.php');
}

else
{
    echo "Error: " . $sql . "<br>" . mysqli_error(dbConnect());
    exit;
    dbConnect()->close;;
}









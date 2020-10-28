<?php
include 'myfuncs.php';


$firstName = $_POST['FirstName'];

$lastName= $_POST['LastName'];

$username = $_POST['username'];

$pass = $_POST['passwords']; 


dbConnect();

if(empty($firstName))
{
   echo "The First Name or is a required field and cannot be blank.</br>";
   exit;
   dbConnect()->close();
}

if (empty($lastName))
{
  echo "The Last Name is a required field and cannot be blank. </br>" ;
  exit;
  dbConnect()->close();
}


$sql = "INSERT INTO `users` (`ID`, `FIRST_NAME`, `LAST_NAME`, `USERNAME`, `PASSWORD`) VALUES (NULL, '$firstName', '$lastName', '$username', '$pass')";


if (mysqli_query(dbConnect(), $sql))
{
    echo "New record created successfully <br>";
} else 
{
    echo "Error: " . $sql . "<br>" . dbConnect()->error;
}

dbConnect()->close();
?> 
<?php
require_once 'myFunctions.php';

$itemToDelete = $_GET['ID'];

$sql  = "DELETE FROM `blogpost` WHERE `blogpost`.`ID` = '$itemToDelete'";

$result = mysqli_query(dbConnect(), $sql);

if (dbConnect())
{
    if ($result)
    {
        echo "Delete item ".$itemToDelete."<br>";
    }
}
else
{
    echo "0 results";
}
<?php
session_start();

include 'myFunctions.php';


dbConnect();


$sql  = "SELECT * FROM `blogpost` WHERE 1";

$result = mysqli_query(dbConnect(), $sql);

// Get the user that login
$row = $result->fetch_assoc();
getUserName($row["registration_USER_NAME"]);

if (mysqli_num_rows($result) > 0)
{
    // Output and permission to 
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['registration_USER_NAME'].":  " .$row['blogPost']. "</br>";
        if ($_SESSION['USER_NAME'] == $row['registration_USER_NAME'])
        {
         ?>
        <form action="processDeleteItem.php">
        <input type ="hidden" name = "ID" value = <?php echo $row['ID']?>></input>
        <button type="submit">Delete</button>
        </form>
        
        <form action="showEditForm.php">
        <input type ="hidden" name = "ID" value = <?php echo $row['ID']?>></input>
        <button type="submit">Edit</button>
        </form>
        
        <?php
        }
    }
    exit;
}
else
{
    echo "0 results";
    exit;
}
dbConnect()->close;


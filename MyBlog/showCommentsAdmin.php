<?php
session_start();
require_once 'myFunctions.php';


// Check if you are an admin
if ($_SESSION['ROLE'] != 'admin')
{
    echo "Please login as an admin<br>";
    exit;
}

$sql  = "SELECT * FROM `blogpost`";

$result = mysqli_query(dbConnect(), $sql);

if (mysqli_num_rows($result) > 0)
{
    // output the post of each row
    while($row = mysqli_fetch_assoc($result))
    {
        $blogID = $row['ID'];
        echo $row['registration_USER_NAME'].":  " .$row['blogPost']. "</br>";
        echo "Comments: <br>";
        
        //output the comments
        $sql_comments = "SELECT * FROM comments_table WHERE blogpost_ID = '$blogID'";
        $result_comments = mysqli_query(dbConnect(), $sql_comments);
        if($result_comments)
        {
            while($row_comments = mysqli_fetch_assoc($result_comments))
            {
                echo "Comment user ".$row_comments['registration_USER_NAME']."<br>";
                echo "Comment text ".$row_comments['comments_text']."<br>";
                echo "Rate ".$row_comments['rate']."<br>";
                echo "-----------------<br>";
            }
        }
        
        ?>
        <form action="processDeleteItem.php">
        <input type ="hidden" name = "ID" value = <?php echo $row['ID']?>></input>
        <button type="submit">Delete</button>
        </form>
        
        <?php
    }
}
else
{
    echo "0 results";
}

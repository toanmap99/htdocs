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
        $blogID = $row['ID'];
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
        
        echo "<br>Comments<br>";
        
        $sql_comments = "SELECT * FROM comments_table WHERE blogpost_ID = '$blogID'";
        $result_comments = mysqli_query(dbConnect(), $sql_comments);
        
        if ($result_comments)
        {
            while ($row_comments = mysqli_fetch_array($result_comments))
            {
                echo $row_comments['comments_text']."<br>";
                echo "Comment made by user ". $row_comments['registration_USER_NAME']. "<br>";
                echo "Rating made by user ". $row_comments['rate']. "<br>";
            }
        }
        ?>
         	<form action = "processComments.php">
            <input type="hidden" name = "id" value = "<?php echo $row['ID']?>"></input>
            Comments:<textarea name="comments" rows="5" cols="50"></textarea>
            <label for="rate">Rating (between 0 and 5):</label>
  			<input type="range" id="rate" name="rate" min="0" max="5" value = "<?php $row_comments['rate']?>">
            <button type = "submit">Submit Comments</button>
            </form>
            <?php 
    }
    exit;
}
else
{
    echo "0 results";
    exit;
}
dbConnect()->close;


<?php
require_once 'myFunctions.php';

$searchUser = $_GET['searchUser'];

$searchID = $_GET['ID'];

// Search Criteria username or ID
$sql = "SELECT * FROM blogpost WHERE registration_USER_NAME = '$searchUser' OR registration_ID = '$searchID'";

$conn = dbConnect();

// Output the search result
if($conn)
{
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        // If the search did not match
        if(mysqli_num_rows($result) == 0) {
            echo "Search failed.";
            exit;
        }
        
        // output the result
        while($row = mysqli_fetch_assoc($result))
        {
            $blogID = $row['ID'];
            echo "Username: " .$row['registration_USER_NAME']. "<br>";
            echo "Post: " .$row['blogPost']. "<br>";
            echo "============<br>";
            
            echo "<br>Comments<br>";
            
            $sql_comments = "SELECT * FROM comments_table WHERE blogpost_ID = '$blogID'";
            $result_comments = mysqli_query($conn, $sql_comments);
            
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
    }

}

else {
    echo "Error connection ".mysqli_connect_error();
}
?>

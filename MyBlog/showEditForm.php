<?php 
$id = $_GET['ID'];

echo "We plan to edit id ". $id."<br>";

// Select the item based on ID

require_once 'myFunctions.php';

if(dbConnect())
{
    $sql = "SELECT * FROM `blogpost` WHERE `blogpost`.`ID` = '$id' LIMIT 1";
    $result = mysqli_query(dbConnect(), $sql);
    if ($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $blogpost = $row['blogPost'];
        }
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

?>

<div class="form-container">
<h2>Edit post</h2>
<p>Fill out the require field and submit</p>
<form action = "processEditItem.php">
<input type = "hidden" name = "ID" value = "<?php echo $id;?>"></input>
Post:<textarea rows="5" cols="50" name="post"><?php echo $blogpost;?></textarea>
<button type = "submit">Submit Changes</button>
</form>
</div>
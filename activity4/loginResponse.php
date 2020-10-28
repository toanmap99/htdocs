<?php
require_once ('utility.php');
?>


<!DOCTYPE html>
<html>
<body>


<h2>Login was successful:
<?php
echo " ".$usernames;
echo "</br>";
?>
<a href="whoAmI.php">Who Am I</a>
</h2>
	<?php	
	$users = getAllUser();
    include ('_displayUsers.php');
	?>
</body>
</html>
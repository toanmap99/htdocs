<!DOCTYPE html>
<html>
<body>


<h2>Login was successful:
<?php
// Display the User name after successfull log in and show access to ONLY admin
echo " ".$usernames;
echo "</br>";
?>
<a href="blogPost.html">Post your blog</a>
</h2>
<?php if ($_SESSION['ROLE'] == 'admin'):?>
<a href="showAdminPage.php">Admin</a><br>
<?php endif;?>
</body>
</html>
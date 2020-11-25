<!DOCTYPE html>
<html>
<body>


<h2>Login was successful:
<?php
// Display the User name after successfull log in and show access to ONLY admin for Admin page
echo " ".$usernames;
echo "</br>";
?>
<a href="blogPost.html">Post your blog</a>
<a href="search.html">Search</a><br>
</h2>
<?php if ($_SESSION['ROLE'] == 'admin'):?>
<a href="showAdminPage.php">Admin</a><br>
<?php endif;?>
</body>
</html>
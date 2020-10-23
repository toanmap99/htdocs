<!DOCTYPE html>
<html>
<body>


<h2>Login was successful:
<?php
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
<!--Name: Toan Nguyen 
Class: CST-126
Professor: Glenda Dilts-->

<?php
// to catch errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// To get all of the value from the input
$name = $_GET['name'];
echo "Your name is " . $name . "</br>";

$email = $_GET['email'];
echo "Your email is " . $email . "</br>";

$hobby = $_GET['hobby'];
echo "Your hobby(ies) is/are " . $hobby . "</br>";

$color = $_GET['color'];
echo "Your favorite color is named " . $color . "</br>";

$birthday = $_GET['birthday'];
echo "Your birthday is " . $birthday . "</br>";

$age = $_GET['age'];
echo "Your age is " . $age . "</br>";

$password = $_GET['password'];
echo "Your password is " . $password . "</br>";

$IQ = $_GET['iq'];
echo "Your IQ appears to be " . $IQ . "</br>";


?>

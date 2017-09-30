<?php
// try
// {
// 	$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');
// }
// catch(Exception $e)
// {
//         die('Erreur : '.$e->getMessage());
// }



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

// Create connection
$bdd = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$bdd) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

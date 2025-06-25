<?php
$host = "localhost";         // or your hosting server
$user = "root";              // your MySQL username
$pass = "";                  // your MySQL password
$db   = "login_system";      // your database name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

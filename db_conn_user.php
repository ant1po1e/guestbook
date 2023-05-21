<?php
$servername = "localhost"; // Replace with your servername
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "phploginapp"; // Replace with your database name

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
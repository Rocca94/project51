<?php
$servername = "mysql.hostinger.it";
$username = "u644967097_lelle";
$password = "Q4SA6j7psp";
$db="u644967097_orari";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
echo"fuck";
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO facolta (idf,nomeF) VALUES (".$_GET["id"].",'".$_GET["nomeF"]."')";
$conn->query($sql); 
$conn->close();
?>
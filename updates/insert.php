<?php
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

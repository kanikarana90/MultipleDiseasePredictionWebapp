<?php
// connection.php
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "med_users"; // Your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

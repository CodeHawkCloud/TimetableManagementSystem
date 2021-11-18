<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("MySQL database connection failed: " . $conn->connect_error);
}

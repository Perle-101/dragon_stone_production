<?php
require_once __DIR__ . '/config.php';
// Database Configuration from Environment Variables
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$charset = getenv('DB_CHARSET') ?: 'utf8mb4';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($conn, $charset);
?>
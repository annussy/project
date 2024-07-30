<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "project";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $db);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
include 'config.php';

// สร้างการเชื่อมต่อ MySQLi
$connect = mysqli_connect($localhost, $username, $password, $db);

// ตรวจสอบการเชื่อมต่อ
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// เลือกฐานข้อมูล
$db_selected = mysqli_select_db($connect, $db);
if (!$db_selected) {
    die("Cannot select database: " . mysqli_error($connect));
}

// สร้างตาราง disabled
$sql1 = "CREATE TABLE disabled (
    disabled_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    disabled_name VARCHAR(20) NOT NULL,
    disabled_card VARCHAR(13) NOT NULL,
    birthday DATE NOT NULL,
    age INT(10) NOT NULL,
    status VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    job VARCHAR(100) NOT NULL,
    income INT(10) NOT NULL,
    tel VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(15) NOT NULL,
    password_h VARCHAR(15) NOT NULL
)";

if ($connect->query($sql1) === TRUE) {
    echo "Table disabled created successfully<br>";
} else {
    echo "Error creating table disabled: " . $connect->error . "<br>";
}


// ปิดการเชื่อมต่อ
$connect->close();
?>

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
    disabled_name VARCHAR(255) NOT NULL,
    disabled_card VARCHAR(13) NOT NULL,
    birthday DATE NOT NULL,
    age INT(10) NOT NULL,
    status VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    job VARCHAR(255) NOT NULL,
    income INT(10) NOT NULL,
    tel VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(15) NOT NULL,
    password_h VARCHAR(15) NOT NULL
)";

if ($connect->query($sql1) === TRUE) {
    echo "Table disabled created successfully<br>";
} else {
    echo "Error creating table disabled: " . $connect->error . "<br>";
}

// สร้างตาราง employee
$sql2 = "CREATE TABLE employee (
    employee_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255) NOT NULL,
    employee_department VARCHAR(255) NOT NULL,
    tel VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(15) NOT NULL,
    password_h VARCHAR(15) NOT NULL
)";

if ($connect->query($sql2) === TRUE) {
    echo "Table employee created successfully<br>";
} else {
    echo "Error creating table employee: " . $connect->error . "<br>";
}

// สร้างตาราง entrepreneur
$sql3 = "CREATE TABLE entrepreneur (
    entrepreneur_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    entrepreneur_name VARCHAR(255) NOT NULL,
    entrepreneur_agency VARCHAR(255) NOT NULL,
    entrepreneur_need VARCHAR(255) NOT NULL,
    tel VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(15) NOT NULL,
    password_h VARCHAR(15) NOT NULL
)";

if ($connect->query($sql3) === TRUE) {
    echo "Table entrepreneur created successfully<br>";
} else {
    echo "Error entrepreneur table employee: " . $connect->error . "<br>";
}

// สร้างตาราง money
$sql4 = "CREATE TABLE money (
    money_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    money_name VARCHAR(255) NOT NULL,
    document_home VARCHAR(255) NOT NULL,
    document_card VARCHAR(255) NOT NULL,
    document_money VARCHAR(255) NOT NULL
)";

if ($connect->query($sql4) === TRUE) {
    echo "Table money created successfully<br>";
} else {
    echo "Error money table employee: " . $connect->error . "<br>";
}

// สร้างตาราง moneydetails
$sql5 = "CREATE TABLE moneydetails (
    moneydetails_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    money_id INT(10) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (money_id) REFERENCES money(money_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql5) === TRUE) {
    echo "Table moneydetails created successfully<br>";
} else {
    echo "Error moneydetails table employee: " . $connect->error . "<br>";
}

// สร้างตาราง activity
$sql6 = "CREATE TABLE activity (
    activity_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    activity_name VARCHAR(255) NOT NULL,
    activity_location VARCHAR(255) NOT NULL,
    activity_count INT(10) NOT NULL,
    details VARCHAR(255) NOT NULL
)";

if ($connect->query($sql6) === TRUE) {
    echo "Table activity created successfully<br>";
} else {
    echo "Error activity table employee: " . $connect->error . "<br>";
}

// สร้างตาราง activitydetails
$sql7 = "CREATE TABLE activitydetails (
    activitydetails_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    activity_id INT(10) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (activity_id) REFERENCES activity(activity_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql7) === TRUE) {
    echo "Table activitydetails created successfully<br>";
} else {
    echo "Error activitydetails table employee: " . $connect->error . "<br>";
}

// สร้างตาราง ability
$sql8 = "CREATE TABLE ability (
    ability_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ability_name VARCHAR(255) NOT NULL
)";

if ($connect->query($sql8) === TRUE) {
    echo "Table ability created successfully<br>";
} else {
    echo "Error ability table employee: " . $connect->error . "<br>";
}

// สร้างตาราง abilitydetails
$sql9 = "CREATE TABLE abilitydetails (
    abilitydetails_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ability_id INT(10) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (ability_id) REFERENCES ability(ability_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql9) === TRUE) {
    echo "Table abilitydetails created successfully<br>";
} else {
    echo "Error abilitydetails table employee: " . $connect->error . "<br>";
}

// ปิดการเชื่อมต่อ
/*$connect->close();*/ 



?>

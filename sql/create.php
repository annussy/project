<?php
include '../config/config.php';
// สร้างการเชื่อมต่อ MySQLi
$connect = mysqli_connect($servername, $username, $password, $db);

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
$sql1 = "CREATE TABLE IF NOT EXISTS disabled (
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
$sql2 = "CREATE TABLE IF NOT EXISTS employee (
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
$sql3 = "CREATE TABLE IF NOT EXISTS entrepreneur (

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
    echo "Error entrepreneur table entrepreneur: " . $connect->error . "<br>";
}

// สร้างตาราง money

$sql4 = "CREATE TABLE IF NOT EXISTS money (

    money_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    money_name VARCHAR(255) NOT NULL,
    document_home VARCHAR(255) NOT NULL,
    document_card VARCHAR(255) NOT NULL,
    document_money VARCHAR(255) NOT NULL
)";

if ($connect->query($sql4) === TRUE) {
    echo "Table money created successfully<br>";
} else {
    echo "Error money table money: " . $connect->error . "<br>";
}

// สร้างตาราง moneydetails
$sql5 = "CREATE TABLE IF NOT EXISTS moneydetails (

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
    echo "Error moneydetails table moneydetails: " . $connect->error . "<br>";
}

// สร้างตาราง activity
$sql6 = "CREATE TABLE IF NOT EXISTS activity (
    activity_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    activity_name VARCHAR(255) NOT NULL,
    activity_location VARCHAR(255) NOT NULL,
    activity_count INT(10) NOT NULL,
    details VARCHAR(255) NOT NULL
)";

if ($connect->query($sql6) === TRUE) {
    echo "Table activity created successfully<br>";
} else {
    echo "Error activity table activity : " . $connect->error . "<br>";
}

// สร้างตาราง activitydetails
$sql7 = "CREATE TABLE IF NOT EXISTS activitydetails (
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
    echo "Error activitydetails table activitydetails: " . $connect->error . "<br>";
}

// สร้างตาราง ability
$sql8 = "CREATE TABLE IF NOT EXISTS ability (
    ability_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ability_name VARCHAR(255) NOT NULL
)";

if ($connect->query($sql8) === TRUE) {
    echo "Table ability created successfully<br>";
} else {
    echo "Error ability table ability: " . $connect->error . "<br>";
}

// สร้างตาราง abilitydetails
$sql9 = "CREATE TABLE IF NOT EXISTS abilitydetails (
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
    echo "Error abilitydetails table abilitydetails: " . $connect->error . "<br>";
}

// สร้างตาราง disease

$sql10 = "CREATE TABLE IF NOT EXISTS disease (

    disease_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    disease_name VARCHAR(255) NOT NULL,
    disease_sugar INT NOT NULL,
    disease_pressure INT NOT NULL,
    disease_status VARCHAR(255) NOT NULL,
    weight DOUBLE NOT NULL,
    height INT NOT NULL
)";

if ($connect->query($sql10) === TRUE) {
    echo "Table disease created successfully<br>";
} else {
    echo "Error disease table disease: " . $connect->error . "<br>";
}

// สร้างตาราง diseasedetails

$sql11 = "CREATE TABLE IF NOT EXISTS diseasedetails (

    diseasedetails_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    disease_id INT(10) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (disease_id) REFERENCES disease(disease_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql11) === TRUE) {
    echo "Table diseasedetails created successfully<br>";
} else {
    echo "Error diseasedetails table diseasedetails: " . $connect->error . "<br>";
}

// สร้างตาราง disabilitytype

$sql12 = "CREATE TABLE IF NOT EXISTS disabilitype (

    disabilitype_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(255) NOT NULL,
    type_money VARCHAR(10) NOT NULL
)";

if ($connect->query($sql12) === TRUE) {
    echo "Table disabilitype created successfully<br>";
} else {
    echo "Error disabilitype table disabilitype: " . $connect->error . "<br>";
}

// สร้างตาราง typedetails

$sql13 = "CREATE TABLE IF NOT EXISTS typedetails (

    typedetails_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    disabilitype_id INT(10) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (disabilitype_id) REFERENCES disabilitype(disabilitype_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql13) === TRUE) {
    echo "Table disabilitype created successfully<br>";
} else {
    echo "Error disabilitype table disabilitype: " . $connect->error . "<br>";
}

// สร้างตาราง estimate

$sql14 = "CREATE TABLE IF NOT EXISTS estimate (

    estimate_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estimate_name VARCHAR(255) NOT NULL,
    estimate_score INT NOT NULL
)";

if ($connect->query($sql14) === TRUE) {
    echo "Table estimate created successfully<br>";
} else {
    echo "Error estimate table estimate: " . $connect->error . "<br>";
}

// สร้างตาราง estimatedetails

$sql15 = "CREATE TABLE IF NOT EXISTS estimatedetails (

    estimatedetails_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estimate_id INT(10) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (estimate_id) REFERENCES estimate(estimate_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql15) === TRUE) {
    echo "Table estimatedetails  created successfully<br>";
} else {
    echo "Error estimatedetails table estimatedetails: " . $connect->error . "<br>";
}

// สร้างตาราง need
$sql16 = "CREATE TABLE IF NOT EXISTS need (

    need_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    entrepreneur_id INT(6) UNSIGNED NOT NULL,
    disabled_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (entrepreneur_id) REFERENCES entrepreneur(entrepreneur_id),
    FOREIGN KEY (disabled_id) REFERENCES disabled(disabled_id)
    ON DELETE CASCADE
)";

if ($connect->query($sql16) === TRUE) {
    echo "Table need  created successfully<br>";
} else {
    echo "Error need table need: " . $connect->error . "<br>";
}

// ปิดการเชื่อมต่อ 
$connect->close();
?>

<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "project";

$connect = mysqli_connect ($localhost,$username,$password,$db);

$connect = new mysqli($localhost, $username, $password,$db);

//สร้างฐานข้อมูล
/*$sql = "CREATE DATABASE IF NOT EXISTS project";
if ($connect->query($sql) === TRUE) {
    echo "สร้างฐานข้อมูลสำเร็จแล้ว<br>";
} else {
    echo "สร้างฐานข้อมูลไม่สำเร็จ: " . $connect->error . "<br>";
}

//ตรวจสอบการเชื่อมต่อ
if ($connect->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $connect->connect_error);
}
echo "เชื่อมต่อเรียบร้อยแล้ว<br>";

// ปิดการเชื่อมต่อ
$connect->close();*/

?>
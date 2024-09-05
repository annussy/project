<?php
include 'C:\laragon\www\project\config\config.php';

// รับข้อมูลจากฟอร์ม
$employee_name = $_POST['employee_name'];
$employee_department = $_POST['employee_department'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_h = $_POST['password_h'];

// ตรวจสอบการยืนยันรหัสผ่าน
if ($password !== $password_h) {
    die("รหัสผ่านและการยืนยันรหัสผ่านไม่ตรงกัน");
}

// สร้าง SQL query
$sql = "INSERT INTO employee (employee_name, employee_department, tel, email, password, password_h)
VALUES ('$employee_name', '$employee_department', '$tel', '$email', '$password', '$password_h')";

// ตรวจสอบการดำเนินการ
if ($conn->query($sql) === TRUE) {
    echo "ข้อมูลได้รับการบันทึกเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาด: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>


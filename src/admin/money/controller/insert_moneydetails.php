<?php
session_start();
include 'C:\laragon\www\project\config\config.php'; // เรียกใช้การเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีข้อมูลถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า disabled_id และ money_id จากฟอร์ม
    $disabled_id = $_POST['disabled_id'];
    $money_id = $_POST['money_id'];

    // ตรวจสอบว่ามีการกรอกข้อมูลทั้งสองหรือไม่
    if (!empty($disabled_id) && !empty($money_id)) {
        // ใช้ Prepared Statement เพื่อลดความเสี่ยงจาก SQL Injection
        $stmt = $conn->prepare("INSERT INTO moneydetails (disabled_id, money_id) VALUES (?, ?)");

        // ตรวจสอบว่าการสร้าง statement สำเร็จหรือไม่
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        // ผูกค่า parameters กับ statement
        $stmt->bind_param("ii", $disabled_id, $money_id);

        // ตรวจสอบและ execute
        if ($stmt->execute()) {
            echo "บันทึกข้อมูลสำเร็จ!";
            header("Location: ../show_money.php"); // กลับไปที่หน้าข้อมูลเงิน
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // ปิด statement
        $stmt->close();
    } else {
        echo "กรุณากรอกข้อมูลให้ครบถ้วน!";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
} else {
    echo "Invalid Request";
}
?>

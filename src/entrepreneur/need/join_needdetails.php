<?php
session_start();
include 'C:\laragon\www\project\config\config.php'; // เรียกใช้การเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีข้อมูลถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า entrepreneur_id จาก session
    if (isset($_SESSION['entrepreneur_id'])) {
        $entrepreneur_id = $_SESSION['entrepreneur_id'];
    } else {
        die("กรุณาเข้าสู่ระบบ");
    }

    // รับค่า ability ที่เลือกมาจากฟอร์ม
    $abilities = isset($_POST['ability']) ? $_POST['ability'] : [];

    // ตรวจสอบว่ามีการเลือกความสามารถหรือไม่
    if (!empty($abilities)) {
        // เริ่มการเชื่อมต่อแบบ Prepared Statement เพื่อลดความเสี่ยงจาก SQL Injection
        $stmt = $conn->prepare("INSERT INTO need (entrepreneur_id, ability_id) VALUES (?, ?)");

        // ตรวจสอบว่าการสร้าง statement สำเร็จหรือไม่
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        // Loop ผ่านความสามารถที่ถูกเลือกและบันทึกลงในตาราง ability_details
        foreach ($abilities as $ability_id) {
            $stmt->bind_param("ii", $entrepreneur_id, $ability_id);
            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
        }

        // ปิด statement
        $stmt->close();
        echo "บันทึกข้อมูลสำเร็จ!";
    } else {
        echo "กรุณาเลือกความสามารถ!";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
} else {
    echo "Invalid Request";
}
?>

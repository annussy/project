<?php
session_start();
include 'C:\laragon\www\project\config\config.php'; // เรียกใช้การเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีข้อมูลถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า disabled_id และ disabilitype ที่เลือกมาจากฟอร์ม
    $disabled_id = $_POST['disabled_id'];
    $disabilitype = isset($_POST['disabilitype']) ? $_POST['disabilitype'] : [];

    // ตรวจสอบว่ามีการเลือกความสามารถหรือไม่
    if (!empty($disabilitype)) {
        // เริ่มการเชื่อมต่อแบบ Prepared Statement เพื่อลดความเสี่ยงจาก SQL Injection
        $stmt = $conn->prepare("INSERT INTO disabilitypedetails (disabled_id, disabilitype_id) VALUES (?, ?)");

        // ตรวจสอบว่าการสร้าง statement สำเร็จหรือไม่
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        // Loop ผ่านความสามารถที่ถูกเลือกและบันทึกลงในตาราง disabilitype_details
        foreach ($disabilitype as $disabilitype_id) {
            $stmt->bind_param("ii", $disabled_id, $disabilitype_id);
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

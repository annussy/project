<?php
session_start();
include 'C:\laragon\www\project\config\config.php';

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $ability = $_POST['ability']; // Array ของ ability_id ที่ถูกเลือก
    $disabled_id = $_POST['disabled_id']; // รับ disabled_id จากฟอร์ม
    $disease_id = 1; // ตัวอย่างการรับ disease_id, สามารถนำมาใช้งานได้จากฟอร์มหรือการดึงค่าจากฐานข้อมูล

    // ตรวจสอบว่ามีความสามารถที่ถูกเลือกหรือไม่
    if (!empty($ability) && !empty($disabled_id)) {
        foreach ($ability as $ability_id) {
            // เตรียมคำสั่ง SQL สำหรับบันทึกข้อมูลลงในตาราง diseasedetails
            $sql = "INSERT INTO diseasedetails (disabled_id, disease_id) VALUES (?, ?)";

            // เตรียมและ bind ค่าที่จะใช้ใน SQL
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ii", $disabled_id, $disease_id);
                
                // ดำเนินการบันทึกข้อมูล
                if ($stmt->execute()) {
                    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
                } else {
                    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
                }
            }
        }
    } else {
        echo "กรุณาเลือกความสามารถอย่างน้อย 1 รายการ";
    }
    
    // ปิดการเชื่อมต่อ
    $conn->close();
}
?>

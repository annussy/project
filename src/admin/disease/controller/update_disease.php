<?php
include 'C:\laragon\www\project\config\config.php';

// ตรวจสอบว่ามีการส่ง disease_id มาหรือไม่
if (isset($_POST['disease_id']) && is_numeric($_POST['disease_id'])) {
    $disease_id = $_POST['disease_id'];
    $disease_name = isset($_POST['disease_name']) ? $_POST['disease_name'] : '';

    // ตรวจสอบว่าค่าทั้งหมดมีอยู่และไม่เป็นค่าว่าง
    if ($disease_name ) {

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล (แก้ไข comma ที่ขาดหาย)
        $sql = "UPDATE disease
                SET disease_name = '$disease_name' 
                WHERE disease_id = $disease_id";
                
        if (mysqli_query($conn, $sql)) {
            echo "ข้อมูลถูกอัปเดตเรียบร้อยแล้ว";
            header("Location: ../show_disease.php");
        } else {
            // ส่วนนี้จะแสดงข้อผิดพลาดจาก SQL
            echo "Error! " . mysqli_error($conn);
        }
    } else {
        echo "ข้อมูลที่ต้องการอัปเดตไม่ครบ";
    }

    mysqli_close($conn);
} else {
    echo "disease ID ไม่ถูกต้อง";
}
?>

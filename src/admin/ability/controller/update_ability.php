<?php
include 'C:\laragon\www\project\config\config.php';

// ตรวจสอบว่ามีการส่ง ability_id มาหรือไม่
if (isset($_POST['ability_id']) && is_numeric($_POST['ability_id'])) {
    $ability_id = $_POST['ability_id'];
    $ability_name = isset($_POST['ability_name']) ? $_POST['ability_name'] : '';

    // ตรวจสอบว่าค่าทั้งหมดมีอยู่และไม่เป็นค่าว่าง
    if ($ability_name ) {

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล (แก้ไข comma ที่ขาดหาย)
        $sql = "UPDATE ability
                SET ability_name = '$ability_name' 
                WHERE ability_id = $ability_id";
                
        if (mysqli_query($conn, $sql)) {
            echo "ข้อมูลถูกอัปเดตเรียบร้อยแล้ว";
            header("Location: ../show_ability.php");
        } else {
            // ส่วนนี้จะแสดงข้อผิดพลาดจาก SQL
            echo "Error! " . mysqli_error($conn);
        }
    } else {
        echo "ข้อมูลที่ต้องการอัปเดตไม่ครบ";
    }

    mysqli_close($conn);
} else {
    echo "ability ID ไม่ถูกต้อง";
}
?>

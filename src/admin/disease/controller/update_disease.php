<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_POST['disease_id']) && is_numeric($_POST['disease_id'])) {
    $disease_id = $_POST['disease_id'];
    $disease_name = isset($_POST['disease_name']) ? $_POST['disease_name'] : '';
    $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
    $height = isset($_POST['height']) ? $_POST['height'] : '';
    $disease_sugar = isset($_POST['disease_sugar']) ? $_POST['disease_sugar'] : '';
    $disease_pressure = isset($_POST['disease_pressure']) ? $_POST['disease_pressure'] : '';
    $disease_status = isset($_POST['disease_status']) ? $_POST['disease_status'] : '';

    // ตรวจสอบว่าค่าทั้งหมดมีอยู่และไม่เป็นค่าว่าง
    if ($disease_name && $weight && $height && $disease_sugar && $disease_pressure && $disease_status) {

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล
        $sql = "UPDATE disease
                SET disease_name = '$disease_name', weight = '$weight', height = '$height', disease_sugar = '$disease_sugar', disease_pressure = '$disease_pressure', disease_status = '$disease_status'
                WHERE disease_id = $disease_id";
                
        if (mysqli_query($conn, $sql)) {
            echo "ข้อมูลถูกอัปเดตเรียบร้อยแล้ว";
            header("Location: ../show_disease.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "ข้อมูลที่ต้องการอัปเดตไม่ครบ";
    }

    mysqli_close($conn);
} else {
    echo "disease ID ไม่ถูกต้อง";
}
?>

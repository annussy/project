<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_POST['disabilitype_id']) && is_numeric($_POST['disabilitype_id'])) {
    $disabilitype_id = $_POST['disabilitype_id'];
    $type_name = isset($_POST['type_name']) ? $_POST['type_name'] : '';
    $type_money = isset($_POST['type_money']) ? $_POST['type_money'] : '';
    
    // ตรวจสอบว่าค่าทั้งหมดมีอยู่และไม่เป็นค่าว่าง
    if ($type_name && $type_money) {

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล
        $sql = "UPDATE disabilitype 
                SET type_name = '$type_name', type_money = '$type_money'
                WHERE disabilitype_id = $disabilitype_id";
                
        if (mysqli_query($conn, $sql)) {
            echo "ข้อมูลถูกอัปเดตเรียบร้อยแล้ว";
            header("Location: ../show_disabilitype.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "ข้อมูลที่ต้องการอัปเดตไม่ครบ";
    }

    mysqli_close($conn);
} else {
    echo "disabilitype_id ID ไม่ถูกต้อง";
}
?>

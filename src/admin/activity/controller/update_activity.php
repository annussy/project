<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_POST['activity_id']) && is_numeric($_POST['activity_id'])) {
    $activity_id = $_POST['activity_id'];
    $activity_name = isset($_POST['activity_name']) ? $_POST['activity_name'] : '';
    $activity_location = isset($_POST['activity_location']) ? $_POST['activity_location'] : '';
    $activity_count= isset($_POST['activity_count']) ? $_POST['activity_count'] : '';
    $details = isset($_POST['details']) ? $_POST['details'] : '';

    // ตรวจสอบว่าค่าทั้งหมดมีอยู่และไม่เป็นค่าว่าง
    if ($activity_name && $activity_location && $activity_count && $details) {

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล
        $sql = "UPDATE activity 
                SET activity_name = '$activity_name', activity_location = '$activity_location',activity_count = '$activity_count', details = '$details'
                WHERE activity_id = $activity_id";
                
        if (mysqli_query($conn, $sql)) {
            echo "ข้อมูลถูกอัปเดตเรียบร้อยแล้ว";
            header("Location: ../show_activity.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "ข้อมูลที่ต้องการอัปเดตไม่ครบ";
    }

    mysqli_close($conn);
} else {
    echo "activity ID ไม่ถูกต้อง";
}
?>

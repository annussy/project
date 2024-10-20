<?php
include 'C:\laragon\www\project\config\config.php';

$activity_id = $_GET['activity_id'];

// ลบข้อมูลที่เกี่ยวข้องในตาราง activitydetails ก่อน
$sql_activitydetails = "DELETE FROM activitydetails WHERE activity_id = $activity_id";
if (mysqli_query($conn, $sql_activitydetails)) {
    // ถ้าลบข้อมูลใน activitydetails สำเร็จ ให้ลบข้อมูลใน activity
    $sql_activity = "DELETE FROM activity WHERE activity_id = $activity_id";
    if (mysqli_query($conn, $sql_activity)) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_activity.php'</script>";
    } else {
        echo "Error: " . $sql_activity . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลใน activity ไม่สำเร็จ')</script>";
    }
} else {
    echo "Error: " . $sql_activitydetails . "<br>" . mysqli_error($conn);
    echo "<script>alert('ลบข้อมูลใน activitydetails ไม่สำเร็จ')</script>";
}

mysqli_close($conn);
?>

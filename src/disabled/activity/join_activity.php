<?php
session_start();
include 'C:\laragon\www\project\config\config.php';

// ตรวจสอบการส่งฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity_id = $_POST['activity_id'];
    $disabled_id = $_POST['disabled_id'];

    // ตรวจสอบว่าผู้ใช้ได้สมัครกิจกรรมนี้ไปแล้วหรือไม่
    $check_sql = "SELECT * FROM activitydetails WHERE activity_id = ? AND disabled_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('ii', $activity_id, $disabled_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // ถ้าผู้ใช้ได้สมัครกิจกรรมนี้แล้ว
        header("Location: form_activity.php?message=already_registered");
        exit();
    }

    // บันทึกการสมัครกิจกรรมใหม่
    $sql = "INSERT INTO activitydetails (activity_id, disabled_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $activity_id, $disabled_id);
    if ($stmt->execute()) {
        // ถ้าบันทึกสำเร็จ
        header("Location: form_activity.php?message=success");
    } else {
        // ถ้าเกิดข้อผิดพลาด
        header("Location: form_activity.php?message=error");
    }
    exit();
} else {
    // ถ้าไม่มีข้อมูลที่ส่งมา
    header("Location: form_activity.php?message=no_data");
    exit();
}
?>

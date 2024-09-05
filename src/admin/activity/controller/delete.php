<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_POST['delete'])) {
    $activity_id = $_POST['activity_id'];
    
    // ใช้การเตรียม SQL Query เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("DELETE FROM activity WHERE activity_id = ?");
    $stmt->bind_param("i", $activity_id); // "i" สำหรับ integer
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        $message = "ลบข้อมูลสำเร็จ";
    } else {
        $message = "ไม่พบข้อมูลที่จะลบ";
    }

    $stmt->close();
    $conn->close();
    
/* // ส่งข้อความไปยังหน้า index.php
    header("Location: index.php?message=" . urlencode($message));
    exit(); */
} 

?>


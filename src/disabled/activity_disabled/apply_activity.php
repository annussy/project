<?php
include 'C:\laragon\www\project\config\config.php';

if ($conn->connect_error) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity_id = $_POST['activity_id'];
    $disabled_id = $_POST['disabled_id'];

    // ตรวจสอบว่ามีการสมัครแล้วหรือยัง
    $sql = "SELECT * FROM activity , disabled WHERE activity_id = ? AND disabled_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $activity_id, $disabled_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // ถ้ายังไม่มีการสมัคร ให้เพิ่มข้อมูลในตารางเชื่อมโยง
        $sql = "INSERT INTO activity_disabled (activity_id, disabled_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $activity_id, $disabled_id);

        if ($stmt->execute()) {
            echo "สมัครเข้าร่วมกิจกรรมเรียบร้อยแล้ว";
        } else {
            echo "เกิดข้อผิดพลาดในการสมัครเข้าร่วมกิจกรรม";
        }
    } else {
        echo "คุณได้สมัครเข้าร่วมกิจกรรมนี้แล้ว";
    }

    $stmt->close();
}

$conn->close();
?>

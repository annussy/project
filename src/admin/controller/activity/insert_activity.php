<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['activity_name'], $_POST['activity_location'], $_POST['activity_count'], $_POST['details'])) {
    $activity_name = $_POST['activity_name'];
    $activity_location = $_POST['activity_location'];
    $activity_count = $_POST['activity_count'];
    $details = $_POST['details'];

    $stmt = $conn->prepare("INSERT INTO activity (activity_name, activity_location, activity_count, details) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $activity_name, $activity_location, $activity_count, $details);

    if ($stmt->execute()) {
        echo "บันทึกข้อมูลเรียบร้อย";
    } else {
        echo "Error! " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "กรุณากรอกข้อมูลให้ครบถ้วน";
}

$conn->close();
?>

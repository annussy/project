<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['activity_id'], $_POST['disabled_id'])) {
    $activity_id = $_POST['activity_id'];
    $disabled_id = $_POST['disabled_id'];


    $stmt = $conn->prepare("INSERT INTO activitydetails (activity_id, disabled_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $activity_id, $disabled_id);

    if ($stmt->execute()) {
        echo "บันทึกข้อมูลเรียบร้อย";
        echo "<script>window.location = '';</script>";
    } else {
        echo "Error! " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "กรุณากรอกข้อมูลให้ครบถ้วน";
}

$conn->close();
?>

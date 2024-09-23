<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['disease_name'])) {
    $disease_name = $_POST['disease_name'];

    $stmt = $conn->prepare("INSERT INTO disease (disease_name) VALUES (?)");
    $stmt->bind_param("s", $disease_name);

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

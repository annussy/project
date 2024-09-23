<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_POST['disease_name'], $_POST['disease_sugar'], $_POST['disease_pressure'], $_POST['disease_status'], $_POST['weight'], $_POST['height'])) {
    // แปลง array ของ disease_name เป็น string โดยใช้ implode
    $disease_name = implode(",", $_POST['disease_name']);
    $disease_sugar = $_POST['disease_sugar'];
    $disease_pressure = $_POST['disease_pressure'];
    $disease_status = $_POST['disease_status'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    // เตรียม SQL statement
    $stmt = $conn->prepare("INSERT INTO disease (disease_name, disease_sugar, disease_pressure, disease_status, weight, height) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $disease_name, $disease_sugar, $disease_pressure, $disease_status, $weight, $height);

    // ตรวจสอบการบันทึกข้อมูล
    if ($stmt->execute()) {
        echo "บันทึกข้อมูลเรียบร้อย";
    } else {
        echo "Error! " . $stmt->error;
    }

    // ปิด statement
    $stmt->close();
} else {
    echo "กรุณากรอกข้อมูลให้ครบถ้วน";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>

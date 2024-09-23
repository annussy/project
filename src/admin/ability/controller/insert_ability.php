<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['ability_name'])) {
    $ability_name = $_POST['ability_name'];

    $stmt = $conn->prepare("INSERT INTO ability (ability_name) VALUES (?)");
    $stmt->bind_param("s", $ability_name);

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

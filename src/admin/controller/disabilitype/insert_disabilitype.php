<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['type_name'], $_POST['type_money'])) {
    $type_name = $_POST['type_name'];
    $type_money = $_POST['type_money'];

    $stmt = $conn->prepare("INSERT INTO disabilitype (type_name, type_money) VALUES (?, ?)");
    $stmt->bind_param("si", $type_name, $type_money);

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


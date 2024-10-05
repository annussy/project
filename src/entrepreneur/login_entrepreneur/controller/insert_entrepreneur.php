<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['entrepreneur_name'], $_POST['entrepreneur_agency'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['password_h'])) {
    $entrepreneur_name = $_POST['entrepreneur_name'];
    $entrepreneur_agency = $_POST['entrepreneur_agency'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_h = $_POST['password_h'];

    $stmt = $conn->prepare("INSERT INTO entrepreneur (entrepreneur_name, entrepreneur_agency, tel, email, password, password_h) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $entrepreneur_name, $entrepreneur_agency, $tel, $email, $password, $password_h);
  
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

<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['disabled_name'], $_POST['disabled_card'], $_POST['birthday'], $_POST['age'], $_POST['status'], $_POST['address'], $_POST['job'], $_POST['income'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['password_h'])) {
    $disabled_name = $_POST['disabled_name'];
    $disabled_card = $_POST['disabled_card'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $address = $_POST['address'];
    $job = $_POST['job'];
    $income = $_POST['income'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_h = $_POST['password_h'];

    $stmt = $conn->prepare("INSERT INTO disabled (disabled_name, disabled_card, birthday, age, status, address, job, income, tel, email, password, password_h) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $disabled_name, $disabled_card, $birthday, $age, $status, $address, $job , $income, $tel, $email, $password, $password_h);

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

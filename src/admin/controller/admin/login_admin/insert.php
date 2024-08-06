<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['employee_name'], $_POST['employee_department'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['password_h'])) {
    $type_name = $_POST['employee_name'];
    $type_money = $_POST['employee_department'];
    $type_money = $_POST['tel'];
    $type_money = $_POST['email'];
    $type_money = $_POST['password'];
    $type_money = $_POST['password_h'];

    $stmt = $conn->prepare("INSERT INTO employee (employee_name, employee_department, tel, email, password, password_h) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $employee_name, $employee_department, $tel, $email, $password, $password_h);

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



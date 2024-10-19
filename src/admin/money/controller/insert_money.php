<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_POST['money_date']) && isset($_POST['money_count']) && isset($_POST['employee_id'])) {
    $money_date = $_POST['money_date'];
    $money_count = $_POST['money_count'];
    $employee_id = $_POST['employee_id'];

    $stmt = $conn->prepare("INSERT INTO money (money_date, money_count, employee_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $money_date, $money_count, $employee_id);

    if ($stmt->execute()) {
        echo "บันทึกข้อมูลเรียบร้อย";
    } else {
        echo "Error! " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "กรุณากรอกข้อมูลให้ครบถ้วน";
}

?>

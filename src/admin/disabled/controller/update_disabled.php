<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_POST['disabled_id']) && is_numeric($_POST['disabled_id'])) {
    $disabled_id = $_POST['disabled_id'];
    $disabled_name = isset($_POST['disabled_name']) ? $_POST['disabled_name'] : '';
    $disabled_card = isset($_POST['disabled_card']) ? $_POST['disabled_card'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $job = isset($_POST['job']) ? $_POST['job'] : '';
    $income = isset($_POST['income']) ? $_POST['income'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password_h = isset($_POST['password_h']) ? $_POST['password_h'] : '';

    // ตรวจสอบว่าค่าทั้งหมดมีอยู่และไม่เป็นค่าว่าง
    if ($disabled_name && $disabled_card && $birthday && $age && $status && $address && $job && $income && $tel && $email && $password && $password_h) {

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล
        $sql = "UPDATE disabled
                SET disabled_name = '$disabled_name', disabled_card = '$disabled_card', birthday = '$birthday', age = '$age', status = '$status', address = '$address', job = '$job', income = '$income', tel = '$tel', email = '$email', password = '$password', password_h = '$password_h'
                WHERE disabled_id = $disabled_id";
                
        if (mysqli_query($conn, $sql)) {
            echo "ข้อมูลถูกอัปเดตเรียบร้อยแล้ว";
            header("Location: ../show_disabled.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "ข้อมูลที่ต้องการอัปเดตไม่ครบ";
    }

    mysqli_close($conn);
} else {
    echo "activity ID ไม่ถูกต้อง";
}
?>

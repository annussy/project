<?php
session_start();
include 'C:/laragon/www/project/config/config.php';

if (!isset($_SESSION['employee_id'])) {
    header("Location: ../login_admin/login_admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $money_date_raw = $_POST['money_date'];
    $money_date = date('Y-m-d', strtotime($money_date_raw));
    $disabled_id = $_POST['disabled_id'];
    $money_count = $_POST['money_count'];
    $employee_id = $_POST['employee_id'];

    if (!$conn) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
    }

    if (empty($disabled_id) || empty($money_date) || empty($money_count) || empty($employee_id)) {
        die("ข้อมูลบางส่วนหายไป กรุณากรอกข้อมูลให้ครบถ้วน");
    }

    mysqli_begin_transaction($conn);

    try {
        $sql_money = "INSERT INTO money (money_date, money_count, employee_id) 
                      VALUES ('$money_date', $money_count, $employee_id)";
        if (mysqli_query($conn, $sql_money)) {
            $money_id = mysqli_insert_id($conn);

            $sql_moneydetails = "INSERT INTO moneydetails (money_id, disabled_id) 
                                 VALUES ($money_id, $disabled_id)";
            if (mysqli_query($conn, $sql_moneydetails)) {
                mysqli_commit($conn);
                
                // แสดงข้อความบันทึกสำเร็จ
                echo "บันทึกสำเร็จ!";
                
                // ถ้าต้องการเปลี่ยนเส้นทาง สามารถใช้ header หลังจากแสดงข้อความได้
                // header("Location: ../money/show_money.php");
                exit();
            } else {
                throw new Exception("เกิดข้อผิดพลาดในการบันทึกข้อมูล moneydetails: " . mysqli_error($conn));
            }
        } else {
            throw new Exception("เกิดข้อผิดพลาดในการบันทึกข้อมูล money: " . mysqli_error($conn));
        }
    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }

    mysqli_close($conn);

} else {
    echo "ไม่สามารถบันทึกข้อมูลได้";
}

?>

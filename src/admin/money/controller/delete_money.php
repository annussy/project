<?php
include 'C:\laragon\www\project\config\config.php';

$money_id = $_GET['money_id'];

// ลบข้อมูลในตาราง moneydetails ที่เชื่อมโยงกับ money_id ก่อน
$sql_delete_details = "DELETE FROM moneydetails WHERE money_id = $money_id";
mysqli_query($conn, $sql_delete_details);

// ลบข้อมูลในตาราง money หลังจากที่ลบข้อมูลใน moneydetails แล้ว
$sql_delete_money = "DELETE FROM money WHERE money_id = $money_id";

if(mysqli_query($conn, $sql_delete_money)){
    echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
    echo "<script>window.location = '../show_money.php'</script>";
} else {
    echo "Error: " . $sql_delete_money . "<br>" . mysqli_error($conn);
    echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
}

mysqli_close($conn);
?>

<?php
include 'C:\laragon\www\project\config\config.php';

$ability_id = $_GET['ability_id'];

// ลบข้อมูลที่เกี่ยวข้องในตาราง abilitydetails ก่อน
$sql_abilitydetails = "DELETE FROM abilitydetails WHERE ability_id = $ability_id";
if(mysqli_query($conn, $sql_abilitydetails)) {
    // ถ้าลบข้อมูลใน abilitydetails สำเร็จ ให้ลบข้อมูลใน ability
    $sql_ability = "DELETE FROM ability WHERE ability_id = $ability_id";
    if(mysqli_query($conn, $sql_ability)) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_ability.php'</script>";
    } else {
        echo "Error : " . $sql_ability . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
} else {
    echo "Error : " . $sql_abilitydetails . "<br>" . mysqli_error($conn);
    echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
}

mysqli_close($conn);
?>

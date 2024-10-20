<?php
include 'C:\laragon\www\project\config\config.php';

if(isset($_GET['abilitydetails_id'])) {
    $abilitydetails_id = $_GET['abilitydetails_id'];

    // ลบข้อมูลในตาราง abilitydetails
    $sql_abilitydetails = "DELETE FROM abilitydetails WHERE abilitydetails_id = $abilitydetails_id";
    if(mysqli_query($conn, $sql_abilitydetails)) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_ability.php'</script>";
    } else {
        echo "Error : " . $sql_abilitydetails . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
} else {
    echo "<script>alert('ไม่พบ abilitydetails_id')</script>";
    echo "<script>window.location = '../show_ability.php'</script>";
}

mysqli_close($conn);
?>

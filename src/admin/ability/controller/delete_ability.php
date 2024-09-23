<?php
include 'C:\laragon\www\project\config\config.php';

    $ability_id = $_GET['ability_id'];
    $sql = "DELETE FROM ability WHERE ability_id = $ability_id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_ability.php'</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
    mysqli_close($conn);
?>
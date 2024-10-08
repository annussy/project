<?php
include 'C:\laragon\www\project\config\config.php';

    $entrepreneur_id = $_GET['entrepreneur_id'];
    $sql = "DELETE FROM entrepreneur WHERE entrepreneur_id = $entrepreneur_id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_entrepreneur.php'</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
    mysqli_close($conn);
?>
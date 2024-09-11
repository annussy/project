<?php
include 'C:\laragon\www\project\config\config.php';

    $disease_id = $_GET['disease_id'];
    $sql = "DELETE FROM disease WHERE disease_id = $disease_id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_disease.php'</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
    mysqli_close($conn);
?>
<?php
include 'C:\laragon\www\project\config\config.php';

    $disabilitype_id = $_GET['disabilitype_id'];
    $sql = "DELETE FROM disabilitype WHERE disabilitype_id = $disabilitype_id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_disabilitype.php'</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
    mysqli_close($conn);
?>
<?php
include 'C:\laragon\www\project\config\config.php';

    $activitydetails_id = $_GET['activitydetails_id'];
    $sql = "DELETE FROM activitydetails WHERE activitydetails_id = $activitydetails_id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_activitydetails.php'</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
    mysqli_close($conn);
?>
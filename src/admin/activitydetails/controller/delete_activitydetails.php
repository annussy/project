<?php
include 'C:\laragon\www\project\config\config.php';

    $activitydelails_id = $_GET['activitydelails_id'];
    $sql = "DELETE FROM activitydelails WHERE activitydelails_id = $activitydelails_id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_activitydelails.php'</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
    mysqli_close($conn);
?>
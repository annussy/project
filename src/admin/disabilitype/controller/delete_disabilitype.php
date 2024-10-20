<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_GET['disabilitype_id'])) {  // ตรวจสอบว่าค่า disabilitype_id ถูกส่งมาหรือไม่
    $disabilitype_id = $_GET['disabilitype_id'];

    // ลบข้อมูลในตาราง disabilitypedetails ก่อน
    $sql_disabilitypedetails = "DELETE FROM disabilitypedetails WHERE disabilitype_id = $disabilitype_id";
    if (mysqli_query($conn, $sql_disabilitypedetails)) {
        // ถ้าลบใน disabilitypedetails สำเร็จ ให้ลบข้อมูลใน disabilitype
        $sql_disabilitype = "DELETE FROM disabilitype WHERE disabilitype_id = $disabilitype_id";
        if (mysqli_query($conn, $sql_disabilitype)) {
            echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
            echo "<script>window.location = '../show_disabilitype.php'</script>";
        } else {
            echo "Error: " . $sql_disabilitype . "<br>" . mysqli_error($conn);
            echo "<script>alert('ลบข้อมูลไม่สำเร็จในตาราง disabilitype')</script>";
        }
    } else {
        echo "Error: " . $sql_disabilitypedetails . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จในตาราง disabilitypedetails')</script>";
    }
} else {
    echo "<script>alert('ไม่พบ disabilitype_id')</script>";
    echo "<script>window.location = '../show_disabilitype.php'</script>";
}

mysqli_close($conn);
?>

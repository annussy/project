<?php
include 'C:\laragon\www\project\config\config.php';

if (isset($_GET['disabilitype_id'])) {  // ตรวจสอบว่าค่า disabilitype_id ถูกส่งมาหรือไม่
    $disabilitype_id = $_GET['disabilitype_id'];
    
    // แก้ไขชื่อตารางให้ถูกต้องเป็น disabilitype
    $sql = "DELETE FROM disabilitype WHERE disabilitype_id = $disabilitype_id";  // เปลี่ยนชื่อตารางเป็น disabilitype

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>window.location = '../show_disabilitype.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }
} else {
    echo "<script>alert('ไม่พบ disabilitype_id')</script>";
    echo "<script>window.location = '../show_disabilitype.php'</script>";
}

mysqli_close($conn);
?>

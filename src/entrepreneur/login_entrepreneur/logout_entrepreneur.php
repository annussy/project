<?php
session_start(); // เริ่มเซสชัน

// ทำลายเซสชันทั้งหมด
session_destroy(); // ทำลายเซสชัน

// นำทางไปยังหน้าเข้าสู่ระบบหรือหน้าอื่นตามต้องการ
header("Location: ../login_entrepreneur/login_entrepreneur.php"); // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
exit();
?>

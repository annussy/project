<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['entrepreneur_id'])) {
    // ถ้าไม่ได้เข้าสู่ระบบ ให้นำไปหน้าเข้าสู่ระบบ
    header("Location: ../login_entrepreneur/login_entrepreneur.php");
    exit();
}
// ดึง ID ผู้ใช้จากเซสชัน
$entrepreneur_id = $_SESSION['entrepreneur_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/entrepreneur/show_homepage.css"> <!-- แก้ไข path ให้ตรงกับที่เก็บไฟล์ CSS ของคุณ -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
            <ul class="nav">
                <li>
                    <a href="../homepage/show_homepage.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">หน้าแรก</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
                </li>

                <li>
                    <a href="../need/form_need.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลความต้องการ</span>
                    </a>
                </li>

                <li>
                    <a href="../needdetails/show_needdetails.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดความต้องการ</span>
                    </a>
                </li>

                <li><a href="../login_entrepreneur/logout_entrepreneur.php">ออกจากระบบ</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลส่วนตัว</div>
            </div>

            <!-- แสดงข้อมูลส่วนตัวของผู้ใช้งาน -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ข้อมูล</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // ดึงข้อมูลจากฐานข้อมูล
                        $sql = "SELECT entrepreneur_name, entrepreneur_agency, tel, email FROM entrepreneur WHERE entrepreneur_id = " . $_SESSION['entrepreneur_id'];
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            // แสดงข้อมูลของผู้ใช้งานในตาราง
                            $row = mysqli_fetch_assoc($result);
                            echo "<tr><td>ชื่อ-สกุล</td><td>" . $row['entrepreneur_name'] . "</td></tr>";
                            echo "<tr><td>ตำแหน่ง</td><td>" . $row['entrepreneur_agency'] . "</td></tr>";
                            echo "<tr><td>เบอร์โทร</td><td>" . $row['tel'] . "</td></tr>";
                            echo "<tr><td>อีเมล</td><td>" . $row['email'] . "</td></tr>";
                        } else {
                            echo "<tr><td colspan='2'>ไม่พบข้อมูลส่วนตัว</td></tr>";
                        }
                    ?>
                </tbody>
            </table>

        </div>

    </div>

    <script>
        function goBack() {
            window.location.href = "form_ability.php";
        }
    </script>
</body>
</html>

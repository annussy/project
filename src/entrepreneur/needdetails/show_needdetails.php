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
    <link rel="stylesheet" href="../../../public/css/entrepreneur/form_need.css"> <!-- แก้ไข path ให้ตรงกับที่เก็บไฟล์ CSS ของคุณ -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
            <ul class="nav">
                <li>
                    <a href="">
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
                        <span class="title">ข้อมูลความสามารถผู้พิการ</span>
                    </a>
                </li>

                <li>
                    <a href="../needdetails/show_needdetails.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดความสามารถ</span>
                    </a>
                </li>

                <li><a href="../login_entrepreneur/logout_entrepreneur.php">ออกจากระบบ</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <div class="alert alert-primary h4 text-center mt-4" role="alert">รายละเอียดประเภทความพิการ</div>
            </div>

            <!-- แสดงข้อมูลส่วนตัวของผู้ใช้งาน -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ประเภทความพิการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            // ดึงข้อมูลจากฐานข้อมูล
                        $ability_id = $_SESSION['entrepreneur_id'];
                        $sql = "SELECT ability.ability_name 
                        FROM ability
                        JOIN need  ON need.ability_id = ability.ability_id 
                        WHERE need.entrepreneur_id = $ability_id";

                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                        // แสดงข้อมูลของผู้ใช้งานในตาราง
                             while ($row = mysqli_fetch_assoc($result)) {
                             echo "<tr><td>" . $row['ability_name'] . "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>ไม่พบข้อมูลกิจกรรม</td></tr>";
                    }
                    ?>


                </tbody>
            </table>
        </div>

    </div>

    <script>
        function goBack() {
            window.location.href = "";
        }
    </script>
</body>
</html>

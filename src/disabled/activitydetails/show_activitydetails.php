<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['disabled_id'])) {
    // ถ้าไม่ได้เข้าสู่ระบบ ให้นำไปหน้าเข้าสู่ระบบ
    header("Location: ../login_disabled/login_disabled.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/disabled/homepage/show_homepage.css"> <!-- แก้ไข path ให้ตรงกับที่เก็บไฟล์ CSS ของคุณ -->
</head>
<body>
    
        <div class="sidebar">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
            <ul class="nav">
            <li>
                    <a href="../homepage/show_homepage.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">หน้าแรก</span> 
                    </a>
                </li>

                <li>
                    <a href="../activity/form_activity.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ลงทะเบียนข้อมูลกิจกรรม</span>
                    </a>
                </li>

                <li>
                    <a href="../activitydetails/show_activitydetails.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดข้อมูลกิจกรรม</span>
                    </a>
                </li>


                <li>
                    <a href="../disabilitype/form_disabilitype.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ลงทะเบียนประเภทความพิการ</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ลงทะเบียนรับเบี้ยผู้พิการ</span>
                    </a>
                </li>

                <li>
                    <a href="../ability/form_ability.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลความสามารถ</span>
                    </a>
                </li>

                <li>
                    <a href="../abilitydetalis/show_abilitydetails.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดข้อมูลความสามารถ</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">แบบประเมินการใช้ชีวิต</span>
                    </a>
                </li>

                <li>
                    <a href="../disease/form_disease.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลโรคประจำตัว</span>
                    </a>
                </li>

                <li>
                    <a href="../diseasedetails/show_diseasedetails.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดข้อมูลโรคประจำตัว</span>
                    </a>
                </li>

                <li><a href="../login_disabled/logout_disabled.php">ออกจากระบบ</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <div class="alert alert-primary h4 text-center mt-4" role="alert">รายละเอียดการเข้าร่วมกิจกรรม</div>
            </div>

            <!-- แสดงข้อมูลส่วนตัวของผู้ใช้งาน -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ชื่อกิจกรรม</th>
                        <th>สถานที่จัด</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            // ดึงข้อมูลจากฐานข้อมูล
                        $activity_id = $_SESSION['disabled_id'];
                        $sql = "SELECT activity.activity_name, activity.activity_location, activity.details 
                        FROM activity 
                        JOIN activitydetails  ON activitydetails.activity_id = activity.activity_id 
                        WHERE activitydetails.disabled_id = $activity_id";

                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                        // แสดงข้อมูลของผู้ใช้งานในตาราง
                             while ($row = mysqli_fetch_assoc($result)) {
                             echo "<tr><td>" . $row['activity_name'] . "</td><td>" . $row['activity_location'] . "</td><td>" . $row['details'] . "</td></tr>";
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
<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['disabled_id'])) {
    // ถ้าไม่ได้เข้าสู่ระบบ ให้นำไปหน้าเข้าสู่ระบบ
    header("Location: ../login_disabled/login_disabled.php");
    exit();
}
// ดึง ID ผู้ใช้จากเซสชัน
$disabled_id = $_SESSION['disabled_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมสำหรับผู้พิการ</title>
    <link rel="stylesheet" href="../../../public/css/disabled/activity/apply.css">
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
                    <a href="../activity/form_activity.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ลงทะเบียนข้อมูลกิจกรรม</span>
                    </a>
                </li>

                <li>
                    <a href="">
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
                        <span class="title">ข้อมูลความสามารถ</span>  <!-- ยังไม่เพิ่ม หน้า-home-->
                    </a>
                </li>

                <li>
                    <a href="">
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
                        <span class="title">ข้อมูลโรคประจำตัว</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
                </li>

                <li><a href="../login_disabled/logout_disabled.php">ออกจากระบบ</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <div class="alert" role="alert">กิจกรรมผู้พิการ</div>
            </div>
            <table class="activity-table">
                <thead>
                    <tr>
                        <th>ชื่อกิจกรรม</th>
                        <th>สถานที่จัด</th>
                        <th>จำนวนรับ</th>
                        <th>รายละเอียดกิจกรรม</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT activity_id, activity_name, activity_location, activity_count, details FROM activity";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["activity_name"] . "</td>";
                            echo "<td>" . $row["activity_location"] . "</td>";
                            echo "<td>" . $row["activity_count"] . "</td>";
                            echo "<td>" . $row["details"] . "</td>";

                            // ฟอร์มสำหรับการสมัครกิจกรรม
                            echo '<td>';
                            echo '<form action="join_activity.php" method="POST">';
                            echo '<input type="hidden" name="activity_id" value="' . $row["activity_id"] . '">';
                            echo '<input type="hidden" name="disabled_id" value="' . $disabled_id . '">';  // ส่ง disabled_id จาก session
                            echo '<button type="submit">สมัคร</button>';
                            echo '</form>';
                            echo '</td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>ไม่มีข้อมูลกิจกรรม</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    // ฟังก์ชันตรวจสอบค่าจาก URL และแสดงข้อความแจ้งเตือน
    function getMessageFromUrl() {
        const params = new URLSearchParams(window.location.search);
        const message = params.get('message');

        if (message === 'success') {
            alert("สมัครกิจกรรมสำเร็จ!");
        } else if (message === 'already_registered') {
            alert("คุณได้สมัครกิจกรรมนี้แล้ว");
        } else if (message === 'error') {
            alert("เกิดข้อผิดพลาดในการสมัครกิจกรรม");
        } else if (message === 'no_data') {
            alert("ไม่มีข้อมูลที่ส่งมา");
        }
    }

    // เรียกใช้ฟังก์ชันเมื่อโหลดหน้าเว็บ
    getMessageFromUrl();
    </script>

</body>

</html>

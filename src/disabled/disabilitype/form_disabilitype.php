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
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/disabled/ability/form_ability.css"> <!-- แก้ไข path ให้ตรงกับที่เก็บไฟล์ CSS ของคุณ -->
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
                    <a href="../disabilitypedetails/show_disabilitypedetails.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดประเภทความพิการ</span>
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
                <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลประเภทความพิการ</div>
            </div>
        <form action="join_disabilitypedetails.php" method="post">
    <table>
        <thead>
            <tr>
                <th>เลือกความสามารถ</th>
                <th>ความสามารถ</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    // ดึงข้อมูลจากฐานข้อมูล
                    $sql = "SELECT disabilitype_id, type_name FROM disabilitype";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // แสดงข้อมูลในตาราง
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo '<td><input type="checkbox" name="disabilitype[]" value="' . $row["disabilitype_id"] . '"></td>';
                            echo "<td>" . $row["type_name"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>ไม่มีข้อมูลโรค</td></tr>";
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
        </tbody>
    </table>
    <input type="hidden" name="disabled_id" value="<?php echo $disabled_id; ?>"> <!-- ใช้ค่า disabled_id จากเซสชัน -->
    <button type="submit">ยืนยันการเลือกความสามารถ</button>
</form>

    </div>

    <script>
        function goBack() {
            window.location.href = "form_ability.php";
        }
    </script>
</body>
</html>

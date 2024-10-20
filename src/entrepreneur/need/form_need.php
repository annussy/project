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
        <form action="join_needdetails.php" method="post">
        <div class="header">
    <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลความสามารถที่ต้องการ</div>
        </div>
    <table>
        <thead>
            <tr>
                <th>เลือกความสามารถที่ต้องการ</th>
                <th>ความสามารถ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ดึงข้อมูลจากฐานข้อมูล
            $sql = "SELECT ability_id, ability_name FROM ability";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // แสดงข้อมูลในตาราง
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="ability[]" value="' . $row["ability_id"] . '"></td>';
                    echo "<td>" . $row["ability_name"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>ไม่มีข้อมูลความสามารถ</td></tr>";
            }

            // ปิดการเชื่อมต่อ
            $conn->close();
            ?>
        </tbody>
    </table>
    <input type="hidden" name="disabled_id" value="<?php echo $disabled_id; ?>"> <!-- ใช้ค่า disabled_id จากเซสชัน -->
    <button type="submit">ยืนยันการเลือกความต้องการ</button>
</form>

    </div>

    <script>
        function goBack() {
            window.location.href = "form_ability.php";
        }
    </script>
</body>
</html>

<?php
include 'C:\laragon\www\project\config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/disabled/disease/form_disease.css"> <!-- แก้ไข path ให้ตรงกับที่เก็บไฟล์ CSS ของคุณ -->
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
                    <a href="../activity_disabled/apply.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">บันทึกข้อมูลโรคประจำตัว</span>
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
                    <a href="../disease/form_disease.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">แบบประเมินการใช้ชีวิต</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลโรคประจำตัว</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
                </li>

                <li><a href="logout">ออกจากระบบ</a></li>
            </ul>
        </div>

        <form action="disease-table" method="post">
            <table>
                <thead>
                    <tr>
                        <th>เลือกโรค</th>
                        <th>ชื่อโรค</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ดึงข้อมูลจากฐานข้อมูล
                    $sql = "SELECT disease_id, disease_name FROM disease";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // แสดงข้อมูลในตาราง
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo '<td><input type="checkbox" name="disease[]" value="' . $row["disease_id"] . '"></td>';
                            echo "<td>" . $row["disease_name"] . "</td>";
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
            <button type="submit">ยืนยันการเลือกโรค</button>
        </form>
    </div>

    <script>
        function goBack() {
            window.location.href = "form_disease.php";
        }
    </script>
</body>
</html>

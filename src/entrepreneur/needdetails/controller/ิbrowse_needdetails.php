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
    <div class="container">    
        <div class="alert alert-success h4 text-center mt-4" role="alert">รายละเอียดความสามารถ</div>
        <a href="../show_ability.php"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a>
        <table class="table table-striped table-hover mt-4">
            <tr>
                <th>รหัสความสามารถ</th>
                <th>ความสามารถ</th>
                <th>รหัสผู้พิการ</th>
                <th>ชื่อผู้พิการ</th>
            </tr>

            <?php
            // ตรวจสอบว่ามีการส่ง ability_id มาหรือไม่
            if ($ability_id > 0) {
                // ปรับ SQL query ให้แสดงข้อมูลตาม ability_id
                $sql = "SELECT abilitydetails.ability_id, ability.ability_name, abilitydetails.disabled_id, disabled.disabled_name 
                        FROM abilitydetails 
                        JOIN ability ON abilitydetails.ability_id = ability.ability_id
                        JOIN disabled ON abilitydetails.disabled_id = disabled.disabled_id
                        WHERE abilitydetails.ability_id = $ability_id";

                $result = mysqli_query($conn, $sql);

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){ 
            ?>
                        <tr>
                            <td><?php echo $row['ability_id']; ?></td>
                            <td><?php echo $row['ability_name']; ?></td>
                            <td><?php echo $row['disabled_id']; ?></td>
                            <td><?php echo $row['disabled_name']; ?></td>
                        </tr>
            <?php 
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>ไม่พบข้อมูลสำหรับความสามารถนี้</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>กรุณาระบุรหัสความสามารถถูกต้อง</td></tr>";
            }

            // ปิดการเชื่อมต่อฐานข้อมูล
            mysqli_close($conn);
            ?>
        </table>
    </div>

    <script language="Javascript">
        function Del(mypage){
            var agree = confirm("คุณต้องการลบข้อมูลนี้ใช่หรือไม่?");
            if(agree){
                window.location = mypage;
            }
        }
    </script>
    </div>
</body>
</html>

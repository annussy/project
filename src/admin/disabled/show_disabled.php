<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['employee_id'])) {
    // ถ้าไม่ได้เข้าสู่ระบบ ให้นำไปหน้าเข้าสู่ระบบ
    header("Location: ../login_admin/login_admin.php");
    exit();
}
// ดึง ID ผู้ใช้จากเซสชัน
$employee_id = $_SESSION['employee_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/disabled/show.css"> <!-- ลิงก์ไฟล์ CSS ที่นี่ -->
</head>
<body>
<div class="sidebar">
        <img src="logo.jpg" alt="CARE Logo" class="logo">
        <ul class="nav">
            <li>
                <a href="">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">หน้าแรก</span>
                </a>
            </li>

            <li>
                <a href="../disabled/show_disabled.php"> <!-- ยังต้องเพิ่ม -->
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลผู้พิการ</span>
                </a>
            </li>
            <li>
                <a href="../activity/show_activity.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลกิจกรรมผู้พิการ</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลรับเบี้ยผู้พิการ</span>
                </a>
            </li>

            <li>
                    <a href="../disabilitype/show_disabilitype.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ประเภทความพิการ</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
            </li>

            <li>
                <a href="../disease/form_disease.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลความสามารถผู้พิการ</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลแบบประเมินผู้พิการ</span>
                </a>

            <li>
                <a href="../disease/show_disease.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลโรคประจำตัวผู้พิการ</span>
                </a>
            </li>

            <li>
                <a href="../disease/form_disease.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลความต้องการผู้ประกอบการ</span>
                </a>

                <li><a href="../login_admin/logout_admin.php">ออกจากระบบ</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลผู้พิการ</div>
            <a href="create_disabled.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้พิการ</th>
                        <th>เลขบัตรประชาชน</th>
                        <th>วัน/เดือน/ปีเกิด</th>
                        <th>อายุ</th>
                        <th>สถานะ</th>
                        <th>ที่อยู่</th>
                        <th>อาชีพ</th>
                        <th>รายได้</th>
                        <th>เบอร์โทร</th>
                        <th>อีเมล</th>
                        <th>รหัสผ่าน</th>
                        <th>ยืนยันรหัสผ่าน</th>
                        <th>เรียกดู</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM disabled";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $row['disabled_id']; ?></td>
                        <td><?php echo $row['disabled_name']; ?></td>
                        <td><?php echo $row['disabled_card']; ?></td>
                        <td><?php echo $row['birthday']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['job']; ?></td>
                        <td><?php echo $row['income']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['password_h']; ?></td>
                        
                        <td><a href="controller/browse_disabled.php?disabled_id=<?php echo $row['disabled_id']; ?>">เรียกดู</a></td>
                        <td><a href="controller/edit_disabled.php?disabled_id=<?php echo $row['disabled_id']; ?>">แก้ไข</a></td>
                        <td><a href="controller/delete_disabled.php?disabled_id=<?php echo $row['disabled_id']; ?>">ลบ</a>
                        </td>

                    </tr>
                    
                    <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='7'>ไม่พบข้อมูล</td></tr>";
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

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
    <link rel="stylesheet" href="../../../public/css/admin/activity/show_activity.css"> <!-- ลิงก์ไฟล์ CSS ที่นี่ -->
</head>
<style>
    .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-info:hover {
            background-color: #117a8b;
        }
        .btn-warning {
            background-color: #ffc107;
            color: black;
        }
        .btn-warning:hover {
            background-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .btn-group {
            display: flex;
            gap: 5px;
        }
</style>
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
                <a href="../disabled/show_disabled.php">
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
                <a href="../money/show_money.php">
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
                <a href="../ability/show_ability.php">
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
                <a href="../entrepreneur/show_entrepreneur.php"
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลผู้ประกอบการ</span>
                </a>

                <li><a href="../login_admin/logout_admin.php">ออกจากระบบ</a></li>
        </ul>
    </div>


    <div class="main-content">
        <div class="container">
            <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลกิจกรรม</div>
            <a href="../activity/controller/create_activity.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>สถานที่</th>
                        <th>จำนวนรับ</th>
                        <th>รายละเอียดกิจกรรม</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM activity";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $row['activity_id']; ?></td>
                        <td><?php echo $row['activity_name']; ?></td>
                        <td><?php echo $row['activity_location']; ?></td>
                        <td><?php echo $row['activity_count']; ?></td>
                        <td><?php echo $row['details']; ?></td>
                        <td>
                        <div class="btn-group">
                        <a href="controller/browse_activitydetails.php?activity_id=<?php echo $row['activity_id']; ?>" class="btn btn-info">เรียกดูรายละเอียด</a>
                        <a href="controller/edit_activity.php?activity_id=<?php echo $row['activity_id']; ?>" class="btn btn-warning">แก้ไข</a>
                        <a href="controller/delete_activity.php?activity_id=<?php echo $row['activity_id']; ?>" class="btn btn-danger">ลบ</a></td>

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

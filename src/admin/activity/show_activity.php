<?php
include 'C:\laragon\www\project\config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/activity/show_activity.css"> <!-- ลิงก์ไฟล์ CSS ที่นี่ -->
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
                <a href="../activity_disabled/apply.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลผู้พิการ</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลกิจกรรมผู้พิการ</span>
                </a>
            </li>

            <li>
                <a href="../disease/form_disease.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลรับเบี้ยผู้พิการ</span>
                </a>
            </li>

            <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">รายละเอียดประเภทความพิการ</span>  <!-- ยังไม่เพิ่ม -->
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
                <a href="../disease/form_disease.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลแบบประเมินผู้พิการ</span>
                </a>

            <li>
                <a href="">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลสุขภาพผู้พิการ</span>
                </a>
            </li>

            <li>
                <a href="../disease/form_disease.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">ข้อมูลความต้องการผู้ประกอบการ</span>
                </a>

                <li>
                <a href="">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">รายละเอียดความสามารถผู้พิการ</span>
                </a>
            </li>

            <li><a href="logout">ออกจากระบบ</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลกิจกรรม</div>
            <a href="create_activity.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>สถานที่</th>
                        <th>จำนวนรับ</th>
                        <th>รายละเอียดกิจกรรม</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
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
                        <td><a href="../controller/activity/update.php?id=<?php echo $row['activity_id']; ?>">แก้ไข</a></td>
                        <td><a href="../controller/activity/delete.php?id=<?php echo $row['activity_id']; ?>">ลบ</a></td>
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

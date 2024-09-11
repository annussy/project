<?php
include 'C:\laragon\www\project\config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/disease/show_disease.css"> <!-- เพิ่มลิงก์ไปยังไฟล์ CSS ถ้ามี -->
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
    <div class="container">    
    <div class="main-content">
        <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลโรคผู้พิการ</div>
        <a href="create_disease.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>โรคประจำตัว</th>
                    <th>ระดับน้ำตาลในเลือด</th>
                    <th>ชีพจร</th> 
                    <th>สถานะมีโรค</th>        
                    <th>น้ำหนัก</th>
                    <th>ส่วนสูง</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM disease";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) { 
                ?>
                <tr>
                    <td><?php echo $row['disease_id']; ?></td>
                    <td><?php echo $row['disease_name']; ?></td>
                    <td><?php echo $row['disease_sugar']; ?></td>
                    <td><?php echo $row['disease_pressure']; ?></td>
                    <td><?php echo $row['disease_status']; ?></td>
                    <td><?php echo $row['weight']; ?></td>
                    <td><?php echo $row['height']; ?></td>
                    <td><a href="controller/edit_disease.php?disease_id=<?php echo $row['disease_id']; ?>">แก้ไข</a></td>
                    <td><a href="controller/delete_disease.php?disease_id=<?php echo $row['disease_id']; ?>">ลบ</a></td>
                </tr>
                
                <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
                    }
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

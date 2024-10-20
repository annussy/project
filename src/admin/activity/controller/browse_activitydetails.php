<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['employee_id'])) {
    header("Location: ../login_admin/login_admin.php");
    exit();
}

$employee_id = $_SESSION['employee_id'];

// ตรวจสอบการรับ activity_id จาก URL
if (isset($_GET['activity_id'])) {
    $activity_id = $_GET['activity_id'];
} else {
    $activity_id = 0; // กำหนดค่าเริ่มต้นหากไม่มีการส่ง activity_id
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../../public/css/admin/activitydetails/show_activitydetails.css"> <!-- ลิงก์ไฟล์ CSS ที่นี่ -->
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
                <a href="">
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
        <div class="alert alert-success h4 text-center mt-4" role="alert">รายละเอียดกิจกรรม</div>
        <a href="../show_activity.php"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a>
        <table class="table table-striped table-hover mt-4">
            <tr>
                <th>รหัสกิจกรรม</th>
                <th>ชื่อกิจกรรม</th>
                <th>รหัสผู้พิการ</th>
                <th>ชื่อผู้พิการ</th>
            </tr>

            <?php
            // ตรวจสอบว่ามีการส่ง activity_id มาหรือไม่
            if ($activity_id > 0) {
                // ปรับ SQL query ให้แสดงข้อมูลตาม activity_id
                $sql = "SELECT activitydetails.activity_id, activity.activity_name, activitydetails.disabled_id, disabled.disabled_name 
                        FROM activitydetails 
                        JOIN activity ON activitydetails.activity_id = activity.activity_id
                        JOIN disabled ON activitydetails.disabled_id = disabled.disabled_id
                        WHERE activitydetails.activity_id = $activity_id";
                            $result = mysqli_query($conn, $sql);

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){ 
            ?>
                        <tr>
                            <td><?php echo $row['activity_id']; ?></td>
                            <td><?php echo $row['activity_name']; ?></td>
                            <td><?php echo $row['disabled_id']; ?></td>
                            <td><?php echo $row['disabled_name']; ?></td>
                            <!-- <td><a href="controller/delete_activitydetails.php?activitydetails_id=<?php echo $row['activity_id']; ?>" onclick="Del(this.href); return false;">ลบ</a></td> -->
                        </tr>
            <?php 
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>ไม่พบข้อมูลสำหรับกิจกรรมนี้</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>กรุณาระบุรหัสกิจกรรมที่ถูกต้อง</td></tr>";
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

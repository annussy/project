<?php
include 'C:\laragon\www\project\config\config.php';

// ดึง money_id จาก URL
$money_id = isset($_GET['money_id']) ? intval($_GET['money_id']) : 0;

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
                <a href="../entrepreneur/show_entrepreneur.php">
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
            <div class="alert alert-success h4 text-center mt-4" role="alert">รายละเอียดการรับเบี้ยผู้พิการ</div>
            <a href="../show_money.php"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a>
            <table class="table table-striped table-hover mt-4">
                <tr>
                    <th>รหัสการชำระเงิน</th>
                    <th>รหัสผู้พิการ</th>
                    <th>ชื่อผู้พิการ</th>
                </tr>

                <?php
                // ตรวจสอบว่ามีการส่ง money_id มาหรือไม่
                if ($money_id > 0) {
                    // ปรับ SQL query ให้ดึงข้อมูลจาก moneydetail โดยเชื่อมกับตาราง disabled
                    $sql = "SELECT moneydetails.moneydetails_id, moneydetails.money_id, moneydetails.disabled_id, disabled.disabled_name 
                            FROM moneydetails
                            INNER JOIN disabled ON moneydetails.disabled_id = disabled.disabled_id
                            WHERE moneydetails.money_id = ?";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $money_id); // ใช้ money_id ในการค้นหา
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // ตรวจสอบว่ามีข้อมูลหรือไม่
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){ 
                ?>
                            <tr>
                                <td><?php echo $row['moneydetails_id']; ?></td>
                                <td><?php echo $row['disabled_id']; ?></td>
                                <td><?php echo $row['disabled_name']; ?></td>
                                <!-- <td><a href="delete_money.php?money_id=<?php echo $row['money_id']; ?>" onclick="Del(this.href); return false;" class="btn btn-danger">ลบ</a></td>
                            </tr> -->
                <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>ไม่พบข้อมูลสำหรับเบี้ยผู้พิการนี้</td></tr>";
                    }
                    $stmt->close();
                } else {
                    echo "<tr><td colspan='5' class='text-center'>กรุณาระบุรหัสการชำระเงินที่ถูกต้อง</td></tr>";
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

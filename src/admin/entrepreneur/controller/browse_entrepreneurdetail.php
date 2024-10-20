<?php
include 'C:\laragon\www\project\config\config.php';

// ดึง entrepreneur_id จาก URL
$c_id = isset($_GET['entrepreneur_id']) ? intval($_GET['entrepreneur_id']) : 0;

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
                <a href="">
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
                        <span class="title">ประเภทความพิการ</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
            </li>

            <li>
                <a href="">
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
                <a href="">
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

                <li><a href="">ออกจากระบบ</a></li>
        </ul>
    </div>

    </div>
    <div class="main-content">
    <div class="container">    
        <div class="alert alert-success h4 text-center mt-4" role="alert">ข้อมูลความต้องการของผู้ประกอบการ</div>
        <a href="../show_entrepreneur.php"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a>
        <table class="table table-striped table-hover mt-4">

            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อผู้ประกอบการ</th>
                <th>ชื่อผู้พิการ</th>
                <th>ความสามารถ</th>
            </tr>

                                <?php
                // ตรวจสอบว่ามีการส่ง entrepreneur_id มาหรือไม่ผ่าน GET หรือ POST
                if (isset($_GET['entrepreneur_id'])) {
                    $entrepreneur_id = $_GET['entrepreneur_id']; // ดึงค่า entrepreneur_id จาก URL (GET method)
                } elseif (isset($_POST['entrepreneur_id'])) {
                    $entrepreneur_id = $_POST['entrepreneur_id']; // หรือจากฟอร์ม (POST method)
                } else {
                    $entrepreneur_id = 0; // กำหนดค่าเริ่มต้นเป็น 0 หากไม่มีค่า
                }

                // ตรวจสอบว่ามีการส่ง entrepreneur_id มาหรือไม่
                if ($entrepreneur_id > 0) { // แก้ไขจาก $need_id เป็น $entrepreneur_id
                    // ปรับ SQL query ให้แสดงข้อมูลตาม entrepreneur_id
                    $sql = "SELECT need.need_id, entrepreneur.entrepreneur_agency, ability.ability_name, disabled.disabled_name 
                            FROM need 
                            JOIN entrepreneur ON need.entrepreneur_id = entrepreneur.entrepreneur_id
                            JOIN ability ON need.ability_id = ability.ability_id
                            JOIN disabled ON disabled.disabled_id = disabled.disabled_id
                            WHERE need.entrepreneur_id = $entrepreneur_id";

                    $result = mysqli_query($conn, $sql);

                    // ตรวจสอบว่ามีข้อมูลหรือไม่
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                            <tr>
                                <td><?php echo $row['need_id']; ?></td>
                                <td><?php echo $row['entrepreneur_agency']; ?></td>
                                <td><?php echo $row['disabled_name']; ?></td>
                                <td><?php echo $row['ability_name']; ?></td>
                                <!-- <td><a href="delete_money.php?money_id=<?php echo $row['need_id']; ?>" onclick="Del(this.href); return false;" class="btn btn-danger">ลบ</a></td> -->
                            </tr>
                <?php
                        }
                    } else {
                        echo "ไม่มีข้อมูล";
                    }
                } else {
                    echo "ไม่พบ entrepreneur_id ที่ถูกต้อง";
                }
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

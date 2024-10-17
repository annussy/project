<?php 
  include 'C:\laragon\www\project\config\config.php';
    $disabilitype_id = $_GET['disabilitype_id'];
    $sql = "SELECT * FROM disabilitype WHERE disabilitype_id = $disabilitype_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../../public/css/admin/money/form_money.css"> <!-- เพิ่มลิงก์ไปยังไฟล์ CSS ถ้ามี -->
    <script>
        function showAlert() {
            alert('เพิ่มข้อมูลเสร็จเรียบร้อยแล้ว');
            window.location.href = "show_disabled.php"; // ย้อนกลับไปหน้าแสดงข้อมูล
        }
    </script>
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

<div class="container mt-5">
    <div class="main-content">

        <div class="alert alert-primary h4 text-center" role="alert">แก้ไขข้อมูลความพิการ</div>

        <a href="../show_disabilitype.php"><button type="button" class="btn btn-secondary mb-3">ย้อนกลับ</button></a>

        <form action="update_disabilitype.php" method="post">
            <input type="hidden" name="disabilitype_id" value="<?= isset($row['disabilitype_id']) ? $row['disabilitype_id'] : '' ?>">

            <label for="name" class="form-label">ชื่อประเภทความพิการ</label>
            <input type="text" class="form-control" id="name" name="type_name" value="<?= isset($row['type_name']) ? $row['type_name'] : '' ?>">

            <label for="money" class="form-label">จำนวนเงินที่ได้รับ</label>     
            <input type="text" class="form-control" id="money" name="type_money" value="<?= isset($row['type_money']) ? $row['type_money'] : '' ?>">

            <button type="submit" name="update_disabilitype.php">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>
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

<div class="container mt-5">
    <div class="main-content">

        <div class="alert alert-primary h4 text-center" role="alert">เพิ่มข้อมูลกิจกรรมผู้พิการ</div>

        <a href="../show_activity.php"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a>

            <form action="insert_activity.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อกิจกรรม :</label>
                    <input type="text" id="name" name="activity_name" required>
                </div>
                <div class="form-group">
                    <label for="card">สถานที่จัดกิจกรรม :</label>
                    <input type="text" id="location" name="activity_location" required>
                </div>
                <div class="form-group">
                    <label for="tel">จำนวนรับ :</label>
                    <input type="text" id="count" name="activity_count" required>
                </div>
                <div class="form-group">
                    <label for="email">รายละเอียดกิจกรรม :</label>
                    <input type="text" id="details" name="details" required>
                </div>
                <button type="submit" href="insert_activity.php">เพิ่มข้อมูล</button>
            </form>
        </div>
    </div>
</body>
</html>

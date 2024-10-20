<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/money/form_money.css"> <!-- เพิ่มลิงก์ไปยังไฟล์ CSS ถ้ามี -->
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

<div class="container">    
    <div class="main-content">
        <div class="alert alert-primary h4 text-center mt-4" role="alert">เพิ่มข้อมูลผู้พิการ</div>
        <a href="show_disabled.php"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a>
            <form action="../disabled/controller/insert_disabled.php" method="post">
            <div class="form-group">
                    <label for="name">ชื่อ-สกุล :</label>
                    <input type="text" id="name" name="disabled_name" required>
                </div>

                <div class="form-group"
                    <label for="card">เลขบัตรประจำตัวประชาชน :</label>
                    <input type="text" id="card" name="disabled_card" required>
                </div>

                <div class="form-group">
                    <label for="dob">วันเดือนปีเกิด :</label>
                    <input type="date" id="dob" name="birthday" required>
                </div>

                <div class="form-group">
                    <label for="age">อายุ :</label>
                    <input type="number" id="age" name="age" required>
                </div>

                <div class="form-group">
                    <label for="status">สถานะภาพ :</label>
                    <select id="status" name="status" required>
                        <option value="single">โสด</option>
                        <option value="married">แต่งงาน</option>
                        <option value="divorced">หย่าร้าง</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">ที่อยู่ :</label>
                    <textarea id="address" name="address" required></textarea>
                </div>

                <div class="form-group">
                    <label for="occupation">อาชีพ :</label>
                    <input type="text" id="occupation" name="job" required>
                </div>

                <div class="form-group">
                    <label for="income">รายได้ :</label>
                    <input type="number" id="income" name="income" required>
                </div>


                <div class="form-group">
                    <label for="tel">เบอร์โทรติดต่อ :</label>
                    <input type="tel" id="tel" name="tel" required class="input-field">
                </div>

                <div class="form-group">
                    <label for="email">อีเมล :</label>
                    <input type="email" id="email" name="email" required class="input-field">
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน :</label>
                    <input type="password" id="password" name="password" required class="input-field">
                </div>

                <div class="form-group">
                    <label for="password_h">ยืนยันรหัสผ่าน :</label>
                    <input type="password" id="password_h" name="password_h" required class="input-field">
                </div>

</form>
                <button type="submit" href="../disabled/controller/insert_disabled.php">เพิ่มข้อมูล</button>
            </form>
        </div>
    </div>
</body>
</html>

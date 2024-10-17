<?php 
  include 'C:\laragon\www\project\config\config.php';
  $disabled_id = $_GET['disabled_id'];
  $sql = "SELECT * FROM disabled WHERE disabled_id = $disabled_id";
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

        <div class="alert alert-primary h4 text-center" role="alert">แก้ไขข้อมูลผู้พิการ</div>

        <a href="../show_disabled.php"><button type="button" class="btn btn-secondary mb-3">ย้อนกลับ</button></a>

        <form action="update_disabled.php" method="post">
            <input type="hidden" name="disabled_id" value="<?= isset($row['disabled_id']) ? $row['disabled_id'] : '' ?>">

            <div class="form-group">
                <label for="name" class="form-label">ชื่อผู้พิการ</label>
                <input type="text" class="form-control" id="name" name="disabled_name" value="<?= isset($row['disabled_name']) ? $row['disabled_name'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="card" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" id="card" name="disabled_card" value="<?= isset($row['disabled_card']) ? $row['disabled_card'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="dob" class="form-label">วันเดือนปีเกิด</label>
                <input type="date" class="form-control" id="dob" name="birthday" value="<?= isset($row['birthday']) ? $row['birthday'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="age" class="form-label">อายุ</label>
                <input type="number" class="form-control" id="age" name="age" value="<?= isset($row['age']) ? $row['age'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">สถานะภาพ</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="single" <?= (isset($row['status']) && $row['status'] == 'single') ? 'selected' : ''; ?>>โสด</option>
                    <option value="married" <?= (isset($row['status']) && $row['status'] == 'married') ? 'selected' : ''; ?>>แต่งงาน</option>
                    <option value="divorced" <?= (isset($row['status']) && $row['status'] == 'divorced') ? 'selected' : ''; ?>>หย่าร้าง</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= isset($row['address']) ? $row['address'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="occupation" class="form-label">อาชีพ</label>
                <input type="text" class="form-control" id="occupation" name="job" value="<?= isset($row['job']) ? $row['job'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="income" class="form-label">รายได้</label>
                <input type="number" class="form-control" id="income" name="income" value="<?= isset($row['income']) ? $row['income'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="tel" class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?= isset($row['tel']) ? $row['tel'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($row['email']) ? $row['email'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= isset($row['password']) ? $row['password'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="password_h" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" id="password_h" name="password_h" value="<?= isset($row['password_h']) ? $row['password_h'] : '' ?>" required>
            </div>

            <button type="submit" name="update_disabled" class="btn btn-primary">แก้ไขข้อมูล</button>
        </form>
    </div>
</div>

</body>
</html>

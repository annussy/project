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
    <title>แก้ไขข้อมูลผู้พิการ</title>
    <!-- ลิงก์ไฟล์ CSS ที่แยกออกมา -->
    <link rel="stylesheet" href="../../../../public/css/admin/disabled/edit.css"> 
</head>

<body>
    <div class="container">
        <h2>แก้ไขข้อมูลผู้พิการ</h2>

        <div class="content">
        <form action="update_disabled.php" method="post">
            <input type="hidden" name="disabled_id" value="<?= isset($row['disabled_id']) ? $row['disabled_id'] : '' ?>">

            <label for="name" class="form-label">ชื่อผู้พิการ</label>
            <input type="text" class="form-control" id="name" name="disabled_name" value="<?= isset($row['disabled_name']) ? $row['disabled_name'] : '' ?>">

            <label for="card" class="form-label">เลขบัตรประจำตัวประชาชน</label>
            <input type="text" class="form-control" id="card" name="disabled_card" value="<?= isset($row['disabled_card']) ? $row['disabled_card'] : '' ?>">

            <label for="dob" class="form-label">วันเดือนปีเกิด</label>
            <input type="date" class="form-control" id="dob" name="birthday" value="<?= isset($row['birthday']) ? $row['birthday'] : '' ?>">

            <label for="age" class="form-label">อายุ</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= isset($row['age']) ? $row['age'] : '' ?>">

            <label for="status" class="form-label">สถานะภาพ</label>
            <select id="status" name="status" required>
                <option value="single">โสด</option>
                <option value="married">แต่งงาน</option>
                <option value="divorced">หย่าร้าง</option>

            <label for="address" class="form-label">ที่อยู่</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= isset($row['address']) ? $row['address'] : '' ?>">

            <label for="occupation" class="form-label">อาชีพ</label>
            <input type="text" class="form-control" id="occupation" name="job" value="<?= isset($row['job']) ? $row['job'] : '' ?>">

            <label for="income" class="form-label">รายได้</label>
            <input type="number" class="form-control" id="income" name="income" value="<?= isset($row['income']) ? $row['income'] : '' ?>">

            <label for="tel" class="form-label">เบอร์โทร</label>
            <input type="text" class="form-control" id="tel" name="tel" value="<?= isset($row['tel']) ? $row['tel'] : '' ?>">

            <label for="email" class="form-label">อีเมล</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($row['email']) ? $row['email'] : '' ?>">

            <label for="password" class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= isset($row['password']) ? $row['password'] : '' ?>">

            <label for="password_h" class="form-label">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control" id="password_h" name="password_h" value="<?= isset($row['password_h']) ? $row['password_h'] : '' ?>">

            <button type="submit" name="update_disabled">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>

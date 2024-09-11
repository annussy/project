<?php 
  include 'C:\laragon\www\project\config\config.php';
  $disease_id = $_GET['disease_id'];
  $sql = "SELECT * FROM disease WHERE disease_id = $disease_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปเดตข้อมูลสุขภาพของผู้พิการ</title>
    <!-- ลิงก์ไฟล์ CSS ที่แยกออกมา -->
    <link rel="stylesheet" href=""> 
</head>

<body>
    <div class="container">
        <h2>แก้ไขข้อมูลสุขภาพของผู้พิการ</h2>

        <div class="content">
        <form action="update_disabled.php" method="post">
            <input type="hidden" name="disabled_id" value="<?= isset($row['disabled_id']) ? $row['disabled_id'] : '' ?>">


            <label for="name" class="form-label">ชื่อโรค</label>
            <input type="text" class="form-control" id="name" name="disabled_name" value="<?= isset($row['disabled_name']) ? $row['disabled_name'] : '' ?>">    

            <label for="weight" class="form-label">น้ำหนัก</label>
            <input type="text" class="form-control" id="weight" name="weight" value="<?= isset($row['weight']) ? $row['weight'] : '' ?>">

            <label for="height" class="form-label">ส่วนสูง</label>
            <input type="text" class="form-control" id="count" name="weight" value="<?= isset($row['height']) ? $row['height'] : '' ?>">

            <label for="disease_sugar" class="form-label">ระดับน้ำตาลในเลือด</label>
            <input type="text" class="form-control" id="disease_sugar" name="disease_sugar" value="<?= isset($row['disease_sugar']) ? $row['disease_sugar'] : '' ?>">

            <label for="disease_pressure" class="form-label">ชีพจร</label>
            <input type="text" class="form-control" id="disease_pressure" name="disease_pressure" value="<?= isset($row['disease_pressure']) ? $row['disease_pressure'] : '' ?>">

            <label for="disease_status" class="form-label">สถานะมีโรค</label>
            <input type="text" class="form-control" id="disease_status" name="disease_status" value="<?= isset($row['disease_status']) ? $row['disease_status'] : '' ?>">

            <button type="submit" name="update_disease">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>

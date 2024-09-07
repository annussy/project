<?php 
  include 'C:\laragon\www\project\config\config.php';
  $activity_id = $_GET['activity_id'];
  $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปเดตกิจกรรม</title>
    <!-- ลิงก์ไฟล์ CSS ที่แยกออกมา -->
    <link rel="stylesheet" href="../../../../public/css/admin/activity/edit.css"> 
</head>

<body>
    <div class="container">
        <h2>อัปเดตกิจกรรม</h2>

        <div class="content">
        <form action="update_activity.php" method="post">
            <input type="hidden" name="activity_id" value="<?= isset($row['activity_id']) ? $row['activity_id'] : '' ?>">

            <label for="name" class="form-label">ชื่อกิจกรรม</label>
            <input type="text" class="form-control" id="name" name="activity_name" value="<?= isset($row['activity_name']) ? $row['activity_name'] : '' ?>">

            <label for="location" class="form-label">สถานที่จัดกิจกรรม</label>
            <input type="text" class="form-control" id="location" name="activity_location" value="<?= isset($row['activity_location']) ? $row['activity_location'] : '' ?>">

            <label for="count" class="form-label">จำนวนรับ</label>
            <input type="text" class="form-control" id="count" name="activity_count" value="<?= isset($row['activity_count']) ? $row['activity_count'] : '' ?>">

            <label for="details" class="form-label">รายละเอียดกิจกรรม</label>
            <input type="text" class="form-control" id="details" name="details" value="<?= isset($row['details']) ? $row['details'] : '' ?>">

            <button type="submit" name="update_activity">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>

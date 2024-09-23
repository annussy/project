<?php 
  include 'C:\laragon\www\project\config\config.php';
  $ability_id = $_GET['ability_id'];
  $sql = "SELECT * FROM ability WHERE ability_id = $ability_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลความสามารถของผู้พิการ</title>
    <!-- ลิงก์ไฟล์ CSS ที่แยกออกมา -->
    <link rel="stylesheet" href=""> 
</head>

<body>
    <div class="container">
        <h2>แก้ไขข้อมูลความสามารถของผู้พิการ</h2>

        <div class="content">
        <form action="update_ability.php" method="post">
            <input type="hidden" name="ability_id" value="<?= isset($row['ability_id']) ? $row['ability_id'] : '' ?>">


            <label for="name" class="form-label">ชื่อความสามารถ</label>
            <input type="text" class="form-control" id="name" name="ability_name" value="<?= isset($row['ability_name']) ? $row['ability_name'] : '' ?>">    

           
            <button type="submit" name="update_ability">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>

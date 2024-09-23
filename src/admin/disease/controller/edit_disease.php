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
    <title>แก้ไขข้อมูลสุขภาพของผู้พิการ</title>
    <!-- ลิงก์ไฟล์ CSS ที่แยกออกมา -->
    <link rel="stylesheet" href=""> 
</head>

<body>
    <div class="container">
        <h2>แก้ไขข้อมูลสุขภาพของผู้พิการ</h2>

        <div class="content">
        <form action="update_disease.php" method="post">
            <input type="hidden" name="disease_id" value="<?= isset($row['disease_id']) ? $row['disease_id'] : '' ?>">


            <label for="name" class="form-label">ชื่อโรค</label>
            <input type="text" class="form-control" id="name" name="disease_name" value="<?= isset($row['disease_name']) ? $row['disease_name'] : '' ?>">    

           
            <button type="submit" name="update_disease">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>

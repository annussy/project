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
    <title>แก้ไขข้อมูลประเภทความพิการของผู้พิการ</title>
    <!-- ลิงก์ไฟล์ CSS ที่แยกออกมา -->
    <link rel="stylesheet" href="../../../../public/css/admin/disabilitype/edit_disabilitype.css"> 
</head>

<body>
    <div class="container">
        <h2>แก้ไขข้อมูลกิจกรรมของผู้พิการ</h2>

        <div class="content">
        <form action="update_disabilitype.php" method="post">
            <input type="hidden" name="disabilitype_id" value="<?= isset($row['disabilitype_id']) ? $row['disabilitype_id'] : '' ?>">

            <label for="name" class="form-label">ชื่อประเภทความพิการ</label>
            <input type="text" class="form-control" id="name" name="type_name" value="<?= isset($row['type_name']) ? $row['type_name'] : '' ?>">

            <label for="money" class="form-label">จำนวนเงินที่ได้รับ</label>     
            <input type="text" class="form-control" id="money" name="type_money" value="<?= isset($row['type_money']) ? $row['type_money'] : '' ?>">

            <button type="submit" name="update_disabilitype">แก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>
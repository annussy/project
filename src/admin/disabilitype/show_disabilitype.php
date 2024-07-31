<?php
include 'C:\laragon\www\project\config\config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- เพิ่มลิงก์ไปยังไฟล์ CSS ถ้ามี -->
    <script src="path/to/your/js/file.js"></script> <!-- เพิ่มลิงก์ไปยังไฟล์ JavaScript ถ้ามี -->
</head>
<body>
    <div class="container">    
        <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลประเภทความพิการ</div>
        <a href="create_disabilitype.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
        <table class="table table-striped table-hover mt-4">
            <tr>
                <th>ลำดับ</th>
                <th>ชือประเภทความพิการ</th>
                <th>จำนวนเงินรับเบี้ยความพิการ</th>
            </tr>
            
            <?php
                $sql = "SELECT * FROM disabilitype";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) { 
            ?>
            <tr>
                <td><?php echo $row['disabilitype_id']; ?></td>
                <td><?php echo $row['type_name']; ?></td>
                <td><?php echo $row['type_money']; ?></td>
            </tr>
            
            <?php 
                    } 
                } else {
                    echo "<tr><td colspan='3'>ไม่พบข้อมูล</td></tr>";
                }
                mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
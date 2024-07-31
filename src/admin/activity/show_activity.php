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
        <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลกิจกรรม</div>
        <a href="create_activity.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
        <table class="table table-striped table-hover mt-4">
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อกิจกรรม</th>
                <th>สถานที่</th>
                <th>จำนวนรับ</th>
                <th>รายละเอียดกิจกรรม</th>
            </tr>
            
            <?php
                $sql = "SELECT * FROM activity";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) { 
            ?>

            <tr>
                <td><?php echo $row['activity_id']; ?></td>
                <td><?php echo $row['activity_name']; ?></td>
                <td><?php echo $row['activity_location']; ?></td>
                <td><?php echo $row['activity_count']; ?></td>
                <td><?php echo $row['details']; ?></td>
            </tr>
            
            <?php 
                    } 
                } else {
                    echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
                }
                mysqli_close($conn);
            ?>

        </table>
    </div>
</body>
</html>

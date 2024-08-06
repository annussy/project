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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .alert {
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">    
        <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลโรคผู้พิการ</div>
        <a href="create_disease.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a>
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>โรคประจำตัว</th>
                    <th>ระดับน้ำตาลในเลือด</th>
                    <th>ชีพจร</th>         
                    <th>น้ำหนัก</th>
                    <th>ส่วนสูง</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM disease";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) { 
                ?>
                <tr>
                    <td><?php echo $row['disease_id']; ?></td>
                    <td><?php echo $row['disease_name']; ?></td>
                    <td><?php echo $row['disease_sugar']; ?></td>
                    <td><?php echo $row['disease_pressure']; ?></td>
                    <td><?php echo $row['weight']; ?></td>
                    <td><?php echo $row['height']; ?></td>
                    <td><a href="../controller/disease/update.php?id=<?php echo $row['disease_id']; ?>">แก้ไข</a></td>
                    <td><a href="../controller/disease/delete.php?id=<?php echo $row['disease_id']; ?>">ลบ</a></td>
                </tr>
                
                <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
                    }
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

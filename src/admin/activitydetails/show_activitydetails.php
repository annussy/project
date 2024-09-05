<?php
include 'C:\laragon\www\project\config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
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
    <body>
        
        <div class="container">    
            <div class="alert alert-success h4 text-center mt-4" role="alert">รายละเอียดกิจกรรม</div>
                <!-- <a href="create_activity.php"><button type="" class="btn btn-success">เพิ่มข้อมูล</button></a> -->
                    <table class="table table-striped table-hover mt-4">
                        <tr>
                            <th>รหัสกิจกรรม</th>
                            <th>ชื่อกิจกรรม</th>
                            <th>รหัสผู้พิการ</th>
                            <th>ชื่อผู้พิการ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                        
                        <?php
                            $sql = "SELECT  activity.activity_id , activity.activity_name , disabled.disabled_id , disabled.disabled_name  FROM activity JOIN disabled ON activity.activity_id = activity.activity_name = disabled.disabled_id = disabled.disabled_name ";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){ 
                        ?>

                        <tr>
                            <!-- <td></td>?php echo $row['activitydetails_id']; ?></td> -->
                            <td><?php echo $row['activity_id']; ?></td>
                            <td><?php echo $row['activity_name']; ?></td>
                            <td><?php echo $row['disabled_id']; ?></td>
                            <td><?php echo $row['disabled_name']; ?></td>
                            <!-- <td><a href=""=<?=$row['material_id']?>" class="btn btn-warning">Edit</a></td>
                            <td><a href=""=<?=$row['material_id']?>" class="btn btn-danger" onclick="Del(this.href);return false;">Delete</a></td> -->
                        </tr>
                        
                        <?php 
                            } mysqli_close($conn);
                        ?>

                    </table>
        </div>
    </body>
</html>

<script language="Javascript">
    function Del(mypage){
        var agree=confirm("คุณต้องการลบข้อมูลนี้ใช่หรือไม่?");
        if(agree){
            window.location = mypage;
        }
    }
</script>
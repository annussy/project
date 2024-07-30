<?php
include 'config.php';
$sql = "SELECT * FROM disabled";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ</title>
</head>
<body>
    <h2>ข้อมูลผู้พิการ</h2>
    <a href="create.php">เพิ่มข้อมูล</a>
    <table border="1">
        <tr>
            <th>ชื่อ</th>
            <th>บัตรประชาชน</th>
            <th>วันเกิด</th>
            <th>อายุ</th>
            <th>สถานะ</th>
            <th>ที่อยู่</th>
            <th>อาชีพ</th>
            <th>รายได้</th>
            <th>เบอร์โทร</th>
            <th>อีเมล</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['disabled_name']; ?></td>
            <td><?php echo $row['disabled_card']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['job']; ?></td>
            <td><?php echo $row['income']; ?></td>
            <td><?php echo $row['tel']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a href="update.php?id=<?php echo $row['disabled_id']; ?>">แก้ไข</a></td>
            <td><a href="delete.php?id=<?php echo $row['disabled_id']; ?>">ลบ</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

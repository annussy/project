<?php
include 'C:\laragon\www\project\config\config.php';

$activity = null;

if (isset($_GET['activity_id'])) {
    $id = $_GET['activity_id'];
    $sql = "SELECT * FROM activity WHERE activity_id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $activity = mysqli_fetch_array($result);
    } else {
        // ถ้าไม่พบข้อมูลให้เปลี่ยนเส้นทางไปที่หน้าอื่น
        header("Location: index.php");
        exit();
    }
}

if (isset($_POST['update_activity'])) {
    $id = $_POST['activity_id'];
    $name = $_POST['activity_name'];
    $location = $_POST['activity_location'];
    $count = $_POST['activity_count'];
    $details = $_POST['details'];
    
    // ตรวจสอบว่า id ที่ส่งมาถูกต้องหรือไม่
    if (!empty($id) && !empty($name) && !empty($location) && !empty($count) && !empty($details)) {
        $update_sql = "UPDATE activity SET activity_name='$activity_name', activity_location='$activity_location', activity_count='$activity_count', details='$details' WHERE activity_id='$id'";
        mysqli_query($conn, $update_sql);
        header("Location: index.php");
        exit();
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปเดตกิจกรรม</title>
    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>อัปเดตกิจกรรม</h2>
        <form action="" method="post">
            <input type="hidden" name="activity_id" value="<?php echo $activity['activity_id'] ?? ''; ?>">
            <div class="form-group">
                <label for="name">ชื่อกิจกรรม :</label>
                <input type="text" id="name" name="activity_name" value="<?php echo $activity['activity_name'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="location">สถานที่จัดกิจกรรม :</label>
                <input type="text" id="location" name="activity_location" value="<?php echo $activity['activity_location'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="count">จำนวนรับ :</label>
                <input type="text" id="count" name="activity_count" value="<?php echo $activity['activity_count'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="details">รายละเอียดกิจกรรม :</label>
                <input type="text" id="details" name="details" value="<?php echo $activity['details'] ?? ''; ?>" required>
            </div>
            <button type="submit" name="update_activity">อัปเดตข้อมูล</button>
        </form>
    </div>
</body>
</html>

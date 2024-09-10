<?php
// เริ่ม session ถ้ายังไม่ได้เริ่ม
session_start();

// เชื่อมต่อฐานข้อมูล
include 'C:\laragon\www\project\config\config.php';

// ตรวจสอบว่ามีการส่ง activity_id มาหรือไม่
if (isset($_GET['activity_id'])) {
    $activity_id = $_GET['activity_id'];

    // SQL เพื่อดึงข้อมูลกิจกรรม
    $sql = "SELECT activity_name, details FROM activity WHERE activity_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id); // ใช้ activity_id เป็นเงื่อนไข
    $stmt->execute();
    $result = $stmt->get_result();

    // ตรวจสอบว่าพบข้อมูลกิจกรรมหรือไม่
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $activity_name = $row['activity_name'];
        $details = $row['details'];
    } else {
        echo "ไม่พบข้อมูลกิจกรรม";
        exit();
    }

    $stmt->close();
} else {
    echo "ไม่มีการส่ง activity_id";  
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/activity/create.css">
</head>
<body>
    <div class="container">
        <div class="right-section">
            <h2>แก้ไขกิจกรรมผู้พิการ</h2>
            <form action="../controller/admin/activity/update_activity.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อกิจกรรม :</label>
                    <input type="text" id="name" name="activity_name" value="<?php echo $activity_name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="location">รายละเอียดกิจกรรม :</label>
                    <input type="text" id="location" name="details" value="<?php echo $details; ?>" required>
                </div>
                <input type="hidden" name="activity_id" value="<?php echo $activity_id; ?>"> <!-- ส่ง activity_id กลับไปด้วย -->
                <button type="submit">ยืนยันการสมัคร</button>
            </form>
        </div>
    </div>
</body>
</html>

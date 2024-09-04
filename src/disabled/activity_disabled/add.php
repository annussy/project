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
        <!--<div class="left-section">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
        </div> -->
        <div class="right-section">
            <h2>กิจกรรมผู้พิการ</h2>
            <form action="../controller/admin/activity/insert_activity.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อกิจกรรม :</label>
                    <input type="text" id="name" name="activity_name" required>
                </div>
                <div class="form-group">
                    <label for="card">รายละเอียดกิจกรรม :</label>
                    <input type="text" id="location" name="activity_location" required>
                </div>
                <button type="submit" href="insert_activity.php">ยืนยันการสมัคร</button> <!--บันทึกข้อมูลเข้าฐานข้อมูล-->
            </form>
        </div>
    </div>
</body>
</html> 

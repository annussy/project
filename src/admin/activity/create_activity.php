<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
        <!--<div class="left-section">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
        </div>-->
        <div class="right-section">
            <h2>กิจกรรมผู้พิการ</h2>
            <form action="../controller/activity/insert_activity.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อกิจกรรม :</label>
                    <input type="text" id="name" name="activity_name" required>
                </div>
                <div class="form-group">
                    <label for="card">สถานที่จัดกิจกรรม :</label>
                    <input type="text" id="location" name="activity_location" required>
                </div>
                <div class="form-group">
                    <label for="tel">จำนวนรับ :</label>
                    <input type="text" id="count" name="activity_count" required>
                </div>
                <div class="form-group">
                    <label for="email">รายละเอียดกิจกรรม :</label>
                    <input type="text" id="details" name="details" required>
                </div>
                <button type="submit" href="insert_activity.php">เพิ่มข้อมูล</button>
            </form>
        </div>
    </div>
</body>
</html>

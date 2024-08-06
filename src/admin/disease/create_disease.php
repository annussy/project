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
        </div>-->
        <div class="right-section">
            <h2>โรคผู้พิการ</h2>
            <form action="../controller/admin/disease/insert_disease.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อโรค :</label>
                    <input type="text" id="name" name="disease_name" required>
                </div>
                
                <button type="submit" href="insert_activity.php">เพิ่มข้อมูล</button>
            </form>
        </div>
    </div>
</body>
</html>

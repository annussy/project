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
            <h2>ข้อมูลประเภทความพิการ</h2>
            <form action="../controller/disabilitype/insert_disabilitype.php" method="post">
                <div class="form-group">
                    <label for="name">ประเภทความพิการ :</label>
                    <input type="text" id="name" name="type_name" required>
                </div>
                <div class="form-group">
                    <label for="money">จำนวนเงินรับเบี้ยความพิการ :</label>
                    <input type="text" id="money" name="type_money" required>
                </div>
                <button type="submit" href="insert_disabilitype.php">เพิ่มข้อมูล</button>
            </form>
        </div>
    </div>
</body>
</html>


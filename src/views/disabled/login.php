<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/disabled/login.css">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
        </div>
        <div class="right-section">
            <h2>ยินดีต้อนรับ เข้าใช้งานผู้พิการ</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">อีเมล :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">รหัสผ่าน :</label>
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password"></span>
                </div>
                <button type="submit">เข้าสู่ระบบ</button>
            </form>
            <a href="#" class="forgot-password">ลืมรหัสผ่าน?</a>
        </div>
        <button class="back-btn" onclick="goBack()">ย้อนกลับ</button>
        <!--<img src="ผพก.jpg" alt="Officer" class="officer-image">-->
    </div>

    <script src="script.js"></script>
    <script>
        function goBack() {
            window.location.href = "form_disabled.php";
        }
    </script>
</body>
</html>

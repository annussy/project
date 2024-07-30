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
            <h2>ลงทะเบียนเข้าสู่ระบบ</h2>
            <form action="signup_disabled.php" method="post">
                <div class="form-group">
                    <label for="name">ชื่อ-สกุล :</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="card">เลขบัตรประจำตัวประชาชน :</label>
                    <input type="text" id="card" name="card" required>
                </div>
                <div class="form-group">
                    <label for="tel">เบอร์โทรติดต่อ :</label>
                    <input type="tel" id="tel" name="tel" required>
                </div>
                <div class="form-group">
                    <label for="email">อีเมล :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">รหัสผ่าน :</label>
                    <input type="password" id="password" name="password" required>
                    <!--<span class="toggle-password" onclick="togglePassword('password')">👁️</span>-->
                </div>
                <div class="form-group">
                    <label for="password_h">ยืนยันรหัสผ่าน :</label>
                    <input type="password" id="password_h" name="password_h" required>
                    <!--<span class="toggle-password" onclick="togglePassword('password_h')">👁️</span>-->
                </div>
                <button type="submit">ลงทะเบียน</button>
            </form>
        </div>
        <button class="back-btn" onclick="goBack()">ย้อนกลับ</button>
        <!--<img src="ผพก.jpg" alt="Officer" class="officer-image">-->
    </div>

    <script>
        function goBack() {
            window.location.href = "form_disabled.php";
        }

        function togglePassword(fieldId) {
            var passwordInput = document.getElementById(fieldId);
            var passwordToggle = passwordInput.nextElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.textContent = 'ปิด';
            } else {
                passwordInput.type = 'password';
                passwordToggle.textContent = 'เปิด';
            }
        }
    </script>
</body>
</html>

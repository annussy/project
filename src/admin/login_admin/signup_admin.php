<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/login_admin/signup.css">
</head>
<body>
    <div class="container">
        <div class="right-section">
            <h2>ลงทะเบียนเข้าสู่ระบบพนักงาน</h2>
            <form action="controller/insert_admin.php" method="post">
                
                <div class="form-group">
                    <label for="name">ชื่อ-สกุล :</label>
                    <input type="text" id="employee_name" name="employee_name" required>
                </div>

                <div class="form-group">
                    <label for="card">ตำแหน่งงาน :</label>
                    <input type="text" id="employee_department" name="employee_department" required>
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
                </div>

                <div class="form-group">
                    <label for="password_h">ยืนยันรหัสผ่าน :</label>
                    <input type="password_h"1234 id="password_h" name="password_h" required>
                </div>

                <button type="submit">ลงทะเบียน</button>
            </form>
        </div>
    </div>
</body>
</html>

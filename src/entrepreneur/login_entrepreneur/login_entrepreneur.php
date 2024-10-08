<?php
session_start();
// เชื่อมต่อฐานข้อมูล
include 'C:\laragon\www\project\config\config.php';

// ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลผู้ใช้
    $sql = "SELECT * FROM entrepreneur WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // ดึงข้อมูลผู้ใช้
        $_SESSION['entrepreneur_id'] = $row['entrepreneur_id']; // เก็บ session สำหรับพนักงาน

        // ข้อมูลถูกต้อง ส่งกลับไปหน้าแรก
        header("Location: ../need/form_need.php");  //ส่งกลับไปหน้าแรก-home
        exit();
    } else {
        $error_message = "มีอีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้ประกอบการ</title>
    <link rel="stylesheet" href="../../../public/css/entrepreneur/login_entrepreneur.css">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
        </div>
        <div class="right-section">
            <h2>ยินดีต้อนรับ เข้าใช้งานผู้ประกอบการ</h2>
            <form id="loginForm" method="post">
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
                <?php if (isset($error_message)): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
            </form>
            
            <a href="signup_entrepreneur.php" class="register-button">สมัครสมาชิก</a>
        </div>
    </div>
</body>
</html>

<?php
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login_disabled.php");
    exit();
}

// ตรวจสอบว่าเป็น disabled หรือไม่
if ($_SESSION['role'] !== 'disabled') {
    echo "You do not have permission to view this page.";
    exit();
}
?>

<div class="topbar"> 
    <ul>
        <li>
            <a href="/project/src/disabled/disabled_home.php"></a>
        </li>
    </ul>
    
    <div class="user">
        <p>Welcome K.<?php echo $_SESSION['username']; ?></p>
    </div>

    <div class="logout">
        <a href="/project/src/logout.php">
            <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>  
            </span>          
        </a>
    </div>
</div>
<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['employee_id'])) {
    // ถ้าไม่ได้เข้าสู่ระบบ ให้นำไปหน้าเข้าสู่ระบบ
    header("Location: ../login_admin/login_admin.php");
    exit();
}
// ดึง ID ผู้ใช้จากเซสชัน
$employee_id = $_SESSION['employee_id'];

// ดึงข้อมูลจากตาราง disabled
$sql_disabled = "SELECT disabled_id, disabled_name FROM disabled";
$result_disabled = mysqli_query($conn, $sql_disabled);

// ดึงข้อมูลจากตาราง disabilitype
$sql_disabilitype = "SELECT disabilitype_id, type_name FROM disabilitype";
$result_disabilitype = mysqli_query($conn, $sql_disabilitype);

// ดึงชื่อพนักงานจาก session
$employee_name = $_SESSION['employee_name'] ?? 'พนักงาน'; // กำหนดค่าปริยายถ้าชื่อไม่อยู่ในเซสชัน
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/money/form_money.css"> <!-- เพิ่มลิงก์ไปยังไฟล์ CSS ถ้ามี -->
</head>
<body>
<div class="sidebar">
    <img src="logo.jpg" alt="CARE Logo" class="logo">
    <ul class="nav">
        <li>
            <a href="">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">หน้าแรก</span>
            </a>
        </li>

        <li>
            <a href="../disabled/show_disabled.php"> <!-- ยังต้องเพิ่ม -->
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลผู้พิการ</span>
            </a>
        </li>
        <li>
            <a href="../activity/show_activity.php">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลกิจกรรมผู้พิการ</span>
            </a>
        </li>

        <li>
            <a href="">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลรับเบี้ยผู้พิการ</span>
            </a>
        </li>

        <li>
            <a href="../disabilitype/show_disabilitype.php">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ประเภทความพิการ</span>  <!-- ยังไม่เพิ่ม -->
            </a>
        </li>

        <li>
            <a href="../ability/show_ability.php">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลความสามารถผู้พิการ</span>
            </a>
        </li>

        <li>
            <a href="">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลแบบประเมินผู้พิการ</span>
            </a>
        </li>

        <li>
            <a href="../disease/show_disease.php">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลโรคประจำตัวผู้พิการ</span>
            </a>
        </li>

        <li>
            <a href="../entrepreneur/show_entrepreneur.php">
                <span class="icon">
                    <ion-icon name="storefront-outline"></ion-icon>
                </span>
                <span class="title">ข้อมูลผู้ประกอบการ</span>
            </a>
        </li>

        <li><a href="../login_admin/logout_admin.php">ออกจากระบบ</a></li>
    </ul>
</div>
<div class="container">    
    <div class="main-content">
        <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลการชำระเงิน</div>
       
        <form action="process_payment.php" method="post">
      
            <!-- ฟิลด์สำหรับเลือกวันที่ชำระเงิน -->
            <div class="form-group">
                <label for="payment_date">วันที่ชำระเงิน:</label>
                <input type="date" id="payment_date" name="payment_date" required>
            </div>

            <!-- ฟิลด์สำหรับเลือกผู้ชำระเงินจากตาราง disabled -->
            <div class="form-group">
                <label for="disabled_id">ชื่อผู้พิการ:</label>
                <select id="disabled_id" name="disabled_id" required>
                    <option value="">-- เลือกผู้ชำระเงิน --</option>
                    <?php
                    if (mysqli_num_rows($result_disabled) > 0) {
                        while($row = mysqli_fetch_assoc($result_disabled)) {
                            echo "<option value='" . $row['disabled_id'] . "'>" . $row['disabled_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>ไม่มีข้อมูล</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- ฟิลด์สำหรับเลือกประเภทการชำระเงินจากตาราง disabilitype -->
            <div class="form-group">
                <label for="disabilitype_id">ประเภทความพิการ:</label>
                <select id="disabilitype_id" name="disabilitype_id" required>
                    <option value="">-- เลือกประเภทความพิการ --</option>
                    <?php
                    if (mysqli_num_rows($result_disabilitype) > 0) {
                        while($row = mysqli_fetch_assoc($result_disabilitype)) {
                            echo "<option value='" . $row['disabilitype_id'] . "'>" . $row['type_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>ไม่มีข้อมูล</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- ฟิลด์สำหรับป้อนจำนวนเงิน -->
            <div class="form-group">
                <label for="amount">จำนวนเงิน (บาท):</label>
                <input type="number" id="amount" name="amount" required min="1" step="0.01" placeholder="ใส่จำนวนเงิน">
            </div>


            <div class="form-group">
                <label for="employee_name">ชำระโดย:</label>
                <input type="text" id="employee_name" name="employee_name" value="<?php echo isset($_SESSION['employee_name']) ? htmlspecialchars($_SESSION['employee_name']) : ''; ?>" readonly>
            </div>


            <!-- ปุ่มยืนยันการชำระเงิน -->
            <button type="submit">ยืนยันการชำระเงิน</button>
        </form>
    </div>
</div>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

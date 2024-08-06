<?php
include 'C:\laragon\www\project\config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/disabled/disease/form_disease.css"> <!-- แก้ไข path ให้ตรงกับที่เก็บไฟล์ CSS ของคุณ -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="logo.jpg" alt="CARE Logo" class="logo">
            <ul class="nav">
                <li><a href="#">หน้าแรก</a></li>
                <li><a href="#">ลงทะเบียนข้อมูลเบี้ยผู้พิการ</a></li>
                <li><a href="#">ลงทะเบียนข้อมูลกิจกรรม</a></li>
                <li><a href="#">ข้อมูลความสามารถ</a></li>
                <li><a href="#">แบบประเมินการใช้ชีวิต</a></li>
                <li><a href="#" class="active">ข้อมูลสุขภาพ</a></li>
                <li><a href="#">ออกจากระบบ</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <div class="title">ข้อมูลสุขภาพผู้พิการ</div>
            </div>

            <h5>**กรุณากรอกข้อมูลให้ครบถ้วน**</h5>

            <form action="../../admin/controller/admin/disease/insert_disease.php" method="post"> 
                <div class="form-group">
                    <label for="weight">น้ำหนัก :</label>
                    <input type="text" id="weight" name="weight" required>
                </div>

                <div class="form-group">
                    <label for="height">ส่วนสูง :</label>
                    <input type="text" id="height" name="height" required>
                </div>

                <div class="form-group">
                    <label for="sugar-level">ระดับน้ำตาลในเลือด :</label>
                    <input type="text" id="sugar-level" name="disease_sugar" required>
                </div>

                <div class="form-group">
                    <label for="pulse">ชีพจร :</label>
                    <input type="text" id="pulse" name="disease_pressure" required>
                </div>

                <div class="form-group">
                    <label>มีโรคประจำตัวหรือไม่ :</label>
                    <label class="radio-label">
                        <input type="radio" name="disease_status" value="มี" required> มี
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="disease_status" value="ไม่มี"> ไม่มี
                    </label>
                </div>

                <div class="form-group">
                    <label for="disease">โรคประจำตัว :</label>
                    <textarea id="disease" name="disease_name" required></textarea>
                </div>

                <button type="submit" class="back-btn">บันทึก</button>
            </form>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "form_disabled.php";
        }
    </script>
</body>
</html>

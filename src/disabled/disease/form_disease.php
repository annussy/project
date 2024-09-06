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

            <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">หน้าแรก</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
            </li>

            <li>
                    <a href="../activity_disabled/apply.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ลงทะเบียนข้อมูลกิจกรรม</span>
                    </a>
            </li>

            <li>
                    <a href="../activity_disabled/apply.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ลงทะเบียนรับเบี้ยผู้พิการ</span>
                    </a>
            </li>


            <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลความสามารถ</span>  <!-- ยังไม่เพิ่ม หน้า-home-->
                    </a>
            </li>


                <li>
                    <a href="../disease/form_disease.php">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">แบบประเมินการใช้ชีวิต</span>
                    </a>
                </li>


                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลสุขภาพ</span>  <!-- ยังไม่เพิ่ม -->
                    </a>
                </li>

                <li><a href="logout">ออกจากระบบ</a></li>

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
                    <label for="status">โรคประจำตัว :</label>
                    <div id="status">
                <label><input type="checkbox" name="disease_name[]" value="หูตึง/โรคหูอื่นๆ"> หูตึง/โรคหูอื่นๆ</label>
                <label><input type="checkbox" name="disease_name[]" value="ต้อหิน/ต้อกระจก/โรคตาอื่นๆ"> ต้อหิน/ต้อกระจก/โรคตาอื่นๆ</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคหัวใจ"> โรคหัวใจ</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคไตวายเรื้อรัง"> โรคไตวายเรื้อรัง</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคลำไส้อักเสบเรื้อรัง"> โรคลำไส้อักเสบเรื้อรัง</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคความดันโลหิตสูง"> โรคความดันโลหิตสูง</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคมะเร็งทุกระบบ"> โรคมะเร็งทุกระบบ</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคเกี่ยวกับทางเดินปัสสาวะ"> โรคเกี่ยวกับทางเดินปัสสาวะ</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคไต"> โรคไต</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคกระเพาะอาหาร"> โรคกระเพาะอาหาร</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคไบโพลาร์"> โรคไบโพลาร์</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคซึมเศร้า"> โรคซึมเศร้า</label>
                <label><input type="checkbox" name="disease_name[]" value="เส้นเลือดในสมองตีบหรือแตก"> เส้นเลือดในสมองตีบหรือแตก</label>
                <label><input type="checkbox" name="disease_name[]" value="สมองพิการ"> สมองพิการ</label>
                <label><input type="checkbox" name="disease_name[]" value="อัมพาตครึ่งซีก"> อัมพาตครึ่งซีก</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคต่อมไทรอยด์"> โรคต่อมไทรอยด์</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคตับ"> โรคตับ</label>
                <label><input type="checkbox" name="disease_name[]" value="โรคเก๊าท์/กระดูก"> โรคเก๊าท์/กระดูก</label>
                    </div>
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

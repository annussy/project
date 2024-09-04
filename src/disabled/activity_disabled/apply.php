<?php
include 'C:\laragon\www\project\config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมสำหรับผู้พิการ</title>
    <link rel="stylesheet" href="../../../public/css/disabled/activity/add.css">
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
                    <a href="">
                        <span class="icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">ข้อมูลความสามารถ</span>  <!-- ยังไม่เพิ่ม -->
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
                <div class="title">กิจกรรมสำหรับผู้พิการ</div>
                <div class="user-info">
                    <!-- <span>โพลพิส แสนสวย</span> -->
                </div>
            </div>
            <table class="activity-table">
                <thead>
                    <tr>
                        <th>ชื่อกิจกรรม</th>
                        <th>สถานที่จัด</th>
                        <th>จำนวนรับ</th>
                        <th>รายละเอียดกิจกรรม</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     // ดึงข้อมูลจากฐานข้อมูล
                     $sql = "SELECT activity_id, activity_name, activity_location, activity_count, details FROM activity";
                     $result = $conn->query($sql);
 
                     if ($result->num_rows > 0) {
                         // แสดงข้อมูลในตาราง
                         while($row = $result->fetch_assoc()) {
                             echo "<tr>";
                             echo "<td>" . $row["activity_name"] . "</td>";
                             echo "<td>" . $row["activity_location"] . "</td>";
                             echo "<td>" . $row["activity_count"] . "</td>";
                             echo "<td>" . $row["details"] . "</td>";
                             echo '<td> <a href="add.php" class="apply-button" onclick="applyForActivity(' . $row["activity_id"] . ')">สมัคร</a></td>';
                             echo "</tr>";
                         }
                     } else {
                         echo "<tr><td colspan='5'>ไม่มีข้อมูลกิจกรรม</td></tr>";
                     }
 
                     // ปิดการเชื่อมต่อ
                     $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function applyForActivity(activityId) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "apply_activity.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert(xhr.responseText);
                    location.reload(); // Reload the page to reflect changes
                }
            };
            xhr.send("activity_id=" + activityId + "&disabled_id=YOUR_DISABLED_USER_ID"); // Replace with actual disabled user ID
        }
    </script>
</body>
</html>
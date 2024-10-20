<?php
include 'C:\laragon\www\project\config\config.php';
session_start();

if (!isset($_SESSION['employee_id'])) {
    header("Location: ../login_admin/login_admin.php");
    exit();
}
$employee_id = $_SESSION['employee_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้พิการ ตำบลแค</title>
    <link rel="stylesheet" href="../../../public/css/admin/disabled/show.css">
    <style>
        /* Existing styles */
        .search-container {
            text-align: right;
            margin-bottom: 20px;
        }
        .search-container input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-container button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #45a049;
        }

        /* New styles for modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-info:hover {
            background-color: #117a8b;
        }
        .btn-warning {
            background-color: #ffc107;
            color: black;
        }
        .btn-warning:hover {
            background-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .btn-group {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>



    
<div class="sidebar">
        <img src="logo.jpg" alt="CARE Logo" class="logo">
        <ul class="nav">
        <li>
                <a href="../homepage/show_homepage.php">
                    <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </span>
                    <span class="title">หน้าแรก</span>
                </a>
            </li>

            <li>
                <a href="../disabled/show_disabled.php">
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
                <a href="../money/show_money.php">
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

                <li><a href="../login_admin/logout_admin.php">ออกจากระบบ</a></li>
        </ul>
    </div>
   

    

    <div class="main-content">
        <div class="container">
            <div class="alert alert-primary h4 text-center mt-4" role="alert">ข้อมูลผู้พิการ</div>
            <!-- <a href="create_disabled.php"><button type="button" class="btn btn-primary">เพิ่มข้อมูล</button></a> -->
            <div class="search-container">
                <form action="show_disabled.php" method="GET">
                    <input type="text" name="search" placeholder="ค้นหาชื่อผู้พิการ..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit">ค้นหา</button>
                </form>
            </div>
            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้พิการ</th>
                        <th>รายได้</th>
                        <th>เบอร์โทร</th>
                        <th>อีเมล</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    if (!empty($search)) {
                        $sql = "SELECT * FROM disabled WHERE disabled_name LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
                    } else {
                        $sql = "SELECT * FROM disabled";
                    }
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['disabled_id']; ?></td>
                        <td><?php echo $row['disabled_name']; ?></td>
                        <td><?php echo $row['income']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <div class="btn-group">
                                <button onclick="openModal(<?php echo $row['disabled_id']; ?>)" class="btn btn-info">รายละเอียด</button>
                                <a href="controller/edit_disabled.php?disabled_id=<?php echo $row['disabled_id']; ?>" class="btn btn-warning">แก้ไข</a>
                                <!-- <a href="controller/delete_disabled.php?disabled_id=<?php echo $row['disabled_id']; ?>" class="btn btn-danger" onclick="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้หรือไม่?');">ลบ</a> -->
                            </div>
                        </td>
                    </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='6'>ไม่พบข้อมูล</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>
</body>
<script>
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        function openModal(id) {
            fetch(`get_disabled_details.php?id=${id}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("modalContent").innerHTML = data;
                    modal.style.display = "block";
                });
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</html>

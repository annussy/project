<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกการเข้าสู่ระบบ</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary text-white">

<div class="container text-center mt-5">
    <h1>เลือกประเภทการเข้าสู่ระบบ</h1>
    <div class="row justify-content-center mt-4">
        <!-- ปุ่มเข้าสู่ระบบผู้พิการ -->
        <div class="col-md-3">
            <a href="disabled/login_disabled/login_disabled.php" class="btn btn-light btn-lg btn-block">ผู้พิการ</a>
        </div>
        <!-- ปุ่มเข้าสู่ระบบแอดมิน -->
        <div class="col-md-3">
            <a href="admin/login_admin/login_admin.php" class="btn btn-light btn-lg btn-block">แอดมิน</a>
        </div>
        <!-- ปุ่มเข้าสู่ระบบผู้ประกอบการ -->
        <div class="col-md-3">
            <a href="login_employer.php" class="btn btn-light btn-lg btn-block">ผู้ประกอบการ</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS และ jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

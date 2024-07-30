<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['disabled_name'];
    $card = $_POST['disabled_card'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $address = $_POST['address'];
    $job = $_POST['job'];
    $income = $_POST['income'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO disabled (disabled_name, disabled_card, birthday, age, status, address, job, income, tel, email)
            VALUES ('$name', '$card', '$birthday', '$age', '$status', '$address', '$job', '$income', '$tel', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "เพิ่มข้อมูลสำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มเพิ่มข้อมูลผู้พิการ</title>
</head>
<body>
    <h2>ฟอร์มเพิ่มข้อมูลผู้พิการ</h2>
    <form action="create.php" method="post">
        <label for="disabled_name">ชื่อ:</label>
        <input type="text" id="disabled_name" name="disabled_name" required>
        
        <label for="disabled_card">หมายเลขบัตรประชาชน:</label>
        <input type="text" id="disabled_card" name="disabled_card" maxlength="13" required>
        
        <label for="birthday">วันเกิด:</label>
        <input type="date" id="birthday" name="birthday" required>
        
        <label for="age">อายุ:</label>
        <input type="number" id="age" name="age" required>
        
        <label for="status">สถานะ:</label>
        <input type="text" id="status" name="status" required>
        
        <label for="address">ที่อยู่:</label>
        <input type="text" id="address" name="address" required>
        
        <label for="job">อาชีพ:</label>
        <input type="text" id="job" name="job" required>
        
        <label for="income">รายได้:</label>
        <input type="number" id="income" name="income" required>
        
        <label for="tel">เบอร์โทรศัพท์:</label>
        <input type="text" id="tel" name="tel" maxlength="10" required>
        
        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="email" required>
        
        <input type="submit" value="เพิ่มข้อมูล">
    </form>
</body>
</html>

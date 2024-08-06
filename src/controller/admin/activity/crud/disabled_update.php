<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM disabled WHERE disabled_id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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
    
    $sql = "UPDATE disabled SET 
            disabled_name='$name', 
            disabled_card='$card', 
            birthday='$birthday', 
            age='$age', 
            status='$status', 
            address='$address', 
            job='$job', 
            income='$income', 
            tel='$tel', 
            email='$email' 
            WHERE disabled_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "แก้ไขข้อมูลสำเร็จ";
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
    <title>ฟอร์มแก้ไขข้อมูลผู้พิการ</title>
</head>
<body>
    <h2>ฟอร์มแก้ไขข้อมูลผู้พิการ</h2>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <label for="disabled_name">ชื่อ:</label>
        <input type="text" id="disabled_name" name="disabled_name" value="<?php echo $row['disabled_name']; ?>" required>
        
        <label for="disabled_card">หมายเลขบัตรประชาชน:</label>
        <input type="text" id="disabled_card" name="disabled_card" maxlength="13" value="<?php echo $row['disabled_card']; ?>" required>
        
        <label for="birthday">วันเกิด:</label>
        <input type="date" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>" required>
        
        <label for="age">อายุ:</label>
        <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required>
        
        <label for="status">สถานะ:</label>
        <input type="text" id="status" name="status" value="<?php echo $row['status']; ?>" required>
        
        <label for="address">ที่อยู่:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required>
        
        <label for="job">อาชีพ:</label>
        <input type="text" id="job" name="job" value="<?php echo $row['job']; ?>" required>
        
        <label for="income">รายได้:</label>
        <input type="number" id="income" name="income" value="<?php echo $row['income']; ?>" required>
        
        <label for="tel">เบอร์โทรศัพท์:</label>
        <input type="text" id="tel" name="tel" maxlength="10" value="<?php echo $row['tel']; ?>" required>
        
        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        
        <input type="submit" value="แก้ไขข้อมูล">
    </form>
</body>
</html>

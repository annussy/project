<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM disabled WHERE disabled_id=$id";

if ($conn->query($sql) === TRUE) {
    echo "ลบข้อมูลสำเร็จ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>

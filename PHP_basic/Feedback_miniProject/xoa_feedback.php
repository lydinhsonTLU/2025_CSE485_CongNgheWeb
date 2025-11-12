<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // tránh injection
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa feedback thành công!'); window.location='table_feedback.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa: " . $conn->error . "'); window.location='table_feedback.php';</script>";
    }
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root"; // tài khoản mặc định của XAMPP
$password = ""; // mật khẩu trống mặc định
$dbname = "feedback_php"; // tên CSDL bạn vừa tạo

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "✅ Kết nối thành công!";
?>

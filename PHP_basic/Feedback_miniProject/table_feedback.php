<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, feedback, date FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Feedback</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Header -->
<header class="bg-primary text-white py-4">
    <div class="container">
        <h1 class="mb-0">Quản Lý Feedback</h1>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-light">
            <h2 class="mb-0">Danh Sách Feedback</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Ngày</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["feedback"]) . "</td>";
                                    echo "<td>" . $row["date"] . "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<a href='sua_feedback.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm me-2'>Sửa</a>";
                                    echo "<a href='xoa_feedback.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Bạn có chắc muốn xóa feedback này không?');\">Xóa</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }else {
                                echo "<tr><td colspan='5' class='text-center text-muted'>Chưa có phản hồi nào</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Tổng: <?php echo $result->num_rows ?> feedback</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Trước</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Sau</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php">Quay lại</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
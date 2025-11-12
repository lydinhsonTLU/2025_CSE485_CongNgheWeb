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

if (isset($_POST["submit"])) {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $feedback = $_POST["feedback"] ?? "";

    // ✅ Dùng prepared statement để tránh lỗi và SQL injection
    $stmt = $conn->prepare("INSERT INTO users (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);

    if ($stmt->execute()) {
        echo "<script>alert('Gửi feedback thành công!'); window.location='table_feedback.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi gửi feedback: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Feedback</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Header -->
<header class="bg-primary text-white py-4">
    <div class="container">
        <a class="btn btn-danger" href="table_feedback.php">Collections</a>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4">Gửi Feedback</h2>
                    <form id="feedbackForm" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="feedback" class="form-label">Feedback</label>
                            <textarea class="form-control" id="feedback" rows="5" name="feedback" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary w-100">Send</button>
                    </form>
                    <div id="message" class="alert alert-success mt-3 d-none"></div>
                </div>
            </div>
        </div>
    </div>
</main>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

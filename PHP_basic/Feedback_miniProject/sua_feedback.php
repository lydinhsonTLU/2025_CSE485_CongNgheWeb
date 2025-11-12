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
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $sql = "UPDATE users SET name='$name', email='$email', feedback='$feedback' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật thành công!'); window.location='table_feedback.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="mb-4">Sửa Feedback</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Feedback</label>
            <textarea class="form-control" name="feedback" rows="5" required><?= htmlspecialchars($row['feedback']) ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
        <a href="table_feedback.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>

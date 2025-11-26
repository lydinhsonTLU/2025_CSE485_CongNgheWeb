<?php
// Bước 1: Gọi file data.php chứa mảng dữ liệu (giả lập CSDL)
require 'data.php';

// Bước 2: Nhận thông báo thành công tạo mới qua phương thức GET (nếu có)
$success = $_GET['success'] ?? "";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản lý Đồ án</title>
    <!-- Thêm Bootstrap CSS qua CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Quản lý Đồ án Tốt nghiệp</a>
        <div>
            <a href="index.php" class="btn btn-outline-light me-2">Dashboard</a>
            <a href="create.php" class="btn btn-primary">+ Thêm đồ án</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <p class="text-muted">Dữ liệu trong ví dụ này đang được lưu cố định trong một mảng PHP (chưa dùng CSDL).</p>

    <!-- Bước 3: Hiển thị thông báo nếu có tham số ?success=created -->
    <?php if ($success == "created"): ?>
        <div class="alert alert-success">
            Giả lập: Thêm đồ án mới thành công! (thông báo thông qua tham số GET trong URL).
        </div>
    <?php endif; ?>

    <!-- Bước 4: Hiển thị bảng dữ liệu -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>Tên đề tài</th>
            <th>Sinh viên</th>
            <th>Mã sinh viên</th>
            <th>GV hướng dẫn</th>
            <th>Năm học</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($do_an_list)): ?>
            <?php foreach ($do_an_list as $index => $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']) ?></td>
                    <td><?= htmlspecialchars($item['ten_de_tai']) ?></td>
                    <td><?= htmlspecialchars($item['ten_sinh_vien']) ?></td>
                    <td><?= htmlspecialchars($item['mssv']) ?></td>
                    <td><?= htmlspecialchars($item['giang_vien_hd']) ?></td>
                    <td><?= htmlspecialchars($item['nam_hoc']) ?></td>
                    <td><?= htmlspecialchars($item['trang_thai']) ?></td>
                    <td><?= htmlspecialchars($item['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Chưa có đồ án nào trong mảng.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Thêm Bootstrap JS nếu cần -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Bước 1: Gọi file data.php chứa mảng dữ liệu (giả lập CSDL)
require '../ConnectDb.php';
$db = new Database();
$manager = new Manager($db);

$flowers = $manager->getAllFlowers();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa đẹp</title>
    <!-- Thêm Bootstrap CSS qua CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Quản lý Hoa</a>
        <div>
            <a href="index.php" class="btn btn-outline-light me-2">Quay lại</a>
            <a href="#" class="btn btn-primary">+ Thêm hoa</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    
    

    <!-- Bước 4: Hiển thị bảng dữ liệu -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>Tên Hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($flowers)): ?>
            <?php foreach ($flowers as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['ten_hoa']) ?></td>
                    <td><?= htmlspecialchars($item['mo_ta']) ?></td>
                    <td>
                        <img
                            src="<?= htmlspecialchars($item['anh']) ?>"
                            alt="<?= htmlspecialchars($item['ten_hoa']) ?>"
                            style="max-width:120px; max-height:100px;"
                        >
                    </td>
                    <td>
                        <a class="btn btn-primary">Sửa</a>
                        <a class="btn btn-outline-primary">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Chưa có hoa nào trong mảng.</td>
                </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Thêm Bootstrap JS nếu cần -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

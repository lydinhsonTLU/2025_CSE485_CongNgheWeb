<?php

// Tệp View CHỈ chứa HTML và logic hiển thị (echo, foreach)
// Tệp View KHÔNG chứa câu lệnh SQL
require_once "../controller/index.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
<form method="POST" action="index.php">
    <label for="ten_sinh_vien">Tên Sinh Viên:</label>
    <input type="text" id="ten_sinh_vien" name="ten_sinh_vien" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Thêm Sinh Viên">
</form>
<h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Tên Sinh Viên</th>
        <th>Email</th>
        <th>Ngày Tạo</th>
    </tr>
    <?php
    // TODO 4: Dùng vòng lặp foreach để duyệt qua biến $danh_sach_sv
    // (Biến $danh_sach_sv này sẽ được Controller truyền sang)
    // Gợi ý: foreach ($danh_sach_sv as $sv) { ... }
    if (!isset($danh_sach_sv)) {
        echo "<tr><td colspan='4'>Biến \$danh_sach_sv không tồn tại!</td></tr>";
    } elseif (empty($danh_sach_sv)) {
        echo "<tr><td colspan='4'>Không có dữ liệu sinh viên!</td></tr>";
    } else {
        foreach ($danh_sach_sv as $sv) {
            // TODO 5: In (echo) các dòng <tr> và <td> chứa dữ liệu $sv
            // Gợi ý: echo "<tr><td>" . htmlspecialchars($sv['id']) . "</td>...</tr>";
            echo "<tr>";
            echo "<td>" . htmlspecialchars($sv['id']) . "</td>";
            echo "<td>" . htmlspecialchars($sv['ten_sinh_vien']) . "</td>";
            echo "<td>" . htmlspecialchars($sv['email']) . "</td>";
            echo "<td>" . htmlspecialchars($sv['ngay_tao']) . "</td>";
            echo "</tr>";
        }
    }
    // Đóng vòng lặp
    ?>
</table>
</body>
</html>
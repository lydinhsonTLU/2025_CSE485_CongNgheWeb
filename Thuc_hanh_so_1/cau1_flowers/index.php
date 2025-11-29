<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chính</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        button {
            padding: 12px 24px;
            margin: 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Chọn trang bạn muốn truy cập</h2>

<!-- Nút dẫn tới trang 1 -->
<button onclick="window.location.href='guest.php'">Chế độ khách</button>

<!-- Nút dẫn tới trang 2 -->
<button onclick="window.location.href='admin.php'">Chế độ admin</button>
</body>
</html>

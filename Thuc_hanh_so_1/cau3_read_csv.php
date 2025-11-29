<?php
    require_once "ConnectDb.php";

    $db = new Database();
    $manager = new Manager($db);
    
    $accounts = $manager->getAllAccount();

?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách điểm danh</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Danh sách điểm danh lớp 65HTTT</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Lớp</th>
        <th>Email</th>
        <th>Khóa học</th>
    </tr>
    <?php foreach ($accounts as $u): ?>
        <tr>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['password']) ?></td>
            <td><?= htmlspecialchars($u['lastname']) ?></td>
            <td><?= htmlspecialchars($u['firstname']) ?></td>
            <td><?= htmlspecialchars($u['city']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['course']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

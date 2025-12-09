<?php
require_once "ConnectDb.php";
$db = new Database();
$manager = new Manager($db);

$quizs = $manager->getAllQuiz();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý câu hỏi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
<!--<h1>Quản lý câu hỏi</h1>-->

<!-- Form thêm user -->
<!--<h2>Thêm User</h2>-->
<!--<form method="POST">-->
<!--    <input type="text" name="name" placeholder="Tên" required>-->
<!--    <input type="email" name="email" placeholder="Email" required>-->
<!--    <button type="submit" name="create">Thêm</button>-->
<!--</form>-->

<!-- Bảng danh sách user -->
<h2>Danh sách câu hỏi</h2>
<table>
    <tr>
        <th>Câu hỏi</th>
        
    </tr>
    <?php foreach ($quizs as $u): ?>
        <tr>
            <td>
                <?= htmlspecialchars($u['question']) ?>
                <?= htmlspecialchars($u['option_a']) ?>
                <?= htmlspecialchars($u['option_b']) ?>
                <?= htmlspecialchars($u['option_c']) ?>
                <?= htmlspecialchars($u['option_d']) ?>
                <?= htmlspecialchars($u['answer']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

<?php
$db = 'cse485_php_mysql';
$user = 'root';
$password = '';
$host = '127.0.0.1';

if (isset($_POST['upload'])) {
    $file = $_FILES['csv']['tmp_name'];

    try {
        // Kết nối PDO
        $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8", "{$user}", "{$password}");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Chuẩn bị câu lệnh INSERT
        $stmt = $pdo->prepare("INSERT INTO th1_csv_accounts(username, password, lastname, firstname, city, email, course)
                               VALUES(:username, :password, :lastname, :firstname, :city, :email, :course)");

        if (($handle = fopen($file, "r")) !== FALSE) {
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row == 0) { // bỏ qua header
                    $row++;
                    continue;
                }

                // Gán dữ liệu từ CSV
                $stmt->execute([
                    ':username'  => $data[0],
                    ':password'  => $data[1],
                    ':lastname'  => $data[2],
                    ':firstname' => $data[3],
                    ':city'      => $data[4],
                    ':email'     => $data[5],
                    ':course'    => $data[6]
                ]);
            }
            fclose($handle);
            echo "Upload cau 3 và lưu dữ liệu thành công!";
        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối hoặc thực thi SQL: " . $e->getMessage();
    }
}

if (isset($_POST['upload_quiz'])) {
    $file = $_FILES['txt']['tmp_name'];

    try {
        // Kết nối PDO
        $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8", "{$user}", "{$password}");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Chuẩn bị câu lệnh INSERT
        $stmt = $pdo->prepare("INSERT INTO th1_quiz(question,option_a,option_b,option_c,option_d, answer)
                               VALUES(:question, :option_a, :option_b, :option_c, :option_d, :answer)");

        // Mở file .txt đã upload và đọc dòng theo dòng
        if (($handle = fopen($file, "r")) !== FALSE) {
            $row = 0;
            while (($line = fgets($handle)) !== FALSE) {
                $line = trim($line);
                if ($line === '') {
                    continue; // bỏ qua dòng rỗng
                }

                // tự động phát hiện dấu phân cách (| hoặc ,). Nếu cần thêm, mở rộng logic.
                if (strpos($line, '|') !== false) {
                    $fields = str_getcsv($line, '|');
                } else {
                    $fields = str_getcsv($line, ',');
                }

                // Nếu hàng đầu là header (chứa từ khoá như 'question' hoặc 'option'), bỏ qua
                if ($row == 0) {
                    $lower = strtolower(implode(' ', $fields));
                    if (strpos($lower, 'question') !== false || strpos($lower, 'option') !== false || strpos($lower, 'answer') !== false) {
                        $row++;
                        continue;
                    }
                }

                // Chuẩn hoá các trường, tránh notice khi thiếu cột
                $question = isset($fields[0]) ? trim($fields[0]) : '';
                $option_a = isset($fields[1]) ? trim($fields[1]) : '';
                $option_b = isset($fields[2]) ? trim($fields[2]) : '';
                $option_c = isset($fields[3]) ? trim($fields[3]) : '';
                $option_d = isset($fields[4]) ? trim($fields[4]) : '';
                $answer   = isset($fields[5]) ? trim($fields[5]) : '';

                // Thực thi insert (sử dụng prepared statement)
                $stmt->execute([
                    ':question' => $question,
                    ':option_a' => $option_a,
                    ':option_b' => $option_b,
                    ':option_c' => $option_c,
                    ':option_d' => $option_d,
                    ':answer'   => $answer,
                ]);

                $row++;
            }
            fclose($handle);
            echo "Upload cau 2 va luu du lieu thanh cong!";
        } else {
            echo "Không thể mở file đã upload.";
        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối hoặc thực thi SQL: " . $e->getMessage();
    }
}
?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="csv">
    <button type="submit" name="upload">Upload CSV</button>
</form>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="txt" accept=".txt">
    <button type="submit" name="upload_quiz">Upload TXT</button>
</form>

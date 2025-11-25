<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Thư mục chung
    $base_dir = "uploads/";

    // 1. kiểm tra lỗi upload
    if ($_FILES["myfile"]["error"] !== UPLOAD_ERR_OK) {
        die("Lỗi upload!");
    }

    // 2. kiểm MIME
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES["myfile"]["tmp_name"]);

    // 3. loại file được phép
    $allowed = [

        // ẢNH
        "image/jpeg" => "jpg",
        "image/png"  => "png",
        "image/gif"  => "gif",

        // TÀI LIỆU
        "application/pdf" => "pdf",
        "text/plain" => "txt",
        "application/msword" => "doc",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "docx",
        "application/vnd.ms-excel" => "xls",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" => "xlsx",
        "application/zip" => "zip"
    ];

    // Kiểm tra xem file có thuộc danh sách cho phép không
    if (!array_key_exists($mime, $allowed)) {
        die("File không hợp lệ hoặc không được hỗ trợ!");
    }

    // 4. Phân loại thư mục theo MIME
    if (strpos($mime, "image/") === 0) {
        $target_dir = $base_dir . "images/";
    } else {
        $target_dir = $base_dir . "files/";
    }

    // Tạo folder nếu chưa có
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // 5. Tạo tên file mới
    $new_name = uniqid() . "." . $allowed[$mime];

    // 6. Đường dẫn lưu
    $target_file = $target_dir . $new_name;

    // 7. Lưu file
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
        echo "Upload thành công!<br>";
        echo "File lưu tại: $target_file<br>";

        // Nếu là ảnh -> hiển thị ảnh luôn
        if (strpos($mime, "image/") === 0) {
            echo "<img src='$target_file' width='200'>";
        }

    } else {
        echo "Upload thất bại!";
    }
}
?>

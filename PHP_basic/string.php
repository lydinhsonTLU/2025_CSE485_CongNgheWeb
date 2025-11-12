<?php
$fullName = 'Ly Dinh Son';

echo strlen($fullName) . "\n";     //do dai chuoi

echo strrev($fullName) . "\n";      //dao nguoc chuoi

echo strtolower($fullName) . "\n";  // ghi thuong toan bo chuoi

echo strtoupper($fullName) . "\n";   //ghi hoa chuoi

echo str_replace(" ", "-", $fullName) . "\n";  //tim kiem " " va thay the bang "-"

if (str_starts_with($fullName, "Ly")) {                 //ktra chuoi co bat dau bang Ly
    echo "yes";
}

if (!str_ends_with($fullName, "Dinh")) {                 //ktra chuoi co ket thuc bang Dinh
    echo "No";
}

echo htmlspecialchars("<h1> html string </h1>");         //hien thi nguyen ban, ko bien dich code trong ( )


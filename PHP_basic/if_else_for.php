<?php

$age = 20;
if ($age >= 20) {
    echo "Ng gia \n";
}

$in4 = ($age < 20) ? "Less than 20" : "More than 20 \n";

//echo $in4;

//==========================for
for ($i=0; $i < 10; $i++) {
    echo $i." ";
}
echo "\n";


$count = 0;
while ($count < 10) {
    echo $count." ";
    $count++;
}

echo "\n";
$count1 = 8;
do {
    echo $count1." ";
    $count1++;
}while ($count1 < 10);


echo "\n";
$colors = ["red", "green", "blue", "yellow"];
foreach ($colors as $index => $color) {               //dung bien color duyet mang colors /       su dung index cua color
    echo "$index - $color \n";
}

$persons = [
    'fullname' => 'John Doe',
    'age' => 20,
    'gender' => 'male'
];

foreach ($persons as $key => $value) {
    echo "$key: $value \n";
}
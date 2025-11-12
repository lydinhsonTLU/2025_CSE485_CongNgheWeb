<?php
$some_numbers = [1,3,4,6];
$fruits = ['apple', 'banana', 'kiwi'];

//print_r($some_numbers);
//print_r($fruits);

$colors = [
    3 => "red",
    5 => "green",
    7 => 'blue'
];

//print_r($colors);
//echo $colors[7];

$student = [
    'fullname' => 'Son',
    'age' => 20,
    'email' => 'abc@.gmail.com'
];

//echo $student['fullname'];

$students = [
    [
        'fullname' => 'Son',
        'age' => 20,
        'email' => 'lds@.gmail.com'
    ],
    [
        'fullname' => 'Anh',
        'age' => 20,
        'email' => 'DNA@.gmail.com'
    ],
    [
        'fullname' => 'Giang',
        'age' => 27,
        'email' => 'Giang@.gmail.com'
    ]
];

//print_r($students[1]['email']);

if (empty($students)) {
    echo "There are no students";
}else {
    echo "Students have a ".count($students). " students";
}

phpinfo();


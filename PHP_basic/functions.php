<?php

$y = 22;

function hello($name)
{
    global $y;
    echo "y: $y \n";                      //phai de global y
    echo "Hello $name!";
}

//hello("son");

function sum($a = 0, $b = 0)   //neu ko truyen tham so thi mac dinh la 0
{
    return $a + $b;
}

//echo sum($y, $y);

$multiply = function ($a = 2, $b = 1) {    //ham vo danh
    return $a * $b;
};

//echo $multiply();

$substract = fn($a = 0, $b = 0) => $a- $b;          //arrow function
echo $substract();

//=========built-in
$name = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

$check = in_array('F', $name);    //ktra F co trong name hay ko
//echo $check ? "yes" : "no";

array_push($name,'K', 'y');      //them K vao cuoi name, sau do them y vao cuoi name
//print_r($name);

array_unshift($name, 'Z');              //them Z vao dau name
//print_r($name);

array_shift($name);     //xoa dau
array_pop($name);     //xoa cuoi

unset($name[3]);     //xoa phan so 3

$arr1 = [1,3,5];
$arr2 = [2,4,6];

$arr_merge = array_merge($arr1, $arr2);    //gop 2 arr

//print_r($arr_merge);

//$arr3 = [...$arr_merge];          //nhan ban arr (ko dung ddc PHP7.4

$keys = ['name','email','age'];
$values = ['Son','email@gmail.com',20];

$key_values_combine = array_combine($keys, $values);  //tao mang hon hop ---->dkien: 2 mang phai cung kich thuoc

//print_r($key_values_combine);

$numbers = range(1,10);   //tao mang [1,10]
//print_r($numbers);

$square_number = array_map(function ($num) {            //anh xa thanh 1 mang moi co size = numbers nhung gtri ptu gap doi
    return $num*2;
}, $numbers);

//print_r($square_number);

$filter_numbers = array_filter($numbers, fn($num) => $num %2==0);      //tao 1 mang co ptu khi loc numbers theo arrow function
//print_r($filter_numbers);




<?php

$argv;

$args = array_slice($argv, 1);

print_r($args);

$size = count($argv);

$args_big = implode(" ", $args);

$fullName = mb_convert_case($args_big, MB_CASE_TITLE, "UTF-8");

$fio_arr = [];

$fio_arr= explode(" ", $fullName);

$fio_set = [];

foreach($fio_arr as $arg) {
    $fio_set[] = mb_substr($arg, 0, 1, "UTF-8");  
}

$fio = implode('', $fio_set);

if($size > 3) {
    $fam = array_slice($fio_arr, 0, 2);
    $inc = array_splice($fio_set, -2, 2);
    $fam = implode(' ', $fam);
    $inc = implode('. ', $inc);
    $surnameAndInitials = "$fam $inc.";    
} else {
    $surnameAndInitials = $fio_arr[0] . " " . $fio_set[1] . ". " . $fio_set[2] . ".";
}

echo "Полное имя: '$fullName'" . PHP_EOL;
echo "Фамилия и инициалы: '$surnameAndInitials'" . PHP_EOL;
echo "Аббревиатура: '$fio'" . PHP_EOL;
<?php

$fam = 'иванов';
$name = 'петр';
$otch = 'алексеевич';

$args['Фамилия'] = $fam;
$args['Имя'] = $name;
$args['Отчество'] = $otch;

$args_big = implode(" ", $args);

$fullName = mb_convert_case($args_big, MB_CASE_TITLE, "UTF-8");

$fio_arr = [];

$fio_arr= explode(" ", $fullName);

$fio_set = [];

foreach($fio_arr as $arg) {
    $fio_set[] = mb_substr($arg, 0, 1, "UTF-8");  
}

$fio = $fio_set[0] . $fio_set[1] . $fio_set[2];

$surnameAndInitials = $fio_arr[0] . " " . $fio_set[1] . ". " . $fio_set[2] . ".";

echo "Полное имя: '$fullName'" . PHP_EOL;
echo "Фамилия и инициалы: '$surnameAndInitials'" . PHP_EOL;
echo "Аббревиатура: '$fio'" . PHP_EOL;
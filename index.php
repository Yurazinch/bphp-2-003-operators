<?php

$args = trim(fgets(STDIN));

$fullName = mb_convert_case($args, MB_CASE_TITLE, "UTF-8");

$fio_arr = [];

$fio_arr= explode(" ", $fullName);

$size = count($fio_arr);

$check = [];

foreach($fio_arr as $el) {
    if((is_numeric(trim($el)) === true) ||
    (is_bool(trim($el)) === true) ||
    (is_null(trim($el)) === true)) {
        $check[] = false;
    } else {
        $check[] = true;
    }
}

if(in_array(false, $check, true)) {
    fwrite(STDERR, "Фамилия, имя или отчество указаны неверно" . PHP_EOL);
} elseif($size < 3) {
    fwrite(STDERR, "Не указаны фамилия, имя или отчество" . PHP_EOL);
} else {

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

fwrite(STDOUT, "Полное имя: '$fullName'" . PHP_EOL);
fwrite(STDOUT, "Фамилия и инициалы: '$surnameAndInitials'" . PHP_EOL);
fwrite(STDOUT, "Аббревиатура: '$fio'" . PHP_EOL);
fwrite(STDOUT, "Done" . PHP_EOL);

}

?>
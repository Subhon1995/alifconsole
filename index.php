<?php
header("Content-type: text/html; charset=utf-8;");
echo "\n *************** Добро пожаловать ***************\n";

echo "\n *************** Нажмите 1 что бы вывести содержимое файла: ***************\n";
echo "\n *************** Нажмите 2 что бы добавить строку в файл: ***************\n";
echo "\n *************** Нажмите 3 что бы изменить строку в файл: ***************\n";
echo "\n *************** Нажмите 4 что бы удалить строку в файл: ***************\n";
echo "\n *************** Нажмите 5 что бы вычесть общую сумму: ***************\n";

$handle = fopen("php://stdin", "r+");
$no1 = fgets($handle);
if ($no1 == 1){
echo "\n *************** Все содержимое файла! ******************\n";
$file = file_get_contents('alif.txt');
echo iconv(mb_detect_encoding($file), "UTF-8", $file);
echo "\n *************** Все содержимое файла! ******************\n";

}
if ($no1 == 2){
$file = fopen('alif.txt', 'a');
echo "\n *************** Введите название и цены: ***************\n";
fwrite($file, fgets($handle));
fclose($file);
echo "\n *************** Файл добавлен! ******************\n";
$file = file_get_contents('alif.txt');
echo $file;
echo "\n *************** Файл добавлен! ******************\n";
}
if ($no1 == 3){
$file = file('alif.txt');
echo "\n *************** Введите название и цены для изменение: ***************\n";
$file[0] = fgets($handle);
file_put_contents('alif.txt', $file);
echo "\n *************** Успех файл изменен! ******************\n";

$file = file_get_contents('alif.txt');
echo $file;

echo "\n *************** Успех файл изменен! ******************\n";

}

if ($no1 == 4){
$file_out = file("alif.txt"); // Считываем весь файл в массив
$row_number = 0;    //номер строки которую удаляем

//удаляем записаную строчку
unset($file_out[$row_number]);
file_put_contents("alif.txt", implode("", $file_out));

echo "\n *************** Ураа файл удален! ******************\n";
$file = file_get_contents('alif.txt');
echo $file;
echo "\n *************** Ураа файл удален! ******************\n";

}
if ($no1 == 5){

    $file = file_get_contents('alif.txt');
    preg_match_all('!\d+!', $file, $numbers);
    $numbers['0'] = array_sum($numbers['0']);
    echo "****************************************\n";
    $file = file_get_contents('alif.txt');
    echo $file;
    foreach ($numbers as $row) {
        echo "*************** Общая сумма равна: *************** \n" .$row . " сомони\n";
    }

    echo "****************************************\n";

}

?>
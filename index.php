<?php
require ('functions.php');
require ('all_lots.php');
session_start();
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = strtotime('now');

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
// ...

$time_zone = date('Z'); 
$lot_time_remaining = date("H.i", ($tomorrow - $now - $time_zone));

$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

$data_page = get_template ('index', ['categories' => $categories, 'lots' => $lots, 'lot_time_remaining' => $lot_time_remaining ]);
$data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Главная', 'user_avatar' => $user_avatar ]);
print($data_layout);
?>

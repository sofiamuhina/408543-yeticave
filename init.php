<?php

$connect = mysqli_connect("localhost", "root", "","yeti");

if ($connect == false) {
    $error_con = mysqli_connect_error();
    $data_page = get_template ('error', ['error' => $error_con]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'title_page' => 'Ошибка сервера', 'user_avatar' => $user_avatar, 'class' => 'container']);
    print($data_layout);
    exit();
};

$categories = db_select($connect, 'SELECT * FROM categories');

$lots = db_select($connect, 'SELECT l.id FROM lots l JOIN categories c ON l.id_category = c.id WHERE time_close>?', ['time_close' => date('Y-m-d', time())]);


$users = db_select($connect, 'SELECT *  FROM users');
?>
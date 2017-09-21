<?php
$connect = mysqli_connect("localhost", "root", "","yeti");

if ($connect == false) {
    $error_con = mysqli_connect_error();
    $data_page = get_template ('error', ['error' => $error_con]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'title_page' => 'Ошибка сервера', 'user_avatar' => $user_avatar, 'class' => 'container']);
    print($data_layout);
    exit();
};


?>
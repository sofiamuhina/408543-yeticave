<?php
require ('functions.php');
require ('all_data.php');
session_start();

$data_page = get_template ('search', []);
$data_layout = get_template ('layout', ['content' => $data_page, 'title_page' => 'Поиск', 'user_avatar' => $user_avatar ]);
print($data_layout);
?>
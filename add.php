<?php
require ('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
}

$data_page = get_template ('add_lot', []);
$data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
print($data_layout);
?>
<?php
require('functions.php');
require ('all_data.php');
session_start();


if (isset($_COOKIE['bet'])) {
    $bet = $_COOKIE['bet'];
    $bet = json_decode($bet, true);
    $all_bets = [$bet['id'] => $bet];
};

$data_page = get_template ('user_lots', ['categories' => $categories, 'bets' => $all_bets, 'lots' => $lots ]);
$data_layout = get_template ('layout', ['content' => $data_page, 'title_page' => 'Мои ставки', 'user_avatar' => $user_avatar ]);
print($data_layout);
?>
<?php
require ('functions.php');
require ('all_data.php');
session_start();

foreach ($lots as $number_lot => $value) {
    $name_cookie = 'bet_' . $number_lot;
    if (isset($_COOKIE[$name_cookie])) {
        $bet = $_COOKIE['bet'];
        $bet = json_decode($bet, true);
        $get_bets = [
         ['id' => $bet['id'], 'cost' => $bet['cost'], 'time' => $bet['time']]
        ];
    };
};

$data_page = get_template ('user_lots', ['categories' => $categories, 'bets' => $get_bets, 'lots' => $lots ]);
$data_layout = get_template ('layout', ['content' => $data_page, 'title_page' => 'Мои ставки', 'user_avatar' => $user_avatar ]);
print($data_layout);
?>
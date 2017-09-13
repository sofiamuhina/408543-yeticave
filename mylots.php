<?php
require ('functions.php');
require ('all_data.php');
session_start();

foreach ($lots as $number_lot => $value) {
    $name_cookie = 'bet_' . $number_lot;
    if (isset($_COOKIE[$name_cookie])) {
        $bet = $_COOKIE[$name_cookie];
        $bet = json_decode($bet, true);
        $get_bets[] = $bet;
    };
};
if (isset($_SESSION['user'])) {
    $data_page = get_template ('user_lots', ['categories' => $categories, 'bets' => $get_bets, 'lots' => $lots ]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'title_page' => 'Мои ставки', 'user_avatar' => $user_avatar ]);
    print($data_layout);
}
else {
    http_response_code(403);
    header("Location: /pages/403.html");
};
?>
<?php
require ('functions.php');
require ('all_lots.php');
require ('all_bets.php');
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($lots[$id])) {
        $lot_item = $lots[$id];
    }
    else {
        http_response_code(404);
        header("Location: /pages/404.html");
    };
};

$data_page = get_template ('lot', ['bets' => $bets, 'lot_item' => $lot_item ]);
$data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => $lot_item['name'], 'user_avatar' => $user_avatar ]);
print($data_layout);
?>

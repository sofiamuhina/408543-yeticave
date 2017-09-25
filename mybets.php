<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
session_start();

$get_bets = [];
$get_bets = db_select($connect, 'SELECT * FROM bets JOIN lots ON id_lot = lots.id WHERE id_user = ?', ['id_user' => $_SESSION['user']['id']]);

if (isset($_SESSION['user'])) {
    $data_page = get_template ('user_lots', ['categories' => $categories, 'bets' => $get_bets, 'lots' => $lots ]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'title_page' => 'Мои ставки' ]);
    print($data_layout);
}
else {
    http_response_code(403);
    header("Location: /pages/403.html");
};
?>
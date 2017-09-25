<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
session_start();
$lot_item = [];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lot_item = db_select($connect, 'SELECT *  FROM lots WHERE id = ?', ['id' => $id]);
    $lot_item = $lot_item[0];
    foreach ($categories as $key => $value){
        if ($lot_item['id_category'] == $value['id']) {
            $lot_item['name_cat'] = $value['name_cat'];
        }
    };
    if ((!(isset($lot_item))) or ($lot_item['time_close'] < date('Y-m-d', time()))) {
        http_response_code(404);
        header("Location: /pages/404.html");
    };
    $bets = db_select($connect, 'SELECT name, time_set, price, id_lot FROM bets JOIN users ON id_user = users.id WHERE id_lot = ? ORDER BY price DESC', ['id_lot' => $id]);
}
else {
    header("Location: /search.php");
};

$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['cost'] >= ($lot_item['price_cur'] + $lot_item['bet_step'])) {
        $cost = $_POST['cost'];
        $time = date('Y-m-d', time());
        $id = $_GET['id'];
        $new_bet = db_insert($connect, 'bets', ['price' => $cost, 'time_set' => $time, 'id_user' => $_SESSION['user']['id'], 'id_lot' => $id ]);
        $update_price = db_query($connect, 'UPDATE lots SET price_cur = ? WHERE id = ?', ['price_cur' => $cost, 'id' => $id]);
        header("Location: /lot.php?id=" .$id );
    }
    else {
        $error = true;
    };
};

$bet_for_lot = db_select($connect, 'SELECT *  FROM bets WHERE id_lot = ? AND id_user = ?', ['id_lot' => $id, 'id_user' => $_SESSION['user']['id']]);
$bet_for_lot = $bet_for_lot[0];

$add_bet = false;
if ((isset($_SESSION['user'])) and !(isset($bet_for_lot)) and !($lot_item['id_creator'] == $_SESSION['user']['id'])) {
    $add_bet = true;
};

$data_page = get_template ('lot', ['bets' => $bets, 'lot_item' => $lot_item, 'id' =>$id, 'add_bet' => $add_bet, 'error' => $error, 'categories' => $categories]);
$data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'title_page' => $lot_item['name_lot'] ]);
print($data_layout);
?>

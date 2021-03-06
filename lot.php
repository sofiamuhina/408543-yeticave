<?php
require ('functions.php');
require ('all_data.php');
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
}
else header("Location: /search.php");

$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['cost'] > 1500) {
        $cost = $_POST['cost'];
        $time = strtotime('now');
        $id = $_GET['id'];
        $bet = ['id' => $id, 'cost' => $cost, 'time' => $time ];
        $bet = json_encode($bet);
        $tomorrow = strtotime('tomorrow midnight');
        $name = 'bet_' . $id;
        setcookie($name, $bet, $tomorrow, '/');
        header("Location: /mylots.php");
    }
    else $error = true;
};

$add_bet = false;
if ((isset($_SESSION['user'])) and !(isset($_COOKIE[$name = 'bet_' . $id]))) $add_bet = true;

$data_page = get_template ('lot', ['bets' => $bets, 'lot_item' => $lot_item, 'id' =>$id, 'add_bet' => $add_bet, 'error' => $error, 'categories' => $categories]);
$data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => $lot_item['name'], 'user_avatar' => $user_avatar ]);
print($data_layout);
?>

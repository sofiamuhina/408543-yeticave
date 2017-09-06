<?php
require ('functions.php');
require ('all_lots.php');

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

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

function time_bet($ts) {
    $now = strtotime('now');
    $difference_hours = ($now - $ts)/3600;
    if ($difference_hours > 24) {
        $time = date('d.m.y', $ts) . ' в ' . date('H.i', $ts);
    }
    else {
        if ($difference_hours < 1) {
            $time = date('i', ($now - $ts)) . ' минут назад';
        }
        else {
            $time_zone = date('Z'); 
            $time = date('G', ($now - $ts - $time_zone)) . ' часов назад';
        }
    }
    
    return $time;
};

$data_page = get_template ('lot', ['bets' => $bets, 'lot_item' => $lot_item ]);
$data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => $lot_item['name'], 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
print($data_layout);
?>

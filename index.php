<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
require ('getwinner.php');
require_once 'vendor/autoload.php';
session_start();

$pagination = '';
$page_cur = $_GET['page'] ?? 1;
$lot_on_page = 3;

$count_lot = count($lots);
$count_pages = ceil($count_lot/$lot_on_page);
$offset = ($page_cur - 1)*$lot_on_page;
$pages = range(1, $count_pages);

$choose_lots = db_select($connect, 'SELECT name_lot, price_start, price_cur, img, name_cat, time_close, l.id FROM lots l JOIN categories c ON l.id_category = c.id WHERE time_close>? LIMIT ? OFFSET ?', ['time_close' => date('Y-m-d', time()), 'limit' => $lot_on_page, 'offset' => $offset ]);

if ($count_pages > 1) {
    $pagination = get_template ('pagination', ['pages' => $pages, 'page_cur' => $page_cur]);
};
//print_r($lot_without_winner);
$data_page = get_template ('index', ['categories' => $categories, 'lots' => $choose_lots, 'pagination' => $pagination]);
$data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'title_page' => 'Главная', 'class' => 'container']);
print($data_layout);
?>

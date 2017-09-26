<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
require_once 'vendor/autoload.php';
session_start();

$search = [];
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = mysqli_real_escape_string($connect, $search );
    $search_lot = db_select($connect, "SELECT * FROM lots JOIN categories ON id_category = categories.id WHERE name_lot LIKE '%$search%' OR description LIKE '%$search%' ", []);
};

$data_page = get_template ('search', ['categories' => $categories, 'lots' => $search_lot, 'query' => $_GET['search']]);
$data_layout = get_template ('layout', ['content' => $data_page, 'title_page' => 'Поиск', 'categories' => $categories ]);
print($data_layout);
?>
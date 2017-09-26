<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
require_once 'vendor/autoload.php';
session_start();
$validate = false;
$file_url = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo'])) {
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $filename = $_FILES['photo']['name'];
            if (((mime_content_type($_FILES['photo']['tmp_name'])) == 'image/jpeg') or (mime_content_type($_FILES['photo']['tmp_name']) == 'image/png')) { 
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/img/'; 
                $file_url = '/img/' . $filename;
                move_uploaded_file($_FILES['photo']['tmp_name'], $file_path . $filename); 
            }
            else {
                $errors[] = 'photo';
            };
        }
        else {
            $errors[] = 'photo';
        };
    }
    else {
        $errors[] = 'photo';
    };
    
    foreach ($_POST as $key => $value) {
        if ($value == '') {
            $errors[] = $key;
        };
        if ((($key == 'lot-rate') or ($key == 'lot-step')) and ((preg_match('/[^0-9]/', $value)) or ($value <= 0))) {
            $errors[] = $key;
        };
        if (($key == 'lot-date') and !(valid_date($value))) {
            $errors[] = $key;
        };
    };
    if ( count($errors) == 0) {
        $validate = true;
        $name_lot = htmlspecialchars($_POST['lot-name']);
        $desc_lot = htmlspecialchars($_POST['message']);
        $date_close = date('Y-m-d', strtotime($_POST['lot-date']));
        $date_create = date('Y-m-d');
        
        foreach($categories as $key => $value) {
            if ($value['name_cat'] == $_POST['category']) {
                $id_category = $value['id'];
            };
        };
    };
};



if (isset($_SESSION['user'])) {
    if ($validate == true) {
        $new_lot = db_insert($connect, 'lots', ['name_lot' => $name_lot, 'description' => $desc_lot, 'price_start' => $_POST['lot-rate'], 'price_cur' => $_POST['lot-rate'], 'bet_step' =>$_POST['lot-step'], 'time_close' => $date_close, 'time_create' => $date_create, 'img' => $file_url, 'id_category' => $id_category, 'id_creator' => $_SESSION['user']['id']]);
        header("Location: /lot.php?id=" .$new_lot );
    }
    else {
        
        $data_page = get_template ('add_lot', ['errors' => $errors, 'categories' => $categories ]);
        $data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'title_page' => 'Добавить лот']);
        print($data_layout);
    };
}
else {
    http_response_code(403);
    header("Location: /pages/403.html");
};

?>
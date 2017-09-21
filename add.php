<?php
require ('functions.php');
require ('all_data.php');
require ('mysql_helper.php');
require ('init.php');
session_start();
$validate = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo'])) {
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $filename = $_FILES['photo']['name'];
            $file_type = finfo_file($finfo, $_FILES['photo']['tmp_name']);
            if ($file_type !== 'image/jpeg') { 
                $errors[] = 'photo';
            }
            else { 
                $file_path = $_SERVER['DOCUMENT_ROOT'] . '/img/'; 
                $file_url = '/img/' . $filename;
                move_uploaded_file($_FILES['photo']['tmp_name'], $file_path . $filename); 
            };
        };
    };
    
    foreach ($_POST as $key => $value) {
        if ($value == '') $errors[] = $key;
        if ((($key == 'lot-rate') or ($key == 'lot-step')) and ((preg_match('/[^0-9]/', $value)) or ($value <= 0))) $errors[] = $key;
        if (($key == 'lot-date') and !(valid_date($value))) $errors[] = $key;
    };
    if ( count($errors) == 0) {
        $validate = true;
        $name_lot = htmlspecialchars($_POST['lot-name']);
        $desc_lot = htmlspecialchars($_POST['message']);
    };
};



if (isset($_SESSION['user'])) {
    if ($validate == true) {
        $lot_item = ['name' => $name_lot, 'category' => $_POST['category'], 'price' => $_POST['lot-rate'], 'img' => 'img/' . $filename];
        $data_page = get_template ('lot', ['bets' => $bets, 'lot_item' => $lot_item, 'categories' => $categories ]);
        $data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот',  'user_avatar' => $user_avatar ]);
        print($data_layout);
    }
    else {
        $data_page = get_template ('add_lot', ['errors' => $errors, 'categories' => $categories ]);
        $data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'user_avatar' => $user_avatar ]);
        print($data_layout);
    };
}
else {
    http_response_code(403);
    header("Location: /pages/403.html");
};

?>
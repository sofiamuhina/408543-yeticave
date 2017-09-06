<?php
require ('functions.php');


if (isset($_FILES['photo'])) {
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $filename = $_FILES['photo']['name'];
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/img/'; 
        $file_url = '/img/' . $filename;
        move_uploaded_file($_FILES['photo']['tmp_name'], $file_path . $filename); 
    };
};

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        if ($value == '') $errors[] = $key;
        if ((($key == 'lot-rate') or ($key == 'lot-step')) and (preg_match('/[^0-9]/', $value))) $errors[] = $key;
    };
    if ( count($errors) == 0) {
        $lot_item = ['name' => $_POST['lot-name'], 'category' => $_POST['category'], 'price' => $_POST['lot-rate'], 'img' => 'img/' . $filename];
        $data_page = get_template ('lot', [ 'lot_item' => $lot_item ]);
        $data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
        print($data_layout);
    };  
};


function check_error ($errors, $name) {
    foreach ($errors as $key) {
        if ($key == $name) {
            $result = ' form__item--invalid';
        };
    };
    return $result;
};


$data_page = get_template ('add_lot', ['errors' => $errors ]);
$data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
print($data_layout);
?>
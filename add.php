<?php
require ('functions.php');
require ('all_bets.php');

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
        if ((($key == 'lot-rate') or ($key == 'lot-step')) and (preg_match('/[^0-9]/', $value))) $errors[] = $key;
    };
    if ( count($errors) == 0) $validate = true;
};



if (isset($_SESSION['user'])) {
    if ($validate == true) {
        $lot_item = ['name' => $_POST['lot-name'], 'category' => $_POST['category'], 'price' => $_POST['lot-rate'], 'img' => 'img/' . $filename];
        $data_page = get_template ('lot', ['bets' => $bets, 'lot_item' => $lot_item ]);
        $data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
        print($data_layout);
    }
    else {
        $data_page = get_template ('add_lot', ['errors' => $errors ]);
        $data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
        print($data_layout);
    };
}
else {
    http_response_code(403);
    header("Location: /login_user.php");
};

?>
<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
session_start();

$validate = false;
$file_url = '';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if (isset($_FILES['photo'])) {
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $filename = $_FILES['photo']['name'];
            if ((mime_content_type($_FILES['photo']['tmp_name'])) != 'image/jpeg') { 
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
        if ($value == '') {
            $errors[] = $key;
        };
        if (($key == 'email') and ((filter_var($value, FILTER_VALIDATE_EMAIL)) == false)) {
            $errors[] = $key;
        };
    };
    foreach ($users as $key => $value) {
        if ($value['mail'] == $_POST['email']) {
            $errors[] = 'email';
        };
    };
    if ( count($errors) == 0) {
        $validate = true;
        $name_user = htmlspecialchars($_POST['name']);
        $email_user = htmlspecialchars($_POST['email']);
        $pass_user = htmlspecialchars($_POST['password']);
        $pass_user = password_hash($pass_user, PASSWORD_DEFAULT);
        $contact = htmlspecialchars($_POST['message']);
        $date_create = date('Y-m-d');
    };
};


if ($validate == true) {
    $new_user = db_insert($connect, 'users', ['mail' => $email_user, 'name' => $name_user, 'pass_hash' => $pass_user, 'contacts' => $contact, 'time_add' => $date_create, 'avatar' => $file_url]);
    header("Location: /login_user.php");
}
else {
    $data_page = get_template ('sign_up', ['errors' => $errors, 'categories' => $categories]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'user_name' => $user_name, 'title_page' => 'Регистрация', 'user_avatar' => $user_avatar ]);
    print($data_layout);
};
?>
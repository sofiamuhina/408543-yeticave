<?php
require ('functions.php');
require ('mysql_helper.php');
require ('init.php');
require_once 'vendor/autoload.php';
session_start();
$verify = true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        if ($value == '') {
            $errors[] = $key;
        };
    };
    if (count($errors) == 0) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = verify_user ($email, $password, $users );
        if ($user != null) {
            $_SESSION['user'] = $user;
            header("Location: /index.php");
        }
        else {
            $verify = false;
        };
    };
};

if (isset($_SESSION['user']) and ($verify == true)) {
    header("Location: /index.php");
}
else {
    $data_page = get_template ('login', ['errors' => $errors, 'verify_user' => $verify, 'categories' => $categories ]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'categories' => $categories, 'title_page' => 'Вход']);
    print($data_layout);
};
?>
<?php
require ('functions.php');
require ('userdata.php');

$verify = true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        if ($value == '') $errors[] = $key;
    };
    if (count($errors) == 0) {
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = verify_user ($email, $password, ['users' => $users ]);
        if ($user != null) {
            $_SESSION['user'] = $user;
            header("Location: /index.php");
        }
        else $verify = false;
    };
};

if (isset($_SESSION['user']) and ($verify == true)) {
    header("Location: /index.php");
}
else {
    $data_page = get_template ('login', ['errors' => $errors, 'verify_user' => $verify ]);
    $data_layout = get_template ('layout', ['content' => $data_page, 'user_name' => $user_name, 'title_page' => 'Добавить лот', 'is_auth' => $is_auth, 'user_avatar' => $user_avatar ]);
    print($data_layout);
};
?>
<?php
function get_template ($path, $data_templates) {
    extract ($data_templates, EXTR_SKIP);
    $path = 'templates/' . $path . '.php';
    if (file_exists($path)) {
        ob_start();
        require ($path);
        $data_html = ob_get_clean();
    }
    else {
        $data_html = '';
    };
    return $data_html;
};

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

function check_error ($errors, $name) {
    foreach ($errors as $key) {
        if ($key == $name) {
            $result = ' form__item--invalid';
        };
    };
    return $result;
};

function verify_user ($email, $password, $users) {
    $result_user = null;
    foreach ($users as $user) {
        if ($email == $user['email']) {
            if (password_verify ($password, $user['password'])) {
                $result_user = $user['email'];
            };
        };
    };
    return $result_user;
};


?>
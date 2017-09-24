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
        };
    };
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
    $result_user = [];
    foreach ($users as $user) {
        if ($email == $user['mail']) {
            if (password_verify ($password, $user['pass_hash'])) {
                $result_user = $user;
            };
        };
    };
    return $result_user;
};

function choose_category ($category, $select_category) {
    $res_string = "value='" . $category . "'";
    if ($select_category == $category) $res_string = $res_string . ' selected';
    return $res_string;
};

function valid_date($date) {
    return (preg_match('/^(\\d{2})\\.(\\d{2})\\.(\\d{4})$/', $date, $m) and checkdate($m[2], $m[1], $m[3]));
};


function db_select($connect, $query, $values = [] ) {
    $sql_prepare = db_get_prepare_stmt ($connect, $query, $values);
    $get_data = [];
    if ($sql_prepare != false) {
        mysqli_stmt_execute($sql_prepare);
        $sql_res = mysqli_stmt_get_result($sql_prepare);
        mysqli_stmt_close($sql_prepare);
        while ($row = mysqli_fetch_array($sql_res, MYSQLI_ASSOC)) {
            $get_data[] = $row;
        };    
    };
    
    return $get_data;
};

function db_insert($connect, $table, $values) {
    $sql_key = ' ';
    $sql_value = [];
    foreach ($values as $key => $value) {
        $sql_key = $sql_key . $key . ',';
        $sql_value[] = $value;
    };
    $sql_key = substr ($sql_key, 0, -1);
    $count_values = count($sql_value);
    $sql_quest = ' ';
    $sql_quest = str_repeat(' ?,', $count_values);
    $sql_quest = substr ($sql_quest, 0, -1);
    $sql_query = 'INSERT into ' . $table. '(' . $sql_key . ')' . ' VALUES (' . $sql_quest . ')';
    
    $sql_prepare = db_get_prepare_stmt ($connect, $sql_query, $sql_value);
    $last_key = false;
    if ($sql_prepare != false) {
        mysqli_stmt_execute($sql_prepare);
        $sql_res = mysqli_stmt_get_result($sql_prepare);
        mysqli_stmt_close($sql_prepare);
        $last_key = mysqli_insert_id ($connect);
    };
    
    return $last_key;
};

function db_query($connect, $query, $values = [] ) {
    $sql_prepare = db_get_prepare_stmt ($connect, $query, $values);
    $check_error = false;
    if ($sql_prepare != false) {
        mysqli_stmt_execute($sql_prepare);
        $sql_res = mysqli_stmt_get_result($sql_prepare);
        mysqli_stmt_close($sql_prepare);
        $check_error = true;
    };
    
    return $check_error;
};
?>
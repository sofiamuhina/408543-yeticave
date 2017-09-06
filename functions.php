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
?>
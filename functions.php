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
?>
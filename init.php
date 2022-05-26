<?php

    ini_set('display_errors','on');
    error_reporting(E_ALL);

     include 'admin/connect.php';

    $tpl='includes/tamplates/';
    $langs='includes/languages/';
    $func='includes/functions/';
    $css='layout/css/';
    $js='layout/js/';

    include $langs . 'eng.php';
    include $func . 'functions.php';
    include $tpl . 'header.inc';

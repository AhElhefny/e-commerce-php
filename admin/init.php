<?php

    include 'connect.php';

    $tpl='includes/tamplates/';
    $langs='includes/languages/';
    $func='includes/functions/';
    $css='layout/css/';
    $js='layout/js/';
    $role='memberRoles/';
    $catRole='categoryRoles/';
    $itemRole='itemRoles/';
    $commentRole='commentsRoles/';

    include $langs . 'eng.php';
    include $func . 'functions.php';
    include $tpl . 'header.inc';
    if(!isset($nonavbar)) {
        include $tpl . 'navbar.php';
    }

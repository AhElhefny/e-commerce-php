<?php
ob_start();
session_start();
    if(isset($_SESSION['logged in'])){
        $pageTitle='Categories';
        include 'init.php';

        $do=isset($_GET['do'])? $_GET['do']:'Manage';
        echo "<div class='container'>";
        if($do=='Manage'){
            include $catRole . 'manageCat.php';
        }
        else if($do=='Add'){
            include $catRole . 'addCat.php';
        }
        else if($do=='Insert'){
            include $catRole . 'InsertCat.php';
        }
        else if($do=='Edit'){
            include $catRole . 'editCat.php';
        }
        else if($do=='Update'){
            include $catRole . 'updateCat.php';
        }
        else if($do=='Delete'){
            $CatID=$_GET['catId'];
            $stmt=$con->prepare("DELETE FROM categories WHERE cat_ID = ?");
            $stmt->execute(array($CatID));
            header('location:?do=Manage');
        }
        echo "</div>";
        include $tpl . 'footer.inc';
    }else{
        header('location:index.php');
        exit();
    }
    ob_end_flush();
?>
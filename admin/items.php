<?php
ob_start();
session_start();
if(isset($_SESSION['logged in'])){
    $pageTitle='Items';
    include 'init.php';

    $do=isset($_GET['do'])? $_GET['do']:'Manage';
    echo "<div class='container'>";
    if($do=='Manage' || $do=='Pending'){
        include $itemRole . 'manageItems.php';
    }
    else if($do=='Add'){
        include $itemRole . 'addItems.php';
    }
    else if($do=='Insert'){
        include $itemRole . 'insertItem.php';
    }
    else if($do=='Edit'){
        include $itemRole . 'editItems.php';
    }
    else if($do=='Update'){
        include $itemRole . 'updateItems.php';
    }
    else if($do=='Delete'){
        $ItID=$_GET['itId'];
        $stmt=$con->prepare("DELETE FROM items WHERE itemId = ?");
        $stmt->execute(array($ItID));
        $msg= "<div class='alert alert-success'>Item has been removed successfully </div>";
        redirectTo($msg,4,'back');
//        header('location:?do=Manage');
    }
    else if($do=='Approve'){
        $ItID=$_GET['itId'];
        $stmt=$con->prepare("UPDATE items SET itRegStat=1 WHERE itemId=?");
        $stmt->execute(array($ItID));
        $msg= "<div class='alert alert-success'>Item has been accepted successfully </div>";
        redirectTo($msg,1,'back');    }
    echo "</div>";
    include $tpl . 'footer.inc';
}else{
    header('location:index.php');
    exit();
}
ob_end_flush();
?>
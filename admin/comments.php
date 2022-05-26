<?php
ob_start();
session_start();
if(isset($_SESSION['logged in'])){
    $pageTitle='Comments';
    include 'init.php';

    $do=isset($_GET['do'])? $_GET['do']:'Manage';
    echo "<div class='container'>";
    if($do=='Manage' || $do=='Pending'){
        include $commentRole . 'manageComment.php';
    }
    else if($do=='Delete'){
        $CID=$_GET['CId'];
        $stmt=$con->prepare("DELETE FROM comments WHERE c_id = ?");
        $stmt->execute(array($CID));
        header('location:?do=Manage');
    }
    else if($do=='Approve'){
        $CID=$_GET['CId'];
        $stmt=$con->prepare("UPDATE comments SET c_status=1 WHERE c_id=?");
        $stmt->execute(array($CID));
        header('location:?do=Pending');
    }
    echo "</div>";
    include $tpl . 'footer.inc';
}else{
    header('location:index.php');
    exit();
}
ob_end_flush();
?><?php

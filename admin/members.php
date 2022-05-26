<?php
    ob_start();
    session_start();
    if(isset($_SESSION['logged in'])){
        $pageTitle='Members';
        include 'init.php';

        $do=isset($_GET['do'])? $_GET['do']:'Manage';
echo "<div class='container'>";
        if($do=='Manage' || $do=='Pending'){
            include $role . 'manage.php';
        }
        else if($do=='Add'){
            include $role . 'add.php';
        }
        else if($do=='Insert'){
            include $role . 'Insert.php';
        }
        else if($do=='Edit'){
            include $role . 'edit.php';
        }
        else if($do=='Update'){
            include $role . 'update.php';
        }
        else if($do=='Delete'){
            $UID=$_GET['uId'];
            $stmt=$con->prepare("DELETE FROM users WHERE UserID = ?");
            $stmt->execute(array($UID));
            header('location:?do=Pending');
        }
        else if($do=='Approve'){
            $UID=$_GET['uId'];
            $stmt=$con->prepare("UPDATE users SET RegStatus=1 WHERE UserID=?");
            $stmt->execute(array($UID));
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
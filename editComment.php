<?php

    include 'admin/connect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $id=$_POST['id'];
        $comment=$_POST['comment'];
        $statmmmm=$con->prepare('UPDATE comments SET comment=? WHERE c_id=?');
        $statmmmm->execute(array($comment,$id));
        echo json_encode(['msg'=>'7antisa']);
    }

<?php

    function printTitle(){
        global $pageTitle;
        if(isset($pageTitle)){
            return $pageTitle;
        }else{
            echo 'defult';
        }
    }

    function redirectTo($errorMsg,$seconds=3,$url=null){
        if($url===null){
            $url="index.php";
        }else{
           $url=isset($_SERVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']!==''? $_SERVER['HTTP_REFERER']:"index.php";
        }
        echo $errorMsg;
        echo "<div class='alert alert-info'>you will redirect after $seconds seconds</div>";
        header("refresh:$seconds;url=$url");
        exit();
    }

    function checkUserStatus($user){
        global $con;
        $stattm=$con->prepare('SELECT UserName,RegStatus FROM users WHERE UserName=? AND RegStatus=0');
        $stattm->execute(array($user));
        return $stattm->rowCount();
    }

////////////////////////////////////////////////
        function checkItem($select,$from,$value){
        global $con;
        $statement=$con->prepare("SELECT $select FROM $from WHERE $select = ? ");
        $statement->execute(array($value));
        return $statement->rowCount();

  }
////
////    function countItems($col,$table,$condition){
////        global $con;
////        $statement1=$con->prepare("SELECT COUNT($col) FROM $table WHERE $condition");
////        $statement1->execute();
////        return $statement1->fetchColumn();
////    }
////
////    function getLatest($select,$table,$where,$col,$limit=5){
////        global $con;
////        $statement1=$con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $col DESC LIMIT $limit ");
////        $statement1->execute();
////        return $statement1->fetchAll();
////    }
////
////    /////////////////////////////////////////////////////////////////////
////
    function getcat(){
        global $con;
        $getcats=$con->prepare('SELECT * FROM categories ORDER BY cat_ID ');
        $getcats->execute();
        $cats=$getcats->fetchAll();
        return $cats;
    }

    function getitem($where,$value,$app=null){
        global $con;
        if($app==null){
            $sql=null;
        }
        else{
            $sql='AND itRegStat !=0';
        }
        $getitems=$con->prepare("SELECT * FROM items WHERE $where=? $sql ORDER BY itemId DESC ");
        $getitems->execute(array($value));
        $items=$getitems->fetchAll();
        return $items;
    }

    function getComment($userid){
        global $con;
        $comstmt=$con->prepare("SELECT comments.*,items.* FROM comments INNER JOIN items ON items.itemId=comments.item_id WHERE comments.user_id =? LIMIT 5");
        $comstmt->execute(array($userid));
        return $comstmt->fetchAll();
    }

    function add_comment($comment,$item,$userrole,$user){
        if($userrole==1){
            $com_status=1;
        }else{$com_status=0;}
        global $con;
        $savecom=$con->prepare('INSERT INTO comments(comment, c_date,c_status, item_id, user_id)VALUES(?,now(),?,?,?)');
        $savecom->execute(array($comment,$com_status,$item,$user));
        return $savecom->rowCount();
    }

    function edit_comment($comment,$item,$user){
        global $con;
        $savecom=$con->prepare('INSERT INTO comments(comment, c_date, item_id, user_id)VALUES(?,now(),?,?)');
        $savecom->execute(array($comment,$item,$user));
        return $savecom->rowCount();
    }

    function get_pop_item()
    {
        global $con;
        $pop_item=$con->prepare('SELECT * FROM items WHERE itRegStat=1 ORDER BY itRating DESC LIMIT 12');
        $pop_item->execute();
        return $pop_item->fetchAll();
    }

    function get_discount_item()
    {
        global $con;
        $discount_item=$con->prepare('SELECT * FROM items WHERE itRegStat=1 ORDER BY itDiscount DESC LIMIT 3');
        $discount_item->execute();
        return $discount_item->fetchAll();
    }

    function get_comment_say()
    {
        global $con;
        $they_say=$con->prepare('SELECT comments.comment, items.itName, users.UserName,users.img,categories.cat_Name 
        FROM comments 
        INNER JOIN items ON comments.item_id=items.itemId
        INNER JOIN users ON comments.user_id=users.UserID 
        INNER JOIN categories ON items.cat_ID=categories.cat_ID 
        WHERE c_status=1 ORDER BY c_date DESC LIMIT 4');
        $they_say->execute();
        return $they_say->fetchAll();
    }

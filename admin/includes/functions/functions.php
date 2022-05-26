<?php

    function printTitle(){
        global $pageTitle;
        if(isset($pageTitle)){
            echo $pageTitle;
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

    function checkItem($select,$from,$value){
        global $con;
        $statement=$con->prepare("SELECT $select FROM $from WHERE $select = ? ");
        $statement->execute(array($value));
        return $statement->rowCount();

    }

    function countItems($col,$table,$condition){
        global $con;
        $statement1=$con->prepare("SELECT COUNT($col) FROM $table WHERE $condition");
        $statement1->execute();
        return $statement1->fetchColumn();
    }

    function getLatest($select,$table,$where,$col,$limit=5){
        global $con;
        $statement1=$con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $col DESC LIMIT $limit ");
        $statement1->execute();
        return $statement1->fetchAll();
    }
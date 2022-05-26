
<h1 class="text-center">Update Member</h1>

<?php


    echo "<div class='container'>";

    if($_SERVER['REQUEST_METHOD']=='POST'){
            $itid=$_POST['itemId'];
            $itname=$_POST['itName'];
            $itDesc=$_POST['itDescription'];
            $itPrice=$_POST['itPrice'];
            $itCountry=$_POST['itCountry'];
            $itStatus=$_POST['itStatus'];
            $itRate=$_POST['itRating'];
            $userID=$_POST['memberID'];
            $catID=$_POST['catID'];

            $updatestat=$con->prepare('UPDATE items SET itName=?, itDescription=?, itPrice=?, itCountry=?, itStatus=?, itRating=?, UserID=?, cat_ID=? WHERE itemId=?');
            $updatestat->execute(array($itname,$itDesc,$itPrice,$itCountry,$itStatus,$itRate,$userID,$catID,$itid));

            $msg= "<div class='alert alert-success'>" . $updatestat->rowCount() . "effected</div>";
            redirectTo($msg,4);
    }else{
            $msg= "<div class='alert alert-danger'>do not allow to access this page directly</div>";
            redirectTo($msg,4);
        }
    echo "</div>"
    ?>

<h1 class="text-center">Update Member</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/8/2019
 * Time: 6:12 PM
 */
    echo "<div class='container'>";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $catID=$_POST['catid'];
        $catName=$_POST['catname'];
        $Description=$_POST['description'];
        $Order=$_POST['order'];
        $catfather=$_POST['parent'];
        $Visibility=$_POST['visibility'];
        $AllowComments=$_POST['allowcomments'];
        $AllowAds=$_POST['allowads'];

        $stats=$con->prepare('UPDATE categories SET cat_Name=?,description=?,ordering=?,parent=?,visibility=?,allowComment=?,allowAds=? WHERE cat_ID=?');
        $stats->execute(array($catName,$Description,$Order,$catfather,$Visibility,$AllowComments,$AllowAds,$catID));
        $msg="<div class='alert alert-success'>" . $stats->rowCount() . "effected</div>";
        redirectTo($msg,3,'back');

    }
    else
    {
        $msg= "<div class='alert alert-danger'>do not allow to access this page directly</div>";
        redirectTo($msg,4);
    }
echo "</div>"
?>

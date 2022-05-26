<h1 class="text-center">Insert Category</h1>
<?php
echo "<div class='container'>";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $catName=$_POST['catname'];
    $description=$_POST['description'];
    $order=$_POST['order'];
    $parent=$_POST['parent'];

    $visibility=$_POST['visibility'];
    $allowComments=$_POST['allowcomments'];
    $allowAds=$_POST['allowads'];
    $check=checkItem("cat_Name","categories",$catName);
    if($check!=1) {
        $stmt = $con->prepare("INSERT INTO categories(cat_Name,description,ordering,parent,visibility,allowComment,allowAds,Date) VALUES(?,?,?,?,?,?,?,now())");
        $stmt->execute(array($catName, $description, $order, $parent, $visibility, $allowComments, $allowAds));
//    $stmt=$con->prepare("INSERT INTO users(UserName,Password,Email,FullName) VALUES(:user,:pass,:email,:full)");
//    $stmt->execute(array(':user'=> $UserNam,':pass'=> $hashedpssword,':email'=>$Email,':full=> '$FullName));
        $msg= "<div class='alert alert-success'>" . $stmt->rowCount() . ' affected </div>';
        redirectTo($msg,'back',4);
    }else{
        $msg="<div class='alert alert-danger'>this name $catName is already used</div>";
        redirectTo($msg,4,'back');
    }
}
else
{
    $msg="<div class='alert alert-danger'>do not allow to access this page directly</div>";
    redirectTo($msg,4);
}
echo "</div>"
?>
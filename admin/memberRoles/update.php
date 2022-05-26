<h1 class="text-center">Update Member</h1>
<div class='container'>
<?php
$userFlag='false';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['uID'];
    $UserNam=$_POST['username'];
    $Email=$_POST['email'];
    $FullName=$_POST['full'];
    $Password=empty($_POST['newpassword'])?$_POST['oldpassword']:$_POST['newpassword'];
    $hashedpssword=sha1($Password);

    $sstam=$con->prepare('SELECT UserName FROM users WHERE UserID !=?');
    $sstam->execute(array($id));
    $arrayNames=$sstam->fetchAll();
    foreach ($arrayNames as $item){
        if($item['UserName']==$UserNam){
            $userFlag='true';
        }
    }
    if($userFlag=='false') {
        $stmt=$con->prepare("UPDATE users SET UserName=?,Email=?,FullName=?,Password=? WHERE UserID=?");
        $stmt->execute(array($UserNam,$Email,$FullName,$hashedpssword,$id));
        $msg="<div class='alert alert-success'>" . $stmt->rowCount() . ' affected </div>';
        redirectTo($msg,4);
    }else{
        $msg= "<div class='alert alert-danger'>This username Already taken</div>";
        redirectTo($msg,4,'back');
    }
}
else
{
    $msg= "<div class='alert alert-danger'>do not allow to access this page directly</div>";
    redirectTo($msg,4);
}
?>
</div>


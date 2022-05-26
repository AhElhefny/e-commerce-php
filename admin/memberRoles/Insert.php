<h1 class="text-center">Insert Member</h1>
<?php
echo "<div class='container'>";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $UserNam=$_POST['username'];
    $Email=$_POST['email'];
    $FullName=$_POST['full'];
    $credit=$_POST['creditID'];
    $Password=$_POST['password'];
    $hashedpssword=sha1($Password);

    //file array data
    $img_name=$_FILES['img']['name'];
    $img_size=$_FILES['img']['size'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $img_type=$_FILES['img']['type'];

    //allawoble extension type
    $img_extensions=array("png","jpg","gif","jpeg");
    $imgExtension=explode('.',$img_name);
    $imgExtension=end($imgExtension);
    $imgExtension=strtolower($imgExtension);
    if(!empty($img_name) && !in_array($imgExtension,$img_extensions)){
        $message= "<div class='alert alert-danger'>This Extension is not allowed </div>";
        redirectTo($message,3,'back');
    }
    $img=rand(0,100000) . '_' . $img_name;
    move_uploaded_file($img_tmp,"..\images\users\\" . $img);
    $check=checkItem("UserName","users",$UserNam);
    $creditres=checkItem('creditID','users',$credit);
    if($check!=1 && $creditres!=1) {
        $stmt = $con->prepare("INSERT INTO users(UserName,Password,img,Email,FullName,RegStatus,creditID,Date) VALUES(?,?,?,?,?,1,?,now())");
        $stmt->execute(array($UserNam, $hashedpssword, $img,$Email, $FullName,$credit));
//    $stmt=$con->prepare("INSERT INTO users(UserName,Password,Email,FullName) VALUES(:user,:pass,:email,:full)");
//    $stmt->execute(array(':user'=> $UserNam,':pass'=> $hashedpssword,':email'=>$Email,':full=> '$FullName));
        $msg= "<div class='alert alert-success'>" . $stmt->rowCount() . ' affected </div>';
         redirectTo($msg,3,'back');
    }else{
        $msg="<div class='alert alert-danger'>this name $UserNam or your credit number is already used before</div>";
        redirectTo($msg,3,'back');
    }
}
else
{
    $msg="<div class='alert alert-danger'>do not allow to access this page directly</div>";
    redirectTo($msg,4);
}
echo "</div>"
?>
<h1 class="text-center">Insert Item</h1>
<?php
echo "<div class='container'>";
if($_SERVER['REQUEST_METHOD']=='POST') {

    if($_POST['catID']===0 || $_POST['memberID']===0 || $_POST['itRating']===0 || $_POST['itStatus']===0){
        $msg="<div class='alert alert-danger'>Please select an option from all select boxes in page</div>";
        redirectTo($msg,4,'back');
    }
    else {


        $itName = $_POST['itName'];
        $itdescription = $_POST['itDescription'];
        $itprice = '$' . $_POST['itPrice'];
        $itcountry = $_POST['itCountry'];
        $itstatus = $_POST['itStatus'];
        $itrating = $_POST['itRating'];
        $memberID = $_POST['memberID'];
        $catID = $_POST['catID'];
        $imgName=$_FILES['itImg']['name'];
        $imgTmp=$_FILES['itImg']['tmp_name'];
        $imgSize=$_FILES['itImg']['size'];
        $imgType=$_FILES['itImg']['type'];
        $img_extensions=array("png","jpg","gif","jpeg","jfif");
        $imgExtension=explode('.',$imgName);
        $imgExtension=end($imgExtension);
        $imgExtension=strtolower($imgExtension);
        if(!empty($imgName) && !in_array($imgExtension,$img_extensions)){
            $message= "<div class='alert alert-danger'>This Extension is not allowed </div>";
            redirectTo($message,3,'back');
        }
        $itImg=rand(0,100000) . '_' . $imgName;
        move_uploaded_file($imgTmp,"..\images\items\\" . $itImg);

        $stmt = $con->prepare("INSERT INTO items(itName,itDescription,itImg,itPrice,itCountry,itStatus,itRating,itDate,cat_ID,UserID,itRegStat) VALUES(?,?,?,?,?,?,?,now(),?,?,1)");
        $stmt->execute(array($itName, $itdescription, $itImg,$itprice, $itcountry, $itstatus, $itrating, $catID, $memberID));
//  $stmt=$con->prepare("INSERT INTO users(UserName,Password,Email,FullName) VALUES(:user,:pass,:email,:full)");
//  $stmt->execute(array(':user'=> $UserNam,':pass'=> $hashedpssword,':email'=>$Email,':full=> '$FullName));
        $msg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' affected </div>';
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
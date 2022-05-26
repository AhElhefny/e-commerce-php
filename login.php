<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('location: index.php');
    }
    $pageTitle='Login';
    include 'init.php';

    if($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hashedpssword = sha1($password);
            //check if user exist in database
            $stmt = $con->prepare("SELECT UserID,UserName,Password FROM users WHERE Username = ? AND Password = ?");
            $stmt->execute(array($username, $hashedpssword));
            $row = $stmt->fetch();
            $count = $stmt->rowCount();
            //if count >0 then user exist in database and he is admin
            if ($count > 0) {
                
                $_SESSION['username'] = $username; //register session name
                $_SESSION['ID'] = $row['UserID']; // register session id
                if($row['GroupID']==1){
                $_SESSION['logged in']=$username;
                }
                
                header('location: index.php');      // redirect to .....page
                exit();
            } else {
                $msg = '<div class="alert alert-danger">there is no user with this data</div>';
                redirectTo($msg, 3, 'back');
            }

        }else{
            $errors=array();
            if(isset($_POST['username'])){
                $filteredUser=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
                if(strlen($filteredUser)< 4){
                    $errors[]='Username must be larger than 4 character';
                }
            }

            if(isset($_POST['email'])){
                $filteredEmail=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                if(filter_var($filteredEmail,FILTER_VALIDATE_EMAIL) !=true){
                    $errors[]='This email is not valide';
                }
            }

            if(isset($_POST['credit'])){
                $filteredcredit=$_POST['credit'];
                if(!is_numeric($filteredcredit) || strlen($filteredcredit)!=16){
                    $errors[]='This credit number is not valide';
                }
            }

            if(isset($_POST['password']) && isset($_POST['password2'])){

                if( sha1($_POST['password']) !== sha1($_POST['password2'])){
                    $errors[]='password and confirm password does not match';
                    if(strlen($_POST['password'])< 6 && strlen($_POST['password2'])< 6){
                        $errors[]='password must be larger than 6 characters and numbers';
                    }
                }

            }
            //file array data
            $img_name=$_FILES['img']['name'];
            $img_size=$_FILES['img']['size'];
            $img_tmp=$_FILES['img']['tmp_name'];
            $img_type=$_FILES['img']['type'];

            //allawoble extension type
            $img_extensions=array("png","jpg","gif","jpeg","jfif");
            $imgExtension=explode('.',$img_name);
            $imgExtension=end($imgExtension);
            $imgExtension=strtolower($imgExtension);
            if(!empty($img_name) && !in_array($imgExtension,$img_extensions)){
                $errors[]= "This Extension is not allowed";
            }


            if(empty($errors)){
                $img=rand(0,100000) . '_' . $img_name;
                move_uploaded_file($img_tmp,"images\users\\" . $img);
                $userName=$_POST['username'];
                $email=$_POST['email'];
                // $fullname=$_POST['FullName'];
                $credit=$_POST['credit'];
                $password=$_POST['password'];
                $hashPass=sha1($password);

                $res=checkItem('UserName','users',$userName);
                $creditres=checkItem('creditID','users',$credit);
                if($res==0 && $creditres==0){
                    $regstat=$con->prepare('INSERT INTO users(UserName,Password,img,Email,FullName,creditID,Date) VALUES (?,?,?,?,?,?,now())');
                    $regstat->execute(array($userName,$hashPass,$img,$email,"ah med",$credit));
                    $cOUNt=$regstat->rowCount();
                    if($cOUNt>0){
                        $msg='<div class="alert alert-success">your regestration operation is done you must login </div>';
                        redirectTo($msg,3,'back');
                    }
                }else{
                    $msg="<div class='alert alert-danger'>this name $userName or your credit number is already used before</div>";
                    redirectTo($msg,4,'back');
                }
            }
        }
    }

?>
<div class="backgroung">
        <div class="container">
            <div class="row">
                <div class="display-errors col-sm-offset-6 col-sm-6">
                    <div class="text-center ">
                        <?php
                            if(!empty($errors)){
                                foreach ($errors as $e){
                                    echo '<div class="msg">';
                                    echo $e . '</br>';
                                    echo '</div>';
                                }
                                redirectTo("",7,'back');
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>
</div>


<?php
    include $tpl . 'footer.inc';
?>
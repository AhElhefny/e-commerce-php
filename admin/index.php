<?php
    session_start();
    if(isset($_SESSION['logged in'])){
        header('location: dashboard.php');
    }
    $nonavbar="";
    $pageTitle='Login';
    include 'init.php';

//check if user coming from HTTP Request
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $hashedpssword=sha1($password);
//check if user exist in database
        $stmt=$con->prepare("SELECT UserID,UserName,Password FROM users WHERE Username = ? AND Password = ? AND GroupID = 1");
        $stmt->execute(array($username,$hashedpssword));
        $row=$stmt->fetch();
        $count=$stmt->rowCount();
//if count >0 then user exist in database and he is admin
        if($count>0){
            $_SESSION['logged in']=$username; //register session name
            $_SESSION['username']=$username;
            $_SESSION['ID']=$row['UserID']; // register session id
            header('location: dashboard.php');      // redirect to .....page
            exit();
        }

    }


?>


    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h4 class="text-center">Login Admin</h4>
        <input type="text" name="user" class="form-control" placeholder="user name" autocomplete="off"/>
        <input type="password" name="pass" class="form-control" placeholder="password" autocomplete="new-password"/>
        <input type="submit" value="login" class="btn btn-primary btn-block"/>
    </form>



<?php include $tpl . 'footer.inc'; ?>
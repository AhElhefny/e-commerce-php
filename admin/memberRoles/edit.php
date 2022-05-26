<?php

    $UID=isset($_GET['uId']) && is_numeric($_GET['uId'])?intval($_GET['uId']):0;
    $uData=$con->prepare("SELECT UserName,Password,Email,FullName FROM users WHERE UserID= ?");
    $uData->execute(array($UID));
    $row=$uData->fetch();
    $count=$uData->rowCount();
    if($count > 0) {

        ?>

<!--        <script type="text/javascript">-->
<!--            var lcValues = --><?php //echo json_encode($arrayNames); ?>;
<!--            console.log(lcValues);-->
<!--        </script>-->
        <h1 class="text-center">Edit Member</h1>
        <div class="container">
            <form class="form-horizontal" method="POST" action="?do=Update">
                <div class="form-group">
                    <input type="hidden" name="uID" value="<?php echo $UID?>"/>
                    <label class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="username" value="<?php echo $row['UserName']?> "required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="newpassword" value="" autocomplete="new-password"/>
                        <input type="hidden" name="oldpassword" value="<?php echo $row['Password']?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email" value="<?php echo $row['Email']?>"required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="full" value="<?php echo $row['FullName']?>"required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input class="btn btn-primary" type="submit" value="save"/>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
    else{

        $msg="<div class='alert alert-danger'> $UID there is not such id</div>";
        redirectTo($msg,4,'back');
    }
    ?>


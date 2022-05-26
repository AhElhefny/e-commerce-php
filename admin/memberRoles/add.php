<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/24/2019
 * Time: 10:51 AM
 */
?>
<h1 class="text-center">Add New Member</h1>
<div class="container">
    <form class="form-horizontal" method="POST" action="?do=Insert" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="username" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input class="pass form-control" minlength='6' type="password" name="password" required="required" autocomplete="new-password"/>
                <i class="show_password fa fa-eye"></i>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">E-Mail</label>
            <div class="col-sm-10">
                <input class="form-control" type="email" name="email" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="full" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">My Photo</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="img" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Credit Number</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" minlength='16' name="creditID" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary" type="submit" value="Add Member"/>
            </div>
        </div>
    </form>
</div>

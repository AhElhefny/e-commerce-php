<?php
    $statm=$con->prepare("SELECT UserID,UserName FROM users ");
    $statm->execute();
    $data=$statm->fetchAll();

    $statmCat=$con->prepare("SELECT cat_ID,cat_Name FROM categories ");
    $statmCat->execute();
    $dataCat=$statmCat->fetchAll();
?>

<h1 class="text-center">Add New Item</h1>
<div class="container">
    <form class="form-horizontal" method="POST" action="?do=Insert" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Itme Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="itName" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input class="pass form-control" type="text" name="itDescription" required="required" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Item Photo</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="itImg" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="itPrice" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Country made</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="itCountry" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="itStatus">
                    <option value="0">...</option>
                    <option value="new">New</option>
                    <option value="like new">Like new</option>
                    <option value="used">Used</option>
                    <option value="old">Old</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Rating</label>
            <div class="col-sm-10">
                <select class="form-control" name="itRating">
                    <option value="0">...</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Members</label>
            <div class="col-sm-10">
                <select class="form-control" name="memberID">
                    <option value="0">...</option>
                    <?php
                        foreach ($data as $datuim){
                            echo'<option value="' . $datuim['UserID'] . '">' . $datuim['UserName'] . '</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Categories</label>
            <div class="col-sm-10">
                <select class="form-control" name="catID">
                    <option value="0">...</option>
                    <?php
                    foreach ($dataCat as $datuim){
                        echo'<option value="' . $datuim['cat_ID'] . '">' . $datuim['cat_Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-info" type="submit" value="Add Item"/>
            </div>
        </div>
    </form>
</div>

<?php
    $itemID=$_GET['itId'];
    $stamtements3=$con->prepare('SELECT * FROM items WHERE itemId=?');
    $stamtements3->execute(array($itemID));
    $itdata=$stamtements3->fetch();
    $COUNT=$stamtements3->rowCount();

    $statm=$con->prepare("SELECT UserID,UserName FROM users ");
    $statm->execute();
    $data=$statm->fetchAll();

    $statmCat=$con->prepare("SELECT cat_ID,cat_Name FROM categories ");
    $statmCat->execute();
    $dataCat=$statmCat->fetchAll();
    if($COUNT>0) {
        ?>

        <h1 class="text-center">Editing Item</h1>
        <div class="container">
            <form class="form-horizontal" method="POST" action="?do=Update">
                <input type="hidden" name="itemId" value="<?php echo $itemID ?>" />
                <div class="form-group">
                    <label class="col-sm-2 control-label">Itme Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="itName" value="<?php echo $itdata['itName'] ?>" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <input class="pass form-control" type="text" value="<?php echo $itdata['itDescription'] ?>"name="itDescription" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?php echo $itdata['itPrice'] ?>" name="itPrice"
                               required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Country made</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?php echo $itdata['itCountry'] ?>"
                               name="itCountry" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="itStatus">
                            <option value="new"<?php if ($itdata['itStatus'] == 'new') {
                                echo 'selected';
                            } ?> >New
                            </option>
                            <option value="like new"<?php if ($itdata['itStatus'] == 'like new') {
                                echo 'selected';
                            } ?>>Like new
                            </option>
                            <option value="used"<?php if ($itdata['itStatus'] == 'used') {
                                echo 'selected';
                            } ?>>Used
                            </option>
                            <option value="old"<?php if ($itdata['itStatus'] == 'old') {
                                echo 'selected';
                            } ?>>Old
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Rating</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="itRating">
                            <option value="1"<?php if ($itdata['itRating'] == '1') {
                                echo 'selected';
                            } ?>>01
                            </option>
                            <option value="2"<?php if ($itdata['itRating'] == '2') {
                                echo 'selected';
                            } ?>>02
                            </option>
                            <option value="3"<?php if ($itdata['itRating'] == '3') {
                                echo 'selected';
                            } ?>>03
                            </option>
                            <option value="4"<?php if ($itdata['itRating'] == '4') {
                                echo 'selected';
                            } ?>>04
                            </option>
                            <option value="5"<?php if ($itdata['itRating'] == '5') {
                                echo 'selected';
                            } ?>>05
                            </option>
                            <option value="6"<?php if ($itdata['itRating'] == '6') {
                                echo 'selected';
                            } ?>>06
                            </option>
                            <option value="7"<?php if ($itdata['itRating'] == '7') {
                                echo 'selected';
                            } ?>>07
                            </option>
                            <option value="8"<?php if ($itdata['itRating'] == '8') {
                                echo 'selected';
                            } ?>>08
                            </option>
                            <option value="9"<?php if ($itdata['itRating'] == '9') {
                                echo 'selected';
                            } ?>>09
                            </option>
                            <option value="10"<?php if ($itdata['itRating'] == '10') {
                                echo 'selected';
                            } ?>>10
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Members</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="memberID">
                            <?php
                            foreach ($data as $datuim) {
                                if ($datuim['UserID'] == $itdata['UserID']) {
                                    echo '<option value="' . $datuim['UserID'] . '"selected >' . $datuim['UserName'] . '</option>';
                                } else {
                                    echo '<option value="' . $datuim['UserID'] . '" >' . $datuim['UserName'] . '</option>';
                                }

                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Categories</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="catID">
                            <?php
                            foreach ($dataCat as $datuim) {
                                if ($datuim['cat_ID'] == $itdata['cat_ID']) {
                                    echo '<option value="' . $datuim['cat_ID'] . '" selected >' . $datuim['cat_Name'] . '</option>';
                                } else {
                                    echo '<option value="' . $datuim['cat_ID'] . '">' . $datuim['cat_Name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input class="btn btn-info" type="submit" value="Edit Item"/>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }else{
        $msg="<div class='alert alert-danger'>no such this id in database</div>";
        redirectTo($msg,3,'back');
    }


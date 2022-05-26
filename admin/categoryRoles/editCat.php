<?php

    $CatID=isset($_GET['catId'])&&is_numeric($_GET['catId'])?intval($_GET['catId']):0;
    $statement2=$con->prepare('SELECT * FROM categories WHERE cat_ID=?');
    $statement2->execute(array($CatID));
    $datuim=$statement2->fetch();
    $statscat=$con->prepare('SELECT * FROM categories ORDER BY cat_ID');
    $statscat->execute();
    $cats=$statscat->fetchAll();
    $count=$statement2->rowCount();
    if($count==1) {
        ?>
        <h1 class="text-center">Edit Category</h1>
        <div class="container">
            <form class="form-horizontal" method="POST" action="?do=Update">
                <input type="hidden" name="catid" value="<?php echo $datuim['cat_ID']; ?>"/>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Catrgory Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="catname" value="<?php echo $datuim['cat_Name'];?>" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="description" value="<?php echo $datuim['description']; ?>" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ordring</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="order" value="<?php echo $datuim['ordering']; ?>" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cat Parent</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="parent">
                            <option value="0" <?php if($datuim['parent']==0) echo 'selected';?>>None</option>
                            <?php
                            foreach ($cats as $cat){
                                ?>
                                <option value="<?php $cat['cat_ID']?>"<?php if($datuim['parent']==$cat['cat_ID']) echo 'selected';?> ><?php echo $cat['cat_Name'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Visibility</label>
                        <div class="col-sm-10">
                            <input id="visibility_yes" type="radio" name="visibility" value="1" <?php if($datuim['visibility']==1) echo"checked"; ?>/>
                            <label for="visibility_yes">Yes</label>
                        </div>
                        <div class="col-sm-10">
                        <input id="visibility_no" type="radio" name="visibility" value="0"<?php if($datuim['visibility']==0) echo"checked"; ?>/>
                        <label for="visibility_no">No</label>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Allow Comments</label>
                            <div class="col-sm-10">
                                <input id="allow-comments_yes" type="radio" name="allowcomments" value="1" <?php if($datuim['allowComment']==1) echo "checked";?>/>
                                <label for="allow-comments_yes">Yes</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="allow-comments_no" type="radio" name="allowcomments" value="0"<?php if($datuim['allowComment']==0) echo "checked";?>/>
                                <label for="allow-comments_no">No</label>
                            </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Allow Ads</label>
                            <div class="col-sm-10">
                                <input id="allowads_yes" type="radio" name="allowads" value="1" <?php if($datuim['allowAds']==1) echo "checked";?>/>
                                <label for="allowads_yes">Yes</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="allowads_no" type="radio" name="allowads" value="0"<?php if($datuim['allowAds']==0) echo "checked"?>/>
                                <label for="allowads_no">No</label>
                            </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input class="btn btn-primary" type="submit" value=" Save"/>
                    </div>
                </div>
            </form>
        </div>
<?php
    }elseif($count==0){
        $msg="<div class='alert alert-danger'>no such this id in database</div>";
        redirectTo($msg,3,'back');


    }
?>


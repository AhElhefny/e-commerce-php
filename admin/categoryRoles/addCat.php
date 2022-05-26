<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/8/2019
 * Time: 6:11 PM
 */
$statscat=$con->prepare('SELECT * FROM categories ORDER BY cat_ID');
$statscat->execute();
$cats=$statscat->fetchAll();
?>
<h1 class="text-center">Add New Category</h1>
<div class="container">
    <form class="form-horizontal" method="POST" action="?do=Insert">
        <div class="form-group">
            <label class="col-sm-2 control-label">Category Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="catname" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="description" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">cat parent</label>
            <div class="col-sm-10">
                <select name="parent" class="form-control">
                    <option value="0">none</option>
                    <?php
                        foreach ($cats as $cat){
                    ?>
                            <option value="<?php echo $cat['cat_ID']; ?>"><?php echo $cat['cat_Name']; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Ordring</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="order" required="required"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Visibility</label>
            <div class="col-sm-10">
                <input id="visibility_yes" type="radio" name="visibility" value="1" checked"/>
                <label for="visibility_yes">Yes</label>
            </div>
            <div class="col-sm-10">
                <input id="visibility_no" type="radio" name="visibility" value="0"/>
                <label for="visibility_no">No</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Allow Comments</label>
            <div class="col-sm-10">
                <input id="allow-comments_yes" type="radio" name="allowcomments" value="1" checked"/>
                <label for="allow-comments_yes">Yes</label>
            </div>
            <div class="col-sm-10">
                <input id="allow-comments_no" type="radio" name="allowcomments" value="0"/>
                <label for="allow-comments_no">No</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Allow Ads</label>
            <div class="col-sm-10">
                <input id="allowads_yes" type="radio" name="allowads" value="1" checked"/>
                <label for="allowads_yes">Yes</label>
            </div>
            <div class="col-sm-10">
                <input id="allowads_no" type="radio" name="allowads" value="0"/>
                <label for="allowads_no">No</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary" type="submit" value="Add Category"/>
            </div>
        </div>
    </form>
</div>


<?php


    session_start();
    $pageTitle='Item Details';
    include 'init.php';
    $itemID=isset($_GET['itId']) && is_numeric($_GET['itId'])?intval($_GET['itId']):0;
    $stamtements3=$con->prepare('SELECT items.*,users.*,categories.cat_Name FROM items 
                                 INNER JOIN users ON items.UserID=users.UserID 
                                 INNER JOIN categories ON items.cat_ID=categories.cat_ID
                                 WHERE items.itemId=?');
    $stamtements3->execute(array($itemID));
    $itemdata=$stamtements3->fetch();
    $COUNT=$stamtements3->rowCount();

    $comstat=$con->prepare('SELECT comments.*, users.* FROM comments 
                            INNER JOIN users ON comments.user_id=users.UserID 
                            INNER JOIN items ON comments.item_id=items.itemId WHERE comments.item_id=? AND comments.c_status!=0');
    $comstat->execute(array($itemID));
    $comments=$comstat->fetchAll();
    $comcounts=$comstat->rowCount();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $com=filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
        if(!empty($com)) {
            $res = add_comment($com, $itemdata['itemId'],$imguser['GroupID'] ,$_SESSION['ID']);
            if ($res > 0) {
                $msg = '<div class="alert alert-success">your comment added successfully</div>';
                redirectTo($msg, 3, 'back');
            }
        }else{
            $msg = '<div class="alert alert-danger">your comment must not be empty</div>';
            redirectTo($msg, 3, 'back');
        }
    }
    if($COUNT > 0) {
        if (isset($itemdata['itRegStat']) && $itemdata['itRegStat'] != 0) {

?>
<div class="item_profile">
    <div class="up_item_profile">
        <h1 class="text-center"><?php echo $itemdata['itName']; ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive img-thumbnail center-block" id="it_img" src="<?php echo "images\items\\" . $itemdata['itImg']; ?>" alt="">
                </div>
                <div class="col-sm-9 item-info">
                    <!-- <h2><?php echo $itemdata['itName'] ?></h2> -->
                    <p><i class="fa fa-edit fa-fw"></i> About : <?php echo $itemdata['itDescription'] ?></p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-calendar fa-fw"></i> Since : <?php echo $itemdata['itDate'] ?></li>
                        <li><i class="fa fa-money fa-fw"></i> price : <?php echo $itemdata['itPrice'] ?></li>
                        <li><i class="fa fa-building fa-fw"></i> Country made : <?php echo $itemdata['itCountry'] ?>
                        </li>
                        <li><i class="fa fa-tags fa-fw"></i> Category : <a
                                href="category.php?catID=<?php echo $cat['cat_ID'] . '&&catName=' . str_replace(' ', '-', $itemdata['cat_Name']); ?>"><?php echo $itemdata['cat_Name'] ?></a>
                        </li>
                        <li><i class="fa fa-user"></i> Posted By : <a><?php echo $itemdata['UserName'] ?></a></li>
                        <li><i class="fa fa-user"></i> bought By : <a><?php echo rand(0,1000) . "  persons"; ?></a></li>
                        <li><i class="fa fa-user"></i> reserve me Now : <a href="#" class="btn btn-danger">احجز الان</a></li>
                    </ul>
                </div>
            </div>
            <hr class="line">
            <?php if (isset($_SESSION['username'])) { ?>
                <div class="row">
                    <div class="col-sm-offset-3">
                        <div class="addcomment">
                            <h3>Add Your Comment</h3>
                            <form method="post"
                                    action="<?php echo $_SERVER['PHP_SELF'] . '?itId=' . $itemdata['itemId']; ?>">
                                <textarea class="form-control" name="comment" required></textarea>
                                <input class="btn btn-primary" type="submit" value="Add comment"/>
                            </form>
                        </div>
                    </div>

                </div>
                <hr class="line">
            <?php } ?>
            
            <?php if ($comcounts > 0) {
                foreach ($comments as $comment) {
                    ?>
                    <div class="comment-box">
                        <div class="row">
                            <div class="col-sm-2 text-center">
                                <img class="img-responsive img-thumbnail img-circle center-block" src="<?php echo "images\users\\" . $comment['img'] ;?>" alt=""/>
                                <?php echo $comment['UserName'] ?>
                            </div>
                            <div class="col-sm-10">
                                <p class="lead" contenteditable="true" onfocusout="editComment(event,<?php echo $comment['c_id'] ?>)"><?php echo $comment['comment'] ?></p>
                                <!--//                            '</br>' . $comment['c_date'] .  '</br>';  -->
                            </div>
                        </div>
                    </div>
                    <hr class="line">
                <?php }
            } else {
                echo '<div class="text_no_comment"><span>There is no comment to show ,add one</span></div>';
            } ?>
        </div>
    </div>
</div>

            <?php
        }else{
            $msg='<div class="alert alert-danger">this item still not approve from admin </div>';
            redirectTo($msg,3,'back');
        }
    }
   else{
        $msg='<div class="alert alert-danger">There is no item that has this id</div>';
        redirectTo($msg,3,'back');
        }
    include $tpl . 'footer.inc';

?>
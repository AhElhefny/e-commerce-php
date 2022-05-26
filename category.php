<?php
    $pageTitle = 'Category';
    session_start();
    include 'init.php';

?>
<div class="predishes">
<section class="dishes">
    <div class="container">
        <div class="row">
            <h1 class="dishes-heading text-center " id="cat_dish"><?php echo str_replace('-',' ',$_GET['catName']); ?></h1>
            <hr class="dishes-hr text-center">
                <?php
                    foreach (getitem('cat_ID',$_GET['catID'],1) as $item){
                ?>
                    <div class="col-md-3 col-sm-4 col-xs-12" id="dish_box">
                        <div class="slider-content">
                            <div class="slider-img">
                                <img src="images/items/<?php echo $item['itImg']; ?>" class="img-responsive" />
                                <span><?php echo $item['itPrice'];?></span>
                            </div>
                            <div class="slider-bottom">
                                <h3><a href="item.php?itId=<?php echo $item['itemId'];?>"><?php echo $item['itName'];?></a></h3>
                                <p><?php echo $item['itDescription'];?>.</p>
                                <!-- <span class="pull-right date"><php echo $item['itDate']; >AM</span> -->
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
        </div>
    </div>
</section>
</div>

<?php
    include $tpl . 'footer.inc';
?>

<?php
    session_start();
    if(isset($_SESSION['logged in'])){
        $pageTitle='Dashboard';
        include 'init.php';
        $limit=5;
        $latestUser=getLatest('UserID,UserName','users','RegStatus=1','UserID',$limit);
        $latestItems=getLatest('itName','items','itRegStat=1','itemId',$limit);
        $stamts=$con->prepare('SELECT comments.comment,users.UserName FROM comments INNER JOIN users ON comments.user_id=users.UserID');
        $stamts->execute();
        $latestComments=$stamts->fetchAll();

        ?>
        <div class="container home-stats text-center">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat st-members">
                        <i class="fa fa-users"></i>
                        <div class="info">
                            Total Members
                            <span><a href="members.php"><?php echo countItems('UserID','users','RegStatus=1 AND GroupID!=1')?></a></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                   <div class="stat st-pendings">
                       <i class="fa fa-user-plus"></i>
                       <div class="info">
                           Pending
                           <span><a href="members.php?do=Pending"><?php echo countItems('UserID','users','RegStatus=0')?></a></span>
                       </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="stat st-items">
                       <i class="fa fa-tag"></i>
                       <div class="info">
                           Total Items
                           <span><a href="items.php"><?php echo countItems('itemId','items','itRegStat=1') ?></a></span>
                       </div>
                   </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-comments">
                        <i class="fa fa-tag"></i>
                        <div class="info">
                            Pending Items
                            <span><a href="items.php?do=Pending"><?php echo countItems('itemId','items','itRegStat=0') ?></a></span>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            <div class="row">
                <div class="col-md-3">
                    <div class="stat st-members">
                        <i class="fa fa-bars"></i>
                        <div class="info">
                            Total Categories
                            <span><a href="categories.php"><?php echo countItems('cat_ID','categories','1')?></a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-pendings">
                        <i class="fa fa-tag"></i>
                        <div class="info">
                            Nothing
                            <span><a href="#">00</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-items">
                        <i class="fa fa-comments"></i>
                        <div class="info">
                             Comments
                            <span><a href="comments.php?do=Manage"><?php echo countItems('c_id','comments','c_status!=0')?></a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-comments">
                        <i class="fa fa-comments"></i>
                        <div class="info">
                            Pendings
                            <span><a href="comments.php?do=Pending"><?php echo countItems('c_id','comments','c_status!=1')?></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container Latest">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users"></i>Latest <?php echo $limit ?> Registered Users
                            <span class="toggle-info pull-right">
                                <i class="fa fa-plus fa-lg"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled latestUsers">
                           <?php
                           foreach ($latestUser as $users ){
                               ?>
                                <li><?php echo $users['UserName'];?>
                                <span class='btn btn-success pull-right'>
                                <i class='fa fa-edit'></i>
                                <a href='members.php?do=Edit&uId=<?php echo $users['UserID']?>'>Edit</a>
                                </span></li></br>
                                <?php
                           }
                           ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tag"></i>Latest <?php echo $limit ?> Items Added
                            <span class="toggle-info pull-right">
                                <i class="fa fa-plus fa-lg"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled latestUsers">
                                <?php
                                foreach ($latestItems as $items ){
                                    ?>
                                    <li><?php echo $items['itName'];?>
                                        <span class='btn btn-success pull-right'>
                                <i class='fa fa-edit'></i>
                                <a href='members.php?do=Edit&uId=<?php echo $items['itemId']?>'>Edit</a>
                                </span></li></br>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comment"></i>Latest <?php echo $limit ?> Comments Added
                            <span class="toggle-info pull-right">
                                <i class="fa fa-plus fa-lg"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled latestUsers">
                                <?php
                                foreach ($latestComments as $comment ){
                                    ?>
                                    <li><span class='alert alert-info'><?php echo $comment['UserName'];?>
                                        </span><span class='pull-right'>
                                         <?php echo $comment['comment'];?>
                                </span>
                                    </li></br>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include $tpl . 'footer.inc';
    }else{
        header('location:index.php');
        exit();
    }
?>

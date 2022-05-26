<?php

    session_start();
    $pageTitle=' My Profile';
    include 'init.php';
    if(isset($_SESSION['username'])) {
        $userstat=$con->prepare('SELECT * FROM users WHERE UserName=?');
        $userstat->execute(array($_SESSION['username']));
        $getinfo=$userstat->fetch();
        $items=getitem('UserID',$getinfo['UserID']);
        $comments=getComment($getinfo['UserID']);
?>
<div class="profile">
            <h1 class="text-center" id="profile">My Profile</h1>
            <div class="information block">
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i>
                            My Informations
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa fa-unlock-alt fa-fw"></i>
                                    <span>Name</span> : <?php echo $getinfo['UserName']; ?>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o fa-fw"></i>
                                    <span>E-Mail</span>: <?php echo $getinfo['Email']; ?>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-fw"></i>
                                    <span>Full-Name</span>: <?php echo $getinfo['FullName']; ?>
                                </li>
                                <li>
                                    <i class="fa fa-transgender-alt fa-fw"></i>
                                    <span>Role</span>: <?php echo $role=$getinfo['GroupID']==1?'Admin':'User'; ?>
                                </li>
                                <li>
                                    <i class="fa fa-transgender-alt fa-fw"></i>
                                    <span>CreditID</span>: <?php echo $role=$getinfo['creditID']; ?>
                                </li>
                                <li>
                                    <i class="fa fa-calendar fa-fw"></i>
                                    <span>Registrate date</span>:<?php echo $getinfo['Date']; ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div id="my-ads" class="my-ads block">
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bars fa-fw"></i>
                            My Items
                        </div>
                        <div class="panel-body">
                                <?php
                                if(!empty($items)) {
                                    echo '<div class="row">';
                                    foreach ($items as $item) {
                                        ?>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="thumbnail item-box">
                                                <span class="price-tag"><?php echo $item['itPrice']; ?></span>
                                                <img class="img-responsive img-thumbnail" src="user.jpg" alt=""/>
                                                <div class="caption">
                                                    <h3>
                                                        <a href="item.php?itId=<?php echo $item['itemId']; ?>"><?php echo $item['itName']; ?></a>
                                                    </h3>
                                                    <p><?php echo $item['itDescription']; ?></p>
                                                    <p class="<?php echo $class=$item['itRegStat']==0?'v-no':'v-yes'; ?>"> state : <?php echo $role=$item['itRegStat']==0?'Waiting':'Approved'; ?></p>
                                                    <span class="pull-right date"><?php echo $item['itDate']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    echo '<div> there is no items to show, <a href="addItem.php">create new one</a></div>';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="latest-comment block">
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-comment fa-fw"></i>
                            My Latest Comments
                        </div>
                        <div class="panel-body">
                            <?php
                            if(!empty($comments)) {
                                foreach ($comments as $comment) {
                                    echo 'Item : ' . $comment['itName'] . '</br>';
                                    echo 'Comment : ' . $comment['comment'] . '</br>';
                                    echo 'Registrate Date : ' . $comment['c_date'] . '</br>';
                                    echo 'Status : ' . $stat = $comment['c_status'] == 1 ? "<span class='v-yes'>approved</span>" : "<span class='v-no'>Waiting</span>";
                                    echo '</br></br>';
                                }
                            }else{
                                echo '<div> there is no comments to show</div>';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else{
        $msg='<div class="alert alert-danger">you do not allow to access this page directly, you must login first</div>';
        redirectTo($msg,3);
    }
    include $tpl . 'footer.inc';

?>
<?php
ob_start();
    session_start();
    $pageTitle=' create item';
    include 'init.php';
    if(isset($_SESSION['username'])) {

        $statmCat=$con->prepare("SELECT cat_ID,cat_Name FROM categories ");
        $statmCat->execute();
        $dataCat=$statmCat->fetchAll();

        if($_SERVER['REQUEST_METHOD']=='POST') {

            $errors = array();
            $itname = filter_var($_POST['itName'], FILTER_SANITIZE_STRING);
            $itdesc = filter_var($_POST['itDescription'], FILTER_SANITIZE_STRING);
            $itprice ='$' . filter_var($_POST['itPrice'], FILTER_SANITIZE_NUMBER_INT);
            $itcountry = filter_var($_POST['itCountry'], FILTER_SANITIZE_STRING);
            $itstat = filter_var($_POST['itStatus'], FILTER_SANITIZE_STRING);
            $itcat = filter_var($_POST['catID'], FILTER_SANITIZE_STRING);

            $imgName=$_FILES['itImg']['name'];
            $imgTmp=$_FILES['itImg']['tmp_name'];
            $imgSize=$_FILES['itImg']['size'];
            $imgType=$_FILES['itImg']['type'];
            $img_extensions=array("png","jpg","gif","jpeg","jfif");
            $imgExtension=explode('.',$imgName);
            $imgExtension=end($imgExtension);
            $imgExtension=strtolower($imgExtension);


            if (isset($itname) && strlen($itname) < 2) {
                $errors[] = 'item name must be larger than 2 charcters';
            }

            if (isset($itdesc) && strlen($itdesc) < 10) {
                $errors[] = 'item description must be larger than 10 charcters';
            }

            if (isset($itcountry) && strlen($itcountry) < 2) {
                $errors[] = 'item country must be larger than 2 charcters';
            }

            if (isset($itprice) && empty($itprice)) {
                $errors[] = 'item price must be not empty must equal 0 or more';
            }

            if (isset($itstat) && empty($itstat)) {
                $errors[] = 'item status must be not empty must choose an option';
            }

            if (isset($itcat) && empty($itcat)) {
                $errors[] = 'item category must be not empty must choose category';
            }

            if(!empty($imgName) && !in_array($imgExtension,$img_extensions)){
                $errors[] = "This Extension is not allowed";
            }


            if (empty($errors)) {
                $itImg=rand(0,100000) . '_' . $imgName;
                move_uploaded_file($imgTmp,"images\items\\" . $itImg);

                if($imguser['GroupID']==1){
                    $itregstat=1;
                }else{$itregstat=0;}
                $ItRating=rand(1,100);
                $additstat = $con->prepare('INSERT INTO items(itName,itDescription,itImg,itPrice,itDate,itCountry,itStatus,itRegStat,cat_ID,UserID,itRating)VALUES(?,?,?,?,now(),?,?,?,?,?,?)');
                $additstat->execute(array($itname, $itdesc,$itImg ,$itprice, $itcountry, $itstat,$itregstat ,$itcat,$_SESSION['ID'],$ItRating));
                $effected = $additstat->rowCount();
                if ($effected > 0) {
                    $msg = '<div class="alert alert-success">item added successfully</div>';
                    redirectTo($msg, 3, 'back');
                } else {
                    $msg = '<div class="alert alert-danger">something went wrong please, try again</div>';
                    redirectTo($msg, 3, 'back');
                }
            }
        }
?>
    <div class="add-item" id="#add">
        <div class="information block">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-edit fa-fw"></i>
                        Create new item
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">New item</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <form class="form-horizontal additemform" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input class="form-control live" type="text" name="itName" required="required" data-class=".live-name" placeholder="Item Name..."/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input class="pass form-control live" type="text" name="itDescription" required="required" data-class=".live-desc" placeholder="Descripe Your item..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input class="form-control live" type="file" name="itImg" id="itImg" required="required" data-class=".live-img" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input class="form-control live" type="text" name="itPrice" required="required" data-class=".live-price" placeholder="Item Price...."/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="itCountry" required="required" placeholder="Made in...."/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <select class="form-control" name="itStatus">
                                                <option value="">Item State...</option>
                                                <option value="new">New</option>
                                                <option value="like new">Like new</option>
                                                <option value="used">Used</option>
                                                <option value="old">Old</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <select class="form-control" name="catID">
                                                <option value="">Categories...</option>
                                                <?php
                                                foreach ($dataCat as $datuim){
                                                    echo'<option value="' . $datuim['cat_ID'] . '">' . $datuim['cat_Name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <input class="btn btn-info" type="submit" value="Add Item"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail item-box live-preview">
                                    <span class="price-tag">$<span class="live-price">0</span></span>
                                    <img class="img-responsive" id="it-photo" src="user.jpg" alt=""/>
                                    <div class="caption">
                                        <h3 class="live-name">
                                            Name
                                        </h3>
                                        <p class="live-desc">Description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-errors col-sm-6">
                                <div class="text-center ">
                                    <?php

                                    if(!empty($errors)){
                                        foreach ($errors as $e){
                                            echo '<div class="msg">';
                                            echo $e . '</br>';
                                            echo '</div>';
                                        }
                                    }

                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php
    }
    else{
        $msg='<div class="alert alert-success">you do not allow to access this page directly, you must login first</div>';
        redirectTo($msg,3);
    }
    ob_flush();
    include $tpl . 'footer.inc';

?>
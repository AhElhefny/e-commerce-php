<?php

    if(isset($_SESSION['username'])){
        $statattuserimg=$con->prepare('SELECT * FROM users WHERE UserID=?');
        $statattuserimg->execute(array($_SESSION['ID']));
        $imguser=$statattuserimg->fetch();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php echo printTitle()?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
    <!-- it is IMPORTANT for Responsive and mobile meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Good Bootsrape">
    <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $css; ?>font-awesome.min.css">   
    <!-- Small Slider -->
    <link rel="stylesheet" href="<?php echo $css; ?>flexslider.css">
        
    <link rel="stylesheet" href="<?php echo $css; ?>lightgallery.css">
    <link rel="stylesheet" href="<?php echo $css; ?>jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $css; ?>jquery.selectBoxIt.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>slick/slick-theme.css"/>
    <link rel="stylesheet" href="<?php echo $css; ?>frontend.css">
    <link rel="stylesheet" href="<?php echo $css; ?>style.css">
    <!-- media.css -->
        <link rel="stylesheet" href="<?php echo $css; ?>media.css">

        <!-- hover.css -->
        <link rel='stylesheet' href='<?php echo $css; ?>hover.css' />
        
        <!-- animate.css -->
        <link rel='stylesheet' href='<?php echo $css; ?>animate.css' />
        
        <!-- Googl fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" >

</head>
<body>
    <!-- Start Navbar -->
     
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            
  <div class="container">
      
    <!-- Start navbar-header Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ourNavbar" aria-expanded="false">

            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

          
          <a class="navbar-brand pop" href="#">Mota <span>ح</span></a>
          <img src="images\download.jpg" class="img-circle img-thumbnail ava-imgs" alt="">
    </div>
      <!-- end navbar-header -->

      
      
      
    <!-- start Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="ourNavbar">
        
        <!-- start main nav navbar-nav -->
        <ul class="nav navbar-nav navbar-right">
        <?php 
        if(printTitle()=="Home page"){?>
            <li class="active">
                <a href="index.php" data-value="Home"> Home <span class="sr-only">(current)</span></a>
            </li>
            <?php }else{?>
              <li >
                <a href="index.php" data-value="Home"> Home <span class="sr-only">(current)</span></a>
            </li>
           <?php }?>
            
<?php 
if(isset($_SESSION['username']) || isset($_SESSION['logged in']) ){
if($imguser['GroupID']==1){ echo' <li><a href="admin/dashboard.php">CPAnel</a></li>';
 $_SESSION['logged in']=$imguser['UserName'];} }
 if($pageTitle=='Home page'){
?>
            <li><a href="#Categories" data-value="services">categories</a></li>
            <li><a href="#About"  data-value="pricing">about</a></li>
            <?php }?>

<!---------- (clients|profile) btn --------------!>            
            <?php if(!isset($_SESSION['username'])){?>
            <li><a href="#clients"  data-value="clients">clients</a></li>
            <?php }else { 
              if($_SERVER['REQUEST_URI']=="/proo/profile.php"){
              ?>
            <li class="active"><a href="profile.php#profile"  data-value="profile">Profile</a></li>
            <?php }else{
              echo "<li><a href='profile.php#add'  data-value='profile'>Profile</a></li>";
            }} ?>
<!---------- (clients|profile) btn --------------!>


<!---------- (team|additem) btn --------------!>
            <?php if(!isset($_SESSION['username'])){?>
            <li><a href="#team"     data-value="team">team</a></li>
            <?php }else { 
              if($_SERVER['REQUEST_URI']=="/proo/addItem.php"){
              ?>
            <li class="active"><a href="addItem.php#add"  data-value="add">Add Item</a></li>
            <?php }else{
              echo "<li><a href='addItem.php#add'  data-value='add'>Add Item</a></li>";
            }
            
            }?>
<!---------- (team|additem) btn --------------!>

            
            <?php if($pageTitle=='Home page'){ ?>
            <li><a href="#contact"  data-value="contact">contact</a></li>
<?php }?>
<!---------- (Login|logout) btn --------------!>
            <?php if(!isset($_SESSION['username'])){?>
            <li><a href="#" id="btnlog">login</a></li>
            <?php }else { ?>
            <li><a href="logout.php"  data-value="Logout">Logout</a></li>
            <?php } ?>
<!---------- (Login|logout) btn --------------!>

        </ul>
        <!-- end main nav navbar-nav -->
        
    </div>
    <!-- End Collect the nav links -->
      
  </div>
  <!-- End container -->
    
</nav>
<!-- End Navbar -->
   
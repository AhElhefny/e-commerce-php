<?php
    session_start();
    $pageTitle='Home page';
    include 'init.php';
?>
<!-- start header -->
    <section class="header" id="Home">
            
            <!-- start container -->
            <div class="container">
            
                <!-- start row -->
                <div class="row">
                
                    <div class="col-md-6 wow bounceInLeft" data-wow-delay="1.3s">
                        <h1> IT IS THE BEST WEB STORE</h1>
                        
                        <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                        </p>
                        
                        <p class="visible-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.but also the leap into electronic typesetting</p>
                        <?php if(!isset($_SESSION['username'])){?>
                        <a href='#signup' class="btn btn-lg btn-primary">SIGN UP</a>
                        <?php }?>
                        <button class="btn btn-lg btn-success">View PRODUCT</button>
                    </div>
                    
                    <div class="col-md-6  wow bounceInRight" data-wow-delay="1.3s">
                        <img src="images/Responsive-Web-Design.png" class="img-responsive">
                    </div>
                    
                    
                </div>
                <!-- End row -->
            
            </div>
            <!-- End container -->
        
        </section>
        <!-- End header -->
        
        
            <!-- ----------------------------------------------------------------------- -->
            
<!-- start Services -->
    <section class="services text-center" id="Categories">
        
        <!-- start container -->
        <div class="container">
            
            <div class="row">
            
                <h1> Categories </h1>
                
                <p class="lead"> Everything you seek will be found in our Categories</p>
                <?php
                foreach (getcat() as $cat){?>
                <div class="col-md-3 wow fadeInLeft" data-wow-delay="1.8s">
                    <i class="fa fa-<?php echo $cat['icon']; ?> fa-3x" aria-hidden="true"></i>
                    <h4><a href="<?php echo 'category.php?catID=' . $cat['cat_ID'] . '&&catName='. str_replace(' ','-',$cat['cat_Name']) ; ?>"><?php echo $cat['cat_Name'];?></a></h4>
                    <p class="parag">We assume you are willing, even eager, to learn about all the advanced features that Java puts at
                        your disposal. For example, we give you a detailed treatment of</p>
                </div>
                        <?php } ?>
            </div>
            
        </div>
        <!-- End container -->

    </section>
<!-- End Services -->


        <!-- --------------------------------------------------------------------------- -->
    
    
<!-- start PRICING -->
    <!-- <section class="PRICING text-center" id="About">
    
        <div class="container">
            
            <div class="row">
                
                <h5 class="h1">Most Popular</h5>
                
                <p class="lead">This is the best-selling product in this week</p>
                
                
                
                
                <div class="col-md-3 col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10 wow flipInY" data-wow-delay=".8s">  
                    
                    <div class="product">
                            <h4>BRONZE</h4>
                            <h1>9.99</h1>
                            <b>Monthly</b>
                            <p>Lorem Ipsum passages, and more recently with desktop</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li>100 Users</li>
                                <li>SSL Certificate</li>
                                <li>Online Support</li>
                                <li>300GB Disckspace</li>
                                <li>100 Email Address</li>
                                <li>MySQL Database</li>
                            </ul>
                            <button class="btn btn-success">Get Started</button>
                    </div>
                 </div>
                
                
                
                <div class="col-md-3 col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10 wow flipInY" data-wow-delay="1.2s">
                    
                    <div class="product">
                            <h4>SILVER</h4>
                            <h1>19.99</h1>
                            <b>Monthly</b>
                            <p>Lorem Ipsum passages, and more recently with desktop</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li>100 Users</li>
                                <li>SSL Certificate</li>
                                <li>Online Support</li>
                                <li>300GB Disckspace</li>
                                <li>100 Email Address</li>
                                <li>MySQL Database</li>
                            </ul>
                            <button class="btn btn-success">Get Started</button>
                    </div>
                 </div>
                
                
                
                <div class="col-md-3 col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10 wow flipInY" data-wow-delay="1.6s">
                    
                    <div class="product">
                            <h4>GOLD</h4>
                            <h1>29.99</h1>
                            <b>Monthly</b>
                            <p>Lorem Ipsum passages, and more recently with desktop</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li>100 Users</li>
                                <li>SSL Certificate</li>
                                <li>Online Support</li>
                                <li>300GB Disckspace</li>
                                <li>100 Email Address</li>
                                <li>MySQL Database</li>
                            </ul>
                            <button class="btn btn-success">Get Started</button>
                    </div>
                 </div>
                
                
                
                <div class="col-md-3 col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10 wow flipInY" data-wow-delay="2s">
                    
                    <div class="product">
                            <h4>PREMIUM</h4>
                            <h1>39.99</h1>
                            <b>Monthly</b>
                            <p>Lorem Ipsum passages, and more recently with desktop</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li>100 Users</li>
                                <li>SSL Certificate</li>
                                <li>Online Support</li>
                                <li>300GB Disckspace</li>
                                <li>100 Email Address</li>
                                <li>MySQL Database</li>
                            </ul>
                            <button class="btn btn-success">Get Started</button>
                    </div>
                 </div>
                 -->
                
            <!-- </div> -->
            <!-- End Row -->
            
        <!-- </div> -->
        <!-- End Container -->
        
    <!-- </section> -->
<!-- End PRICING -->
    
    <!-- -------------------------------------------------------------------------- -->


<!-- ------------------------------ Start Section Popular------------------------------------- -->
    <section class="dishes" id="About">
        
        <div class="container">
            
            <div class="row">
                
                <h1 class="dishes-heading text-center"> MOST POPULAR </h1>
                <hr class="dishes-hr text-center">
                <p class="dishes-parag text-center">This is the best-selling product in this week</p>

                <!-- start first autoplay -->
                <div class="autoplay">
                    <?php foreach(get_pop_item() as $pop_item){?>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="slider-content">
                            <div class="slider-img">
                                <img src="images/items/<?php echo $pop_item['itImg']; ?>" class="img-responsive" />
                                <span><?php echo $pop_item['itPrice'];?></span>
                            </div>
                            <div class="slider-bottom">
                                <h3><a href="item.php?itId=<?php echo $pop_item['itemId'];?>"><?php echo $pop_item['itName'];?></a></h3>
                                <p><?php echo $pop_item['itDescription'];?>.</p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- start end autoplay -->
                
                
                            
            </div>
            <!-- End row -->
            
        </div>
        <!-- End container -->
        
        
    </section>

<!-- ------------------------------ End Section Popular------------------------------------- -->  




<!-- ------------------------------Start Section DIscount------------------------------------- -->

    <section class="events" id="events">
        
        <div class="container">
        
            <div class="row">
                
                <h1 class="events-heading text-center">DISCOUNT PRODUCT</h1>
                <hr class="events-hr text-center">
                <p class="events-parag text-center">Checkout the discount product</p>
                

                <?php foreach(get_discount_item() as $discount_item) {
                    $discount_date_time=explode(" ",$discount_item['itDate']);
                    ?>
                <div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-offset-2 col-xs-8 events-contain">
                    <div class=" events-img">
                        <div class="hovereffect">
                            <img src="images/items/<?php echo $discount_item['itImg']; ?>" alt="">
                                <div class="overlay text-center">
                                    <span>-<?php echo $discount_item['itDiscount']; ?>%</span>
                                    <!-- <h2>EVENT TITLE</h2>
                                    <p><a href="#">Lorem ipsum dolor</a></p> -->
                                </div>
                        </div>
                        <!-- End hovereffect -->
                    </div>
                    
                    <div class="events-content">
                            <h4><?php echo $discount_item['itName']; ?></h4>
                            <span class="date"><?php echo $discount_date_time[0]; ?></span>
                            <span class="time"> &nbsp; <?php echo $discount_date_time[1]; ?> AM</span>
                            <p><?php echo $discount_item['itDescription'];?>.</p>
                            <a href="item.php?itId=<?php echo $discount_item['itemId'];?>">View Details &nbsp;<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End col-md-4 col-sm-6 col-xs-12 -->
                
                <?php }?>
                
                <!-- <div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-offset-2 col-xs-8 events-contain">
                    <div class="events-img">
                        <div class="hovereffect">
                            <img src="layout/images/img-6.jpg" alt="">
                                <div class="overlay">
                                    <span>-15%</span>
                                    <-- <h2>COFFEE WITH ENRIQUE</h2>
                                    <p><a href="#">Lorem ipsum dolor</a></p> --
                                </div>
                        </div>
                        <-- End hovereffect --
                    </div>
                    
                    <div class="events-content">
                            <h4>Indian Meat Opening</h4>
                            <span class="date">26 August 2015</span>
                            <span class="time"> &nbsp; 11:15 AM</span>
                            <p>Nam pharetra diam eu dolor vestibulum volutpat.</p>
                            <a href="#">View Details &nbsp;<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <-- End col-md-4 col-sm-6 col-xs-12 --
                
                
                
                <div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-offset-2 col-xs-8 events-contain">
                    <div class="events-img">
                        <div class="hovereffect">
                            <img src="layout/images/img-5.jpg" alt="">
                            <div class="overlay">
                                    <span>-30%</span>
                                    <-- <h2>COFFEE WITH ENRIQUE</h2>
                                    <p><a href="#">Lorem ipsum dolor</a></p> --
                                </div>
                        </div>
                    <-- End hovereffect 
                    </div>
                    
                    <div class="events-content">
                            <h4>Indian Meat Opening</h4>
                            <span class="date">26 August 2015</span>
                            <span class="time"> &nbsp; 11:15 AM</span>
                            <p>Nam pharetra diam eu dolor vestibulum volutpat.</p>
                            <a href="#">View Details &nbsp;<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <-- End col-md-4 col-sm-6 col-xs-12--
                
                
             -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->
    </section>

<!-- ------------------------------End Section events------------------------------------- -->



<!-- ------------------------------Start Section Say------------------------------------- -->

    <section class="say text-center">
    
        <div class="container">
        
            <div class="row">
            
                <h1>WHAT THEY SAY</h1>
                <hr class="say-hr">
                
                <div class="col-md-12">
                
                    <div id="my-carousel" class="carousel slide" data-ride="carousel">

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">

                          <!------------------------------- get_comment_say() ----------------------------->

                        <div class="item active">
                          <div class="row">
                              <div class="col-md-12">
                                <img src="images/users/<?php echo get_comment_say()[0]['img'] ;?>">
                              </div>
                              <div class="col-md-12">
                                <p><?php echo get_comment_say()[0]['comment'] ;?></p>
                                <p><?php echo get_comment_say()[0]['itName'] ;?>, <?php echo get_comment_say()[0]['cat_Name'] ;?>.</p>
                                <span><?php echo get_comment_say()[0]['UserName'] ;?> - Mota7 Inc.</span>
                              </div>
                          </div>
                        </div>
                          
                        <?php for($i=1 ; $i<=3 ; $i++){  ?>
                        <div class="item">
                          <div class="row">
                              <div class="col-md-12">
                                <img src="images/users/<?php echo get_comment_say()[$i]['img'] ;?>">
                              </div>
                              <div class="col-md-12">
                                <p><?php echo get_comment_say()[$i]['comment'] ;?> </p>
                                <p><?php echo get_comment_say()[$i]['itName'] ;?>, <?php echo get_comment_say()[$i]['cat_Name'] ;?>.</p>
                                <span><?php echo get_comment_say()[$i]['UserName'] ;?> - Mota7 Inc.</span>
                              </div>
                          </div>
                        </div>
                          <?php }?>
                          
                      <!-- Controls -->
                      <a class="left carousel-control" href="#my-carousel"
                         role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                      </a>
                          
                      <a class="right carousel-control" href="#my-carousel"
                         role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                      </a>
                          
                    </div>
                    <!-- End Wrapper for slides -->
                        
                </div>
                <!-- End my-carousel -->
                    
                </div>
                <!-- End Col-md -->
                
            </div>
        </div>
    
    </section>
<!-- ------------------------------End Section Say------------------------------------- -->
    
<!-- Start clients -->
    <section class="clients text-center" id="clients">
    
        <!-- Start container -->
        <div class="container">
            
            <!-- Start Row -->
            <div class="row">
            
                <h1> TRUSTED BY </h1>
                <p class="lead"> Lorem Ipsum passages, and more recently with desktop publishing software</p>
                
                <div class="col-md-3 wow pulse" data-wow-duration="1.5s">
                    <div class="images">
                        <img src="images/clients/client01.png" class="img-responsive">
                    </div>
                </div>
                
                
                <div class="col-md-3 wow pulse" data-wow-duration="1.5s">
                    <div class="images">
                        <img src="images/clients/client02.png" class="img-responsive">
                    </div>
                </div>
                
                
                
                <div class="col-md-3 wow pulse" data-wow-duration="1.5s">
                    <div class="images">
                        <img src="images/clients/client03.png" class="img-responsive">
                    </div>
                </div>
                
                
                <div class="col-md-3 wow pulse" data-wow-duration="1.5s">
                    <div class="images">
                        <img src="images/clients/client04.png" class="img-responsive">
                    </div>
                </div>

                
            </div>
            <!-- End Row -->
        
        </div>
        <!-- End Container -->
    
    </section>
<!------------------------------------------- End Clients ---------------------------------------->


<!-- ------------------------------ Start Section sign Up------------------------------------- -->
    <?php if(!isset($_SESSION['username'])){?>
    <section class="sign-Up" id="signup">
    
        <div class="Contact-overlay">
        
            <div class="container">
            
                <div class="row">
                    
                    <div class="Contact-Us-heading">
                        <div class="span-before"> </div>
                        <h2 class="text-center"> SIGN UP </h2>
                        <div class="span-after"> </div> 
                    </div>
                    <div class="first">
                                <!-- start Sign up Form -->
                        <form action="login.php" method="post" enctype="multipart/form-data">
                                <div class="col-sm-offset-2 col-sm-4">
                                        <div class="form-group">
                                            <input  class="form-control input-lg" pattern=".{4,9}" title="user name between 4 and 9 characters" type="text" name="username" placeholder="Username" required="required">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control input-lg" name="email" autocomplete="off" placeholder="e-mail" required="required">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" minlength="16" name="credit" required placeholder="write your credit number">
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control input-lg" name="img" required placeholder="uplode your Photo">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control input-lg" minlength="6" name="password" autocomplete="new-password" placeholder="password" required="required">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control input-lg" minlength="6" name="password2" autocomplete="new-password" placeholder="confirm password" required="required">
                                        </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-8  text-center contact-button">
                                    <input type="submit" value="Sign Up" name="signup" class="form-control input-lg hvr-bounce-to-right"/>
                                </div>
                        </form>
                                <!-- End Sign Up Form -->  
                    </div>
  
                </div>
            </div>
            
        </div>
        
    </section>
    <?php }?>
<!-- ------------------------------End Section sign up------------------------------------- -->
    
<!-------------------------------------------- start team ----------------------------------------->
    <section class="team text-center" id="team">
    
        <!-- start container -->
        <div class="container">
        
            <!-- start row -->
            <div class="row">
                    
                <h1>MEET OUR TEAM</h1>
                <p class="para">SOON More web projects, and more desktop publishing software</p>
                
                <div class="col-md-3">
                    <div class="developer wow fadeInLeft" data-wow-delay="2s">
                        <img src="images/team/team-1.jpg" class="img-circle">
                        <h4>Hadeer elmrasy</h4>
                        <b>CEO and Founder</b>
                        <p>Establishing a company and holds its chief executive officer (CEO) position, and starts a business.</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                
                <div class="col-md-3">
                    <div class="developer wow fadeInLeft" data-wow-delay="1.6s">
                        <img src="images/team/team-5.jpg" class="img-circle">
                        <h4>Eslam Fathy</h4>
                        <b>Backend Developer</b>
                        <p>specifically engaged in, the development of WWW Apps using a client-server model, etc...</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                
                <div class="col-md-3">
                    <div class="developer wow fadeInLeft" data-wow-delay="1.2s">
                        <img src="images/team/team-6.jpg" class="img-circle">
                        <h4>Aisha</h4>
                        <b>Frontend Developer</b>
                        <p>Converting data to a graphical interface, through using HTML, CSS, and etc.., so users view the data</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="developer wow fadeInLeft" data-wow-delay=".8s">
                        <img src="images/team/team-2.jpg" class="img-circle">
                        <h4>Aya Abdo</h4>
                        <b>Database Analyst</b>
                        <p>Database design and implementation, programming skills, database theory, critical thinking</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                
            </div>
            <!-- End row -->
            
        </div>
        <!-- End container -->
    
    </section>
<!-------------------------------------------- End team --------------------------------------------->
    

    <!-- -------------------------------------------------------------------------- -->
    
    <!-- ---------------------------------------------------------------------------- -->   

<!-- Start Contact Us-->
    <section class="contact-us text-center" id="contact">
    
            <!-- start container -->
            <div class="container">
                
                <h1 class="wow fadeInUp"> CONTACT </h1>
                    <p class="lead wow fadeInUp" data-wow-delay="0.4"> Lorem Ipsum passages, and more recently with desktop publishing software</p>
                
                <!-- start row -->
                <div class="row">
                    
                    <!-- start Contact Form -->
                        <form role="form" >
                            
                            <div class="first">
                            
                                    <!-- start first col-md-6 -->
                                    <div class="col-md-6">

                                        <div class="form-group wow fadeInUp" data-wow-delay="0.8s">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>

                                            <input type="text" class="form-control input-lg"                        placeholder="Full Name">
                                        </div>


                                        <div class="form-group wow fadeInUp" data-wow-delay="1.2s">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </span>

                                            <input type="email" class="form-control input-lg" placeholder="Email Address">
                                        </div>


                                        <div class="form-group wow fadeInUp" data-wow-delay="1.6s">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </span>

                                            <input type="number" class="form-control input-lg"                        placeholder="Phone Number">
                                        </div>

                                    </div>
                                    <!-- end First col-md-6 -->

                            
                            </div>
                            
                            <!-- start Second col-md-6 -->
                            <div class="col-md-6">
                                
                                <div class="form-group wow fadeInUp" data-wow-delay="2.4s">
                                    <textarea class="form-control input-lg" placeholder="Please Enter Your Message .... "></textarea>
                                </div>
                                
                                <button type="button" class="btn btn-danger btn-lg btn-block  wow fadeInUp"  data-wow-delay="2.9s">
                                        SUBMIT YOUR MESSAGE
                                </button>
                                
                            </div>
                            <!-- end second col-md-6 -->
                            
                        </form>
                    <!-- End Contact Form -->
                    
                </div>
                <!-- End Row -->
                
            </div>
         <!-- End Container -->
    
    </section>
<!-- End Contact Us -->

<!------------------------------------- Start login ----------------------------------------- -->  
    <div class="login">
            
            <div class="module modulehidden" id="modules">
                <i class="fa fa-close icon"  id="close" ></i>
                <div class="form">
                    <form action="login.php" method="POST"  >
                        <h3>Welcome Back!</h3>
                        <div class="form-group">
                            <input type="text" name="username" autocomplete="off" placeholder="Enter Email Address..." class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" autocomplete="new-password" placeholder="Password" class="form-control"/>
                        </div>
                        <input type="Checkbox"/>
                        <label>Remember Me </label>
                        <input type="submit" value="Login" name="login" class="btn btn-p"/>
                        <hr>
                        <input type="reset" value="Reset" class="btn btn-s"/>
                        <input type="button" value="Cancel" class="btn btn-d" id="cancel"/>
                    </form>
                </div>
            </div>
    </div>
<!-- ----------------------------------- End login ----------------------------------------- -->  
    
<?php
include $tpl . 'footer.inc';

?>
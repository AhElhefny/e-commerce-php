<div class="footer">
    <!-- Start footer -->
    <section class="footer">
        
            <!-- Start container -->
            <div class="container">
                
                <!-- Start Outer Row -->
                <div class="row">
                    
                    <div class="col-md-4 col-sm-6 foot">
                        
                        <h4>CONTACT US</h4>
                        
                        <p>
                            <i class="fa fa-home" aria-hidden="true"></i>
                            111 Main Street, Washington DC, 22222
                        </p>
                        
                        <p>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            info@media.com
                        </p>
                        
                        <p>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            +1 222 222 2222
                        </p>
                        
                        <p>
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            www.media.com
                        </p>
                        
                    </div>
                    
                    
                    
                    <div class="col-md-4 col-sm-6 foot">
                        
                        <h4>ABOUT</h4>
                        
                        <p><i class="fa fa-square-o" aria-hidden="true"></i> About Us</p>
                        <p><i class="fa fa-square-o" aria-hidden="true"></i> Privacy</p>
                        <p><i class="fa fa-square-o" aria-hidden="true"></i> Term &amp; Condition</p>
                        
                    </div>
                    
                    <hr class="visible-sm-block footer-hr"> 
                    
                    <div class="col-md-4 col-sm-12 foot">
                        
                        <h4>STAY IN TOUCH</h4>
                        
                        <i class="social fa fa-facebook" aria-hidden="true"></i>
                        <i class="social fa fa-twitter" aria-hidden="true"></i>
                        <i class="social fa fa-linkedin" aria-hidden="true"></i>
                        <i class="social fa fa-pinterest" aria-hidden="true"></i>
                        <i class="social fa fa-youtube" aria-hidden="true"></i>
                        <i class="social fa fa-github" aria-hidden="true"></i>
                        
                        <br>
                        
                        <input type="email" placeholder="Subscribe For Updates">
                        <button class="btn btn-success">Subscribe</button>
                        
                    </div>
                    
                    
                </div>
                <!-- End Outer Row -->
            
            </div>
            <!-- End Container -->
        
    </section>
    
</div>
<!-- End Footer -->

    <!-- ----------------------------Start Section Scroll Top------------------------- -->

       <div id="Scroll-top">
            <i class="fa fa-angle-up fa-2x"></i>
       </div>
       <!-- --------------------------End Section Scroll Top----------------------- -->

 <!-- ----------------------------Start Login popup ----------------------- -->     
<script>
        window.addEventListener('load',doItFirst);
       
        function doItFirst(){
             mod=document.getElementById('modules');
             exit=document.getElementById('close');
             exit.addEventListener('click',close);
             window.addEventListener('keyup',escape);
             logi=document.getElementById('btnlog');
             logi.addEventListener('click',show);
             btncancel=document.getElementById('cancel');
             btncancel.addEventListener('click',close);
        }
     
        function show(){
            mod.classList.remove('modulehidden');
            mod.classList.add('moduleshow');
        }

        function escape(e){
            if(e.key=='Escape')
            {
                close();
            }
            console.log(e.key);
        }

        function close(){
            mod.classList.remove('moduleshow');
            mod.classList.add('modulehidden');
        }
        
    </script>
   <!-- --------------------------End Login popup ----------------------- -->
    
<script src="<?php echo $js; ?>jquery-3.2.1.min.js"></script>
<script src="<?php echo $js; ?>jquery-ui.min.js"></script>
<script src="<?php echo $js; ?>jquery.selectBoxIt.min.js"></script>
<script src="<?php echo $js; ?>bootstrap.min.js"></script>
<!-- Slide Show images #Home  -->
<script src="<?php echo $js; ?>jquery.backstretch.min.js"></script>
<script src="<?php echo $js; ?>wow.min.js"></script>
<script src="<?php echo $js; ?>jquery.flexslider-min.js"></script>
    
<script type="text/javascript" src="<?php echo $js; ?>slick/slick.min.js"></script>
<script src="<?php echo $js; ?>lightgallery.min.js"></script>
<script src="<?php echo $js; ?>lg-fullscreen.min.js"></script>
<script src="<?php echo $js; ?>lg-hash.min.js"></script>
<script src="<?php echo $js; ?>lg-pager.min.js"></script>
<script src="<?php echo $js; ?>lg-share.min.js"></script>
<script src="<?php echo $js; ?>lg-thumbnail.min.js"></script>
<script src="<?php echo $js; ?>lg-zoom.min.js"></script>
<script>
        new WOW().init();
</script>

        <script src="<?php echo $js; ?>jquery.nicescroll.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="<?php echo $js; ?>plugin.js"></script>
<script src="<?php echo $js; ?>plugin1.js"></script>
<script src="<?php echo $js; ?>frontend.js"></script>

</body>
</html>
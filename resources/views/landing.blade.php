
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <!-- meta character set -->
        <meta charset="utf-8">
        <!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eGenset</title>      
        <!-- Meta Description -->
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS
        ================================================== -->
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        
        <!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="/assets/landing/css/font-awesome.min.css">
        <!-- bootstrap.min -->
        <link rel="stylesheet" href="/assets/landing/css/jquery.fancybox.css">
        <!-- bootstrap.min -->
        <link rel="stylesheet" href="/assets/landing/css/bootstrap.min.css">
        <!-- bootstrap.min -->
        <link rel="stylesheet" href="/assets/landing/css/owl.carousel.css">
        <!-- bootstrap.min -->
        <link rel="stylesheet" href="/assets/landing/css/slit-slider.css">
        <!-- bootstrap.min -->
        <link rel="stylesheet" href="/assets/landing/css/animate.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="/assets/landing/css/main.css">

        <style type="text/css">
            .bg-img-1 {
                background-image: url(images/{{ $data->banner_1 }});
            }
            .bg-img-2 {
                background-image: url(images/{{ $data->banner_2 }});
            }
            .bg-img-3 {
                background-image: url(images/{{ $data->banner_3 }});
            }

            .logos {

                width: 100px;
                height: 90px;
                margin-top: -35px;

            }
        </style>

        <!-- Modernizer Script for old Browsers -->
        <script src="/assets/landing/js/modernizr-2.6.2.min.js"></script>
        <style type="text/css">
            .btnLogin {
                background: #3498db;
                background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
                background-image: -moz-linear-gradient(top, #3498db, #2980b9);
                background-image: -ms-linear-gradient(top, #3498db, #2980b9);
                background-image: -o-linear-gradient(top, #3498db, #2980b9);
                background-image: linear-gradient(to bottom, #3498db, #2980b9);
                -webkit-border-radius: 28;
                -moz-border-radius: 28;
                border-radius: 28px;
                font-family: sans-serif;
                color: #ffffff;
                font-size: 20px;
                padding: 10px 20px 10px 20px;
                text-decoration: none;
                margin-top: 50px;
            }

            .btnLogin:hover {
              background: #3cb0fd;
              background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
              background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
              text-decoration: none;
            }
        </style>

    </head>
    
    <body id="body">

        <!-- preloader -->
        <div id="preloader">
            <div class="loder-box">
                <div class="battery"></div>
            </div>
        </div>
        <!-- end preloader -->

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <h1 class="navbar-brand">
                        <a href="#body"><img src="images/logoTLP.png" class="logos"></a>
                    </h1>
                    <!-- /logo -->
                </div>

                <!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="#body">Home</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#testimonials">About Us</a></li>
                        <!-- <li><a href="#testimonials">Testimonial</a></li>
                        <li><a href="#price">price</a></li> -->
                        <li><a href="#contact">Contact</a></li>
                        
                    </ul>
                    
                </nav>

                <div style="margin-top: 10px; margin-left: 1200px;">
                    <a href="{{ route('login') }}" class="btnLogin">Login</a>
                </div>

                <!-- /main nav -->
                
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
        
        <main class="site-content" role="main">
        
        <!--
        Home Slider
        ==================================== -->
        
        <section id="home-slider">
            <div id="slider" class="sl-slider-wrapper">

                <div class="sl-slider">
                
                    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

                        <div class="bg-img bg-img-1"></div>

                        <div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown"> {{ $data->text_1 }} </h2>
                                <!-- <span class="animated fadeInDown">Clean and Professional one page Template</span> -->
                                <!-- <a href="#" class="btn btn-blue btn-effect">Join US</a> -->
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    
                        <div class="bg-img bg-img-2"></div>
                        <div class="slide-caption">
                            <div class="caption-content">
                                <h2>{{ $data->text_2 }}</h2>
                                <!-- <span>Clean and Professional one page Template</span>
                                <a href="#" class="btn btn-blue btn-effect">Join US</a> -->
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                        
                        <div class="bg-img bg-img-3"></div>
                        <div class="slide-caption">
                            <div class="caption-content">
                                <h2>{{ $data->text_3 }}</h2>
                                <!-- <span>Clean and Professional one page Template</span>
                                <a href="#" class="btn btn-blue btn-effect">Join US</a> -->
                            </div>
                        </div>

                    </div>

                </div><!-- /sl-slider -->

                <!-- 
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>
                -->
                
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a href="javascript:;" class="sl-prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a href="javascript:;" class="sl-next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>
                

                <nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
                    <span class="nav-dot-current"></span>
                    <span></span>
                    <span></span>
                </nav>

            </div><!-- /slider-wrapper -->
        </section>
            
            
        <!-- Service section -->
        <section id="service">
            <div class="container">
                <div class="row">
                
                    <div class="sec-title text-center">
                        <h2 class="wow animated bounceInLeft">Service</h2>
                        <p class="wow animated bounceInRight">The Key Features of our Job</p>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                        <div class="service-item">
                            <!-- <div class="service-icon">
                                <i class="fa fa-home fa-3x"></i>
                            </div> -->
                            <h3>Support</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                        <div class="service-item">
                           <!--  <div class="service-icon">
                                <i class="fa fa-tasks fa-3x"></i>
                            </div> -->
                            <h3>Well Documented</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
                        <div class="service-item">
                            <!-- <div class="service-icon">
                                <i class="fa fa-clock-o fa-3x"></i>
                            </div> -->
                            <h3>Design UI/UX</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
                        <div class="service-item">
                            <!-- <div class="service-icon">
                                <i class="fa fa-heart fa-3x"></i>
                            </div> -->
                            
                            <h3>Web Security</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>                          
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- end Service section -->
        
        <!-- portfolio section -->
        <!-- <section id="portfolio">
            <div class="container">
                <div class="row">
                
                    <div class="sec-title text-center wow animated fadeInDown">
                        <h2>FEATURED PROJECTS</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    

                    <ul class="project-wrapper wow animated fadeInUp">
                        <li class="portfolio-item">
                            <img src="/assets/landing/img/portfolio/item.jpg" class="img-responsive" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat">
                            <figcaption class="mask">
                                <h3>Wall street</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
                            </figcaption>
                            <ul class="external">
                                <li><a class="fancybox" title="Araund The world" data-fancybox-group="works" href="img/portfolio/item.jpg"><i class="fa fa-search"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                            </ul>
                        </li>
                        
                        <li class="portfolio-item">
                            <img src="/assets/landing/img/portfolio/item2.jpg" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
                            <figcaption class="mask">
                                <h3>Wall street</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
                            </figcaption>
                            <ul class="external">
                                <li><a class="fancybox" title="Wall street" href="img/slider/banner.jpg" data-fancybox-group="works" ><i class="fa fa-search"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                            </ul>
                        </li>
                        
                        <li class="portfolio-item">
                            <img src="/assets/landing/img/portfolio/item3.jpg" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
                            <figcaption class="mask">
                                <h3>Wall street</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
                            </figcaption>
                            <ul class="external">
                                <li><a class="fancybox" title="Behind The world" data-fancybox-group="works" href="img/portfolio/item3.jpg"><i class="fa fa-search"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                            </ul>
                        </li>
                        
                        <li class="portfolio-item">
                            <img src="/assets/landing/img/portfolio/item4.jpg" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry.">
                            <figcaption class="mask">
                                <h3>Wall street</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
                            </figcaption>
                            <ul class="external">
                                <li><a class="fancybox" title="Wall street 4" data-fancybox-group="works" href="img/portfolio/item4.jpg"><i class="fa fa-search"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                            </ul>
                        </li>
                        
                        <li class="portfolio-item">
                            <img src="/assets/landing/img/portfolio/item5.jpg" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
                            <figcaption class="mask">
                                <h3>Wall street</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
                            </figcaption>
                            <ul class="external">
                                <li><a class="fancybox" title="Wall street 5" data-fancybox-group="works" href="img/portfolio/item5.jpg"><i class="fa fa-search"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                            </ul>
                        </li>
                        
                        <li class="portfolio-item">
                            <img src="/assets/landing/img/portfolio/item6.jpg" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
                            <figcaption class="mask">
                                <h3>Wall street</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
                            </figcaption>
                            <ul class="external">
                                <li><a class="fancybox" title="Wall street 6" data-fancybox-group="works" href="img/portfolio/item6.jpg"><i class="fa fa-search"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </section> -->
        <!-- end portfolio section -->
        
        <!-- Testimonial section -->
        <section id="testimonials" class="parallax">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                    
                        <div class="sec-title text-center white wow animated fadeInDown">
                            <h2>About Us</h2>
                        </div>

                        <p>{{ $data->about_us }}</p>
                        
                        <!-- <div id="testimonial" class=" wow animated fadeInUp">
                            <div class="testimonial-item text-center">
                                <img src="/assets/landing/img/member-1.jpg" alt="Our landings">
                                <div class="clearfix">
                                    <span>Katty Flower</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                            <div class="testimonial-item text-center">
                                <img src="/assets/landing/img/member-1.jpg" alt="Our landings">
                                <div class="clearfix">
                                    <span>Katty Flower</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                            <div class="testimonial-item text-center">
                                <img src="/assets/landing/img/member-1.jpg" alt="Our landings">
                                <div class="clearfix">
                                    <span>Katty Flower</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                        </div> -->
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- end Testimonial section -->
        
        <!-- Price section -->
        <!-- <section id="price">
            <div class="container">
                <div class="row">
                
                    <div class="sec-title text-center wow animated fadeInDown">
                        <h2>Price</h2>
                        <p>Our price for your company</p>
                    </div>
                    
                    <div class="col-md-4 wow animated fadeInUp">
                        <div class="price-table text-center">
                            <span>Silver</span>
                            <div class="value">
                                <span>$</span>
                                <span>24,35</span><br>
                                <span>month</span>
                            </div>
                            <ul>
                                <li>No Bonus Points</li>
                                <li>No Bonus Points</li>
                                <li>No Bonus Points</li>
                                <li>No Bonus Points</li>
                                <li><a href="#">sign up</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.4s">
                        <div class="price-table featured text-center">
                            <span>Gold</span>
                            <div class="value">
                                <span>$</span>
                                <span>50,00</span><br>
                                <span>month</span>
                            </div>
                            <ul>
                                <li>Free Trial</li>
                                <li>Free Trial</li>
                                <li>Free Trial</li>
                                <li>Free Trial</li>
                                <li><a href="#">sign up</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.8s">
                        <div class="price-table text-center">
                            <span>Diamond</span>
                            <div class="value">
                                <span>$</span>
                                <span>123,12</span><br>
                                <span>month</span>
                            </div>
                            <ul>
                                <li>All Bonus Points</li>
                                <li>All Bonus Points</li>
                                <li>All Bonus Points</li>
                                <li>All Bonus Points</li>
                                <li><a href="#">sign up</a></li>
                            </ul>
                        </div>
                    </div>
    
                </div>
            </div>
        </section> -->
        <!-- end Price section -->
        
        <!-- Social section -->
        <!-- <section id="social" class="parallax">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                    
                        <div class="sec-title text-center white wow animated fadeInDown">
                            <h2>FOLLOW US</h2>
                            <p>Beautifully simple follow buttons to help you get followers on</p>
                        </div>
                        
                        <ul class="social-button">
                            <li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-2x"></i></a></li>
                            <li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                            <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>                         
                        </ul>
                        
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end Social section -->
        
        <!-- Contact section -->
        <section id="contact" >
            <div class="container">
                <div class="row">
                    
                    <div class="sec-title text-center wow animated fadeInDown">
                        <h2>Contact</h2>
                        <p>Leave a Message</p>
                    </div>
                    
                    
                    <div class="col-md-7 contact-form wow animated fadeInLeft">
                        <form action="#" method="post">
                            <div class="input-field">
                                <input type="text" name="name" class="form-control" placeholder="Your Name...">
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" class="form-control" placeholder="Your Email...">
                            </div>
                            <div class="input-field">
                                <input type="text" name="subject" class="form-control" placeholder="Subject...">
                            </div>
                            <div class="input-field">
                                <textarea name="message" class="form-control" placeholder="Messages..."></textarea>
                            </div>
                            <button type="submit" id="submit" class="btn btn-blue btn-effect">Send</button>
                        </form>
                    </div>
                    
                    <div class="col-md-5 wow animated fadeInRight">
                        <address class="contact-details">
                            <h3>Contact Us</h3>                     
                            <p><i class="fa fa-pencil"></i>{{ $data->address }}</p><br>
                            <!-- <p><i class="fa fa-pencil"></i>Phoenix Inc.<span>PO Box 345678</span> <span>Little Lonsdale St, Melbourne </span><span>Australia</span></p><br> -->
                            <p><i class="fa fa-phone"></i>Phone: {{ $data->phone }} </p>
                            <p><i class="fa fa-envelope"></i>{{ $data->website }}</p>
                        </address>
                    </div>
        
                </div>
            </div>
        </section>
        <!-- end Contact section -->
        
        <section id="google-map">
            <div id="map-canvas" class="wow animated fadeInUp"></div>
        </section>
        
        </main>
        
        <footer id="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="footer-content">
                        <div class="wow animated fadeInDown">
                            <p>newsletter signup</p>
                            <p>Get Cool Stuff! We hate spam!</p>
                        </div>
                        <form action="#" method="post" class="subscribe-form wow animated fadeInUp">
                            <div class="input-field">
                                <input type="email" class="subscribe form-control" placeholder="Enter Your Email...">
                                <button type="submit" class="submit-icon">
                                    <i class="fa fa-paper-plane fa-lg"></i>
                                </button>
                            </div>
                        </form>
                        <div class="footer-social">
                            <ul>
                                <li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-3x"></i></a></li>
                                <li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
                                <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
                                <li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-dribbble fa-3x"></i></a></li>
                                <li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="#"><i class="fa fa-youtube fa-3x"></i></a></li>
                            </ul>
                        </div>
                        
                        <p>Copyright &copy; 2014-2015 Design and Developed By<a href="http://www.themefisher.com">Themefisher</a> </p>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Essential jQuery Plugins
        ================================================== -->
        <!-- Main jQuery -->
        <script src="/assets/landing/js/jquery-1.11.1.min.js"></script>
        <!-- Twitter Bootstrap -->
        <script src="/assets/landing/js/bootstrap.min.js"></script>
        <!-- Single Page Nav -->
        <script src="/assets/landing/js/jquery.singlePageNav.min.js"></script>
        <!-- jquery.fancybox.pack -->
        <script src="/assets/landing/js/jquery.fancybox.pack.js"></script>
        <!-- Google Map API -->
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <!-- Owl Carousel -->
        <script src="/assets/landing/js/owl.carousel.min.js"></script>
        <!-- jquery easing -->
        <script src="/assets/landing/js/jquery.easing.min.js"></script>
        <!-- Fullscreen slider -->
        <script src="/assets/landing/js/jquery.slitslider.js"></script>
        <script src="/assets/landing/js/jquery.ba-cond.min.js"></script>
        <!-- onscroll animation -->
        <script src="/assets/landing/js/wow.min.js"></script>
        <!-- Custom Functions -->
        <script src="/assets/landing/js/main.js"></script>
    </body>
</html>
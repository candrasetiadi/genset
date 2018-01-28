<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>E-Genset</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="/assets/landing-2/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/landing-2/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="/assets/landing-2/css/jcarousel.css" rel="stylesheet" />
<link href="/assets/landing-2/css/flexslider.css" rel="stylesheet" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="et-line-font/style.css" />
<!--[if lte IE 7]><script src="lte-ie7.js"></script><![endif]-->
<link href="/assets/landing-2/css/style.css" rel="stylesheet" />
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style type="text/css">
    .logos {

                width: 100px;
                height: 90px;
                margin-top: -35px;

            }
</style>
</head>
<body>
<div id="wrapper" class="home-page">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <a class="navbar-brand pull-left" href="{{ url('/') }}"><img src="images/logoTLP.png" alt="logo" class="logos" /></a>
        <p class="pull-right"><i class="fa fa-phone"></i> Tel No. (021) 4352581</p>
      </div>
    </div>
  </div>
</div>
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li> 
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="{{ url('service') }}">Services</a></li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        <li><a href="{{ url('admin') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <section id="banner">
     
    <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="images/{{ $data->banner_1 }}" alt="" />
                <!-- <div class="flex-caption">
                    <h3>Cloud Hosting</h3> 
                    <p>Doloribus perferquam</p> 
                     
                </div> -->
              </li>
              <li>
                <img src="images/{{ $data->banner_2 }}" alt="" />
                <!-- <div class="flex-caption">
                    <h3>Fiber Internet</h3> 
                    <p>Consectetur  provident</p> 
                     
                </div> -->
              </li>
            </ul>
        </div>
    <!-- end slider -->
 
    </section> 
    <section id="call-to-action-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aligncenter">
                    <h3>Welcome to PT. Transporindo Lima Perkasa</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti.</p> -->
                    
                </div> 
            </div>
        </div>
    </section>
    
    
    
    <section class="section-padding gray-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-6 text-center wow fadeInLeft animated" data-wow-animation-name="fadeInLeft">
            <img src="/assets/landing-2/img/server.png" alt="">
          </div>
          <div class="col-lg-6 col-sm-6 wow fadeInRight animated" data-wow-animation-name="fadeInRight">
            <h2>
              Our Features
            </h2>
            <hr>
            <p> 
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.
            </p>
            <p> 
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.
            </p>
            <p> 
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.
            </p>
            <hr>
            <a href="javascript:;" class="lineBtn">
              Request Quote
            </a>
          </div>
        </div>
      </div>
    </section>
    
        
    


    <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Our Contact</h5>
                    <address>
                    <strong>PT. Transporindo Lima Perkasa</strong><br>
                    Jl. Enggano 94-D Tanjung Priok<br>
                    Jakarta Utara, DKI Jakarta<br>
                    RT.8 / RW.16, Tj. Priok, Kota Jakarta Utara, <br>
                    Daerah Khusus Ibukota Jakarta 14310
                    </address>
                    <p>
                        <i class="icon-phone"></i> (021) 4352581 <br>
                        <i class="icon-envelope-alt"></i> admin@e-gensetlp.com
                    </p>
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Quick Links</h5>
                    <ul class="link-list">
                        <li><a href="#">Latest Events</a></li>
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div> -->
            <!-- <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="link-list">
                        <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                        <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                        <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Recent News</h5>
                    <ul class="link-list">
                        <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                        <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                        <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; PT. Transporindo Lima Perkasa 2018 All right reserved. </span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <ul class="social-network">
                        <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/landing-2/js/jquery.js"></script>
<script src="/assets/landing-2/js/jquery.easing.1.3.js"></script>
<script src="/assets/landing-2/js/bootstrap.min.js"></script>
<script src="/assets/landing-2/js/jquery.fancybox.pack.js"></script>
<script src="/assets/landing-2/js/jquery.fancybox-media.js"></script>  
<script src="/assets/landing-2/js/jquery.flexslider.js"></script>
<script src="/assets/landing-2/js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="/assets/landing-2/js/modernizr.custom.js"></script>
<script src="/assets/landing-2/js/jquery.isotope.min.js"></script>
<script src="/assets/landing-2/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/landing-2/js/animate.js"></script>
<script src="/assets/landing-2/js/custom.js"></script>
<script src="/assets/landing-2/js/owl-carousel/owl.carousel.js"></script>
<script>
$(document).ready(function() {
  //carousel options
  $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});
</script>
</body>
</html>
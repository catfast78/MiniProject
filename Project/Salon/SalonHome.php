<!-- 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="../Guest/Login.php">Logout</a>
<table width="200" border="1" align="center">
  <tr>
  </tr>
  <tr>
    <td><a href="service.php">Service</a></td>
  </tr>
  <tr>
    <td> <a href="staff.php"> View Salons</a></td>
  </tr>
  <tr>
    <td> </td>
  </tr>
  <tr>
    <td> <a href="viewbooking.php">Bookings</a></td>
  </tr>
  <tr>
    <td><a href="viewcomplaint.php">Complaints</a>;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html> -->

<?php
include("SessionValidation.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Salon Home  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="../Assets/Templates/Main/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/magnific-popup.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/jquery-ui.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../Assets/Templates/Main/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="../Assets/Templates/Main/css/aos.css">

    <link rel="stylesheet" href="../Assets/Templates/Main/css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    



    <header class="site-navbar py-1" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2" data-aos="fade-down">
            <h1 class="mb-0"><a href="SalonHome.php" class="text-black h2 mb-0">Hairsal</a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="has-children active">
                  
                   
                     
                    
                </li>
                <li class="has-children">
                  <a href="service.php">Services</a>
                   
                </li>
                <li><a href="viewbooking.php">View Bookings</a></li>
                <li><a href="viewcomplaint.php">View Complaints</a></li>

                 
                <li><a href="Logout.php">Logout</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <!-- <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3 text-black"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-youtube-play"></span></a>
                </li>
              </ul>
            </div> -->

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

  

   

    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover" style="background-image: url(../Assets/Templates/Main/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h5 class="text-white font-weight-light text-uppercase">Welcome to Hairsal</h5>
              <h2 class="text-white font-weight-light mb-2 display-1">Hair Salon Expert</h2>

             </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover" style="background-image: url(../Assets/Templates/Main/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-2 display-1">Beautiful Hair, Healthy You!</h2>

             </div>
          </div>
        </div>
      </div>  

    </div>


    <!--<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 text-center">
            <h3 class="line-height-1 mb-3"><span class="d-block display-4 line-height-1 text-black">Welcome to</span> <span class="d-block display-4 line-height-1"><em class="text-primary font-weight-bold">Hair Salon</em></span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt architecto ab hic rem placeat eius commodi eum eligendi recusandae sed qui cumque quibusdam.</p>
            <p><a href="#"><small class="text-uppercase font-weight-bold">Read More</small></a></p>
          </div>
          <div class="col-md-6 col-lg-4">
            <figure class="h-100 hover-bg-enlarge">
              <div class="bg-image h-100 bg-image-md-height" style="background-image: url('../Assets/Templates/Main/images/img_2.jpg');"></div>
            </figure>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="border p-4 d-flex align-items-center justify-content-center h-100">
              <div class="text-center">
                <h2 class="text-primary h2 mb-5">Opening Hours</h2>
                <p class="mb-4">
                  <span class="d-block font-weight-bold">Mon – Fri </span>
                  10:00 AM – 8:30 PM
                </p>

                <p class="mb-4">
                  <span class="d-block font-weight-bold">Saturday</span>
                  Closed
                </p>

                <p class="mb-4">
                  <span class="d-block font-weight-bold">Sunday</span>
                  10:00 AM – 8:30 PM
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="site-section-heading font-weight-light text-black text-center">Featured Services</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-razor display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">Barber Razor</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum exercitationem quae id dolorum debitis.</p>
              <p><strong class="font-weight-bold text-primary">$29</strong></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-location-pin display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">Location Pin</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum exercitationem quae id dolorum debitis.</p>
              <p><strong class="font-weight-bold text-primary">$46</strong></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-shave display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">Barber Shave</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum exercitationem quae id dolorum debitis.</p>
              <p><strong class="font-weight-bold text-primary">$24</strong></p>
            </div>
          </div>

        </div>
      </div> 
    </div>-->

    <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <img src="images/person_1.jpg" alt="Image" class="img-md-fluid">
          </div>
          <div class="col-lg-6 bg-white p-md-5 align-self-center">
            <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">New hairstyle!</h2>
            <p class="text-black lead"><em>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</em></p>
            <p class="lead text-black">&mdash; <em>Stellla Martin</em></p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(../Assets/Templates/Main/images/hero_bg_2.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-5 display-3">Experience Our Outstanding Services</h2>
            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-single-big d-inline-block popup-vimeo"><span class="icon-play"></span></a>
          </div>
        </div>
      </div>
    </div>   -->

    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
           <!-- <div class="mb-5">
              <h3 class="footer-heading mb-4">About Hairsal</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>-->

            
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <!--<h3 class="footer-heading mb-4">Quick Menu</h3>-->
              </div>
              <div class="col-md-6 col-lg-6">
                
              </div>
              <div class="col-md-6 col-lg-6">
               <!-- <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Membership</a></li>
                </ul>-->
              </div>
            </div>

            

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
           

            <div class="mb-5">
              <!--<h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit minima minus odio.</p>

              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                  </div>
                </div>
              </form>-->

            </div>

          </div>
          
        </div>
        <!--<div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-5">
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>-->

            <p class="text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved |         
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="../Assets/Templates/Main/js/jquery-3.3.1.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery-ui.js"></script>
  <script src="../Assets/Templates/Main/js/popper.min.js"></script>
  <script src="../Assets/Templates/Main/js/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Main/js/owl.carousel.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.stellar.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.countdown.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.magnific-popup.min.js"></script>
  <script src="../Assets/Templates/Main/js/bootstrap-datepicker.min.js"></script>
  <script src="../Assets/Templates/Main/js/aos.js"></script>

  <script src="../Assets/Templates/Main/js/main.js"></script>
    
  </body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>ThinkKosovo</title>

    <!-- Main CSS-->

    <link href="<?php echo asset_url()."css/theme.css";?>" rel="stylesheet" media="all">

    <!-- Fontfaces CSS-->
    <link href="<?php echo asset_url()."css/font-face.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/font-awesome-4.7/css/font-awesome.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/font-awesome-5/css/fontawesome-all.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/fontawesome-pro-5.8.2-web/css/fontawesome.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/fontawesome-pro-5.8.2-web/css/fontawesome.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/fontawesome-pro-5.8.2-web/css/all.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/mdi-font/css/material-design-iconic-font.min.css";?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo asset_url()."vendor/bootstrap-4.1/bootstrap.min.css";?>" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/5.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <!-- Vendor CSS-->
    <link href="<?php echo asset_url()."vendor/animsition/animsition.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/wow/animate.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/css-hamburgers/hamburgers.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/slick/slick.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/select2/select2.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/perfect-scrollbar/perfect-scrollbar.css";?>" rel="stylesheet" media="all">

    <style>
    input[type=datetime-local]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}

    </style>
</head>

<body class="animsition">
      <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">

                        <a class="logo" href="<?php echo base_url().'home'; ?>">

                            <img src="<?php echo asset_url()."images/icon/login2.png";?>" alt="thinkkosovo" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-history" aria-hidden="true"></i>Map</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                              <li>
                                  <a href="<?php echo base_url().'museum'; ?>"><i class="fas fa-archway"></i>Museum</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url().'nature'; ?>"><i class="fas fa-tree"></i>Nature</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url().'history'; ?>"><i class="fas fa-monument"></i>History</a>
                              </li>

                            </ul>
                        </li>

                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-heart"></i>Fan</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                  <a href="<?php echo base_url().'fanstory'; ?>"><i class="fas fa-sticky-note"></i>Fan Story</a>
                                </li>

                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                  <i class="fas fa-camera-retro"></i>Gallery</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                  <a href="<?php echo base_url().'photo'; ?>"><i class="far fa-images"></i>Photo</a>
                                </li>

                            </ul>
                        </li> -->


                    <li class="has-sub">
                     <a class="js-arrow" href="#">
                      <i class="far fa-calendar-alt"></i>Events</a>
                         <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                      <li>
                      <a href="<?php echo base_url().'event'; ?>"><i class="fal fa-calendar-day"></i>Event</a>
                      </li>
                       </ul>
                    </li>

                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-compass"></i>Explore</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                          <li>
                              <a href="<?php echo base_url().'place'; ?>"><i class="fas fa-hotel"></i>Place</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url().'food'; ?>"><i class="fas fa-utensils-alt"></i>Food</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url().'coffe'; ?>"><i class="fas fa-coffee-togo"></i>Coffe</a>
                          </li>

                          <li>
                              <a href="<?php echo base_url().'taxi'; ?>"><i class="fas fa-taxi"></i>Taxi</a>
                          </li>

                          <li>
                              <a href="<?php echo base_url().'travelagency'; ?>"><i class="fas fa-bus"></i>Travel Agency</a>
                          </li>

                          <li>
                                <a href="<?php echo base_url().'rent'; ?>"><i class="fas fa-car"></i>Rent</a>
                          </li>

                        </ul>
                    </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo base_url().'home'; ?>">

                    <img src="<?php echo asset_url()."images/icon/logo-ks3.png";?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-map-marker-alt"></i>Map</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                              <li>
                                  <a href="<?php echo base_url().'museum'; ?>"><i class="fas fa-archway"></i>Museum</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url().'nature'; ?>"><i class="fas fa-tree"></i>Nature</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url().'history'; ?>"><i class="fas fa-monument"></i>History</a>
                              </li>

                            </ul>
                        </li>

                        <!-- <li class="has-sub">
                          <a class="js-arrow" href="#">
                         <i class="fas fa-heart"></i>Fan</a>
                               <ul class="list-unstyled navbar__sub-list js-sub-list">
                                   <li>
                                       <a href="<?php echo base_url().'fanstory'; ?>"><i class="fas fa-sticky-note"></i>Fan Story</a>
                                   </li>
                                 </ul>
                       </li>

                       <li class="has-sub">
                         <a class="js-arrow" href="#">
                       <i class="fas fa-camera-retro"></i>Gallery</a>
                              <ul class="list-unstyled navbar__sub-list js-sub-list">
                                  <li>
                                      <a href="<?php echo base_url().'photo'; ?>"><i class="far fa-images"></i>Photo</a>
                                  </li>
                                </ul>
                      </li> -->

                      <li class="has-sub">
                        <a class="js-arrow" href="#">
                      <i class="far fa-calendar-alt"></i>Events</a>
                             <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li>
                                     <a href="<?php echo base_url().'event'; ?>"><i class="fal fa-calendar-day"></i>Event</a>
                                 </li>
                               </ul>
                     </li>

                     <li class=" has-sub">
                         <a class="js-arrow" href="#">
                         <i class="fas fa-compass"></i>Explore</a>
                         <ul class="list-unstyled navbar__sub-list js-sub-list">
                           <li>
                               <a href="<?php echo base_url().'place'; ?>"><i class="fas fa-hotel"></i>Place</a>
                           </li>
                           <li>
                               <a href="<?php echo base_url().'food'; ?>"><i class="fas fa-utensils-alt"></i>Food</a>
                           </li>
                           <li>
                               <a href="<?php echo base_url().'coffe'; ?>"><i class="fas fa-coffee-togo"></i>Coffe</a>
                           </li>

                           <li>
                               <a href="<?php echo base_url().'taxi'; ?>"><i class="fas fa-taxi"></i>Taxi</a>
                           </li>

                           <li>
                               <a href="<?php echo base_url().'travelagency'; ?>"><i class="fas fa-bus"></i>Travel Agency</a>
                           </li>

                           <li>
                                 <a href="<?php echo base_url().'rent'; ?>"><i class="fas fa-car"></i>Rent</a>
                           </li>

                         </ul>

                     </li>

                    </ul>
                </nav>
            </div>
        </aside>

</body>

</html>

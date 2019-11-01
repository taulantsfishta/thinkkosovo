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
    <title>Think Kosovo</title>

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



</head>

<body class="animsition">


        <!-- PAGE CONTAINER-->
        <div class="page-container" >
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo asset_url()."images/icon/user_login.jpg";?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $username; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="<?php echo base_url().'home'; ?>">
                                                        <img src="<?php echo asset_url()."images/icon/user_login.jpg";?>" alt="<?php echo $username; ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="<?php echo base_url().'home'; ?>"><?php echo $username; ?></a>
                                                    </h5>
                                                    <!-- <span class="email">johndoe@example.com</span> -->
                                                </div>
                                            </div>
      

                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url().'logout'; ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
              <div class='imgbox'>
                <img class="center-fit" src="<?php echo asset_url()."images/icon/home_photo5.jpg";?>" alt="" />
              </div>

            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->


    <script src="<?php echo asset_url().'vendor/jquery-3.2.1.min.js';?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo asset_url().'vendor/bootstrap-4.1/popper.min.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/bootstrap-4.1/bootstrap.min.js';?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo asset_url().'vendor/slick/slick.min.js';?>">
    </script>
    <script src="<?php echo asset_url().'vendor/wow/wow.min.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/animsition/animsition.min.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/bootstrap-progressbar/bootstrap-progressbar.min.js';?>">
    </script>
    <script src="<?php echo asset_url().'vendor/counter-up/jquery.waypoints.min.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/counter-up/jquery.counterup.min.js';?>">
    </script>
    <script src="<?php echo asset_url().'vendor/circle-progress/circle-progress.min.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/perfect-scrollbar/perfect-scrollbar.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/chartjs/Chart.bundle.min.js';?>"></script>
    <script src="<?php echo asset_url().'vendor/select2/select2.min.js';?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo asset_url().'js/main.js';?>"></script>

</body>

</html>
<!-- end document-->

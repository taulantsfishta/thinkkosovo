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
    <title>Think Kosovo Login</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo asset_url()."css/theme.css";?>" rel="stylesheet" media="all">

    <!-- Fontfaces CSS-->
    <link href="<?php echo asset_url()."css/font-face.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/font-awesome-4.7/css/font-awesome.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/font-awesome-5/css/fontawesome-all.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/mdi-font/css/material-design-iconic-font.min.css";?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo asset_url()."vendor/bootstrap-4.1/bootstrap.min.css";?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo asset_url()."vendor/animsition/animsition.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/wow/animate.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/css-hamburgers/hamburgers.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/slick/slick.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/select2/select2.min.css";?>" rel="stylesheet" media="all">
    <link href="<?php echo asset_url()."vendor/perfect-scrollbar/perfect-scrollbar.css";?>" rel="stylesheet" media="all">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5 " style="background-image: url('<?php echo asset_url()."images/icon/home_photo5.jpg";?>');background-repeat: no-repeat;background-attachment: fixed;
        background-size: cover;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                        </div>
                        <div class="login-form">
                            <form action="<?php echo base_url()."login_validation" ?>" method="post">
                                <div class="form-group">
                                    <span class='text_danger' style="color:white;"><?php echo $this->session->flashdata('error'); ?></span>
                                    <div class="inner-addon left-addon">
                                      <i class="glyphicon glyphicon-user"></i>
                                      <input class="au-input1 au-input--full" type="text" name="username" placeholder="Username" pattern='.{3,20}' required title='3 to 20 characters'>
                                    </div>
                                    <span class='text_danger' style="color:white;"><?php echo form_error('username'); ?></span>
                                </div>
                                <div class="form-group">
                                      <div class="inner-addon left-addon">
                                      <i class="glyphicon glyphicon-lock"></i>
                                      <input class="au-input1 au-input--full" type="password" name="password" placeholder="Password" pattern='.{3,20}' required title='3 to 20 characters'>
                                    </div>     
                                    <span class='text_danger' style="color:white;"><?php echo form_error('password'); ?></span>
                                </div>

                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Sign In</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

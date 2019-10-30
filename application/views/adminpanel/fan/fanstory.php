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
    <title>Fan Story</title>

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
    input[type=date]::-webkit-inner-spin-button {
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

                            <img src="<?php echo asset_url()."images/icon/logo-ks3.png";?>" alt="CoolAdmin" />
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
                                <i class="fas fa-history" aria-hidden="true"></i>History & Culture</a>
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

                        <li class="has-sub">
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
                                  <a href="<?php echo base_url().'fanstory'; ?>"><i class="far fa-images"></i>Photo</a>
                                </li>

                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                  <i class="far fa-calendar-alt"></i>Event</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                  <a href="<?php echo base_url().'event'; ?>"><i class="fal fa-calendar-day"></i>Event</a>
                                </li>

                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                  <i class="fas fa-bus"></i>I need</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                              <li>
                                  <a href="<?php echo base_url().'hotel'; ?>"><i class="fas fa-hotel"></i>Hotel</a>
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
                             <i class="fas fa-history" ></i>History & Culture</a>
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

                        <li class="has-sub">
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
                                      <a href="<?php echo base_url().'fanstory'; ?>"><i class="far fa-images"></i>Photo</a>
                                  </li>
                                </ul>
                      </li>

                      <li class="has-sub">
                        <a class="js-arrow" href="#">
                      <i class="far fa-calendar-alt"></i>Event</a>
                             <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li>
                                     <a href="<?php echo base_url().'event'; ?>"><i class="fal fa-calendar-day"></i>Event</a>
                                 </li>
                               </ul>
                     </li>

                     <li class=" has-sub">
                         <a class="js-arrow" href="#">
                         <i class="fas fa-bus"></i>I need</a>
                         <ul class="list-unstyled navbar__sub-list js-sub-list">
                           <li>
                               <a href="<?php echo base_url().'hotel'; ?>"><i class="fas fa-hotel"></i>Hotel</a>
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
        <!-- END MENU SIDEBAR-->

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
              <div class='container'>
                <div class="row">
                  <div class="col-md-6">
                    <div class="login-form">
                      <p  style="text-align:center;font-size:25px;">
                        Register new fan's story
                      </p>
                        <span class='col-md-12' style="color:#63C76A;font-size:20px;"><?php echo $return_message;?></span>
                        <form action="<?php echo base_url()."register_fanstory/Fanstory" ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="name" placeholder="Fan name">
                                  <span class='text_danger' style="color:red;"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group">
                              <input class="au-input au-input--full" type="text" name="surename" placeholder="Fan surename">
                                <span class='text_danger' style="color:red;"><?php echo form_error('surename'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="title" placeholder="Title (TRINGA STORY)">
                                <span class='text_danger' style="color:red;"><?php echo form_error('title'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="tags" placeholder="Tags (#rugovamountains)">
                                <span class='text_danger' style="color:red;"><?php echo form_error('tags'); ?></span>
                            </div>

                            <div class="form-group">
                              <textarea class="au-input au-input--full" style ="width:100%;"  name="story" placeholder="Story..."></textarea>
                              <span class='text_danger' style="color:red;"><?php echo form_error('story'); ?></span>
                            </div>
                            <div class="form-group">
                                <input placeholder="Date Trip" class="au-input au-input--full" type="text" onfocus="(this.type='date')"  id="date" name="date_trip" />
                                <span class='text_danger' style="color:red;"><?php echo form_error('date_trip'); ?></span>
                            </div>
                           <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="location_trip" placeholder="Location Trip (Prishtine..)">
                                <span class='text_danger' style="color:red;"><?php echo form_error('location_trip'); ?></span>
                            </div>

                            <div class="form-group">
                                <input class="upload_image" type="file" name="image_trip" placeholder="Trip Image" >
                            </div>
                            <span class='text_danger' style="color:red;"><?php echo $error_message; ?></span>
                            <div class="register-link">
                                <p>
                                  <button class="au-btn au-btn--block au-btn--green m-b-10" type="submit">Save</button>

                                </p>
                            </div>
                        </form>
                 </div>
                </div>
                <div class="col-md-6">
                  <div class='container'>
                    <br /><br />
                    <div class='row'>
                      <div class='col-md-6'>
                          <div class="image">
                          <img src="<?php echo asset_url()."images/icon/fanstory.png";?>" alt="history&culture" />
                          </div>
                      </div>
                      <div class='col-md-6'>
                        <div class="image">
                        <img src="<?php echo asset_url()."images/icon/fanstory1.png";?>" alt="history&culture" />
                        </div>
                      </div>

                    </div>

                  </div>

                </div>
              </div>
              <div>
             </div>
            </div>
            <br />

            <div class='container'>
              <span class='text_danger' style="color:#63C76A;font-size:20px;"><?php echo $message_deleted;?></span>
              <div class='row'>
                <div class='col-md-12'>
                  <table id="example" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

                    <thead>
                      <tr>
                        <th class="th-sm">Fan Name

                        </th>
                        <th class="th-sm">Title

                        </th>
                        <th class="th-sm">Date trip

                        </th>
                        <th class="th-sm">Location Trip

                        </th>
                        <th class="th-sm">Info. Added Date

                        </th>
                        <th class="th-sm">Delete
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($table_data[0]['id'] != ''){
                        foreach ($table_data as $key => $value) {
                          echo
                           "<tr>
                            <td>".$value['name'].' '.$value['surename']."</td>
                            <td>".$value['title']."</td>
                            <td>".$value['date_trip']."</td>
                            <td>".$value['location_trip']."</td>
                            <td>".$value['created_at']."</td>
                            <form action=".base_url().'deletefanstorydata/Fanstory'." method='post' onsubmit='return ConfirmDelete()'>
                            <td style='  background-color:#d11a2a;'><button type='submit' name='id' value=".$value['id']."><span style=font-weight:bold;;color:white;'>Delete</span></button></td>
                            </form>
                          </tr>";
                        }
                      }else{
                        echo
                         "<tr>
                          <td class='hidden'>a</td>
                          <td class='hidden'>a</td>
                          <td class='hidden'>a</td>
                          <td class='hidden'>a</td>
                          <td class='hidden'>a</td>
                          <td class='hidden'>a</td>
                        </tr>";
                      }
                      ?>
                      </form>
                    </tbody>
                    <!-- <tfoot>
                      <tr>
                        <th class="th-sm">Museum Name

                        </th>
                        <th class="th-sm">Location

                        </th>
                        <th class="th-sm">Address

                        </th>
                        <th class="th-sm">Work Time

                        </th>
                        <th class="th-sm">Date Added Info

                        </th>
                        <th class="th-sm">Delete
                        </th>
                      </tr>
                    </tfoot> -->

                  </table>

                </div>

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
    <script src="<?php echo asset_url().'vendor/select2/select2.min.js';?>"></script>
    <script src="<?php echo asset_url().'js/main.js';?>"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://jsfiddle.net/u9d1ewsh/"></script> -->
    <script >
    // Basic example
    $(document).ready(function(){
         $('#example').after('<div id="nav_1"></div>');
         var rowsShown = 10;
         var rowsTotal = $('#example tbody tr').length;
         var numPages = rowsTotal/rowsShown;
         for(i = 0;i < numPages;i++) {
             var pageNum = i + 1;
             $('#nav_1').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
         }
         $('#example tbody tr').hide();
         $('#example tbody tr').slice(0, rowsShown).show();
         $('#nav_1 a:first').addClass('active');
         $('#nav_1 a').bind('click', function(){

             $('#nav_1 a').removeClass('active');
             $(this).addClass('active');
             var currPage = $(this).attr('rel');
             var startItem = currPage * rowsShown;
             var endItem = startItem + rowsShown;
             $('#example tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                     css('display','table-row').animate({opacity:1}, 300);
         });
     });
    </script>

    <script>
        function ConfirmDelete()
        {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
          return false;
        }
    </script>


</body>

</html>
<!-- end document-->

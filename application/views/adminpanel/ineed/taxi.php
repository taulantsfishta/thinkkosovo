<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

   <style type="text/css">
      .main-section{
          margin:0 auto;
          padding: 15px;
          margin-top: 20px;
          background-color: #F5F5F5;
          box-shadow: 0px 0px 20px #e5e5e5;
          height:auto;

      }

  </style>
    <style>
    input[type=datetime-local]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    }
    </style>
</head>

<body class="animsition" onload="messageBox()">

        <!-- PAGE CONTAINER-->
        <div class="page-container" >
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
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
                        Register new taxi
                      </p>
                        <span class='col-md-12' style="color:#63C76A;font-size:20px;"><?php echo $return_message;?></span>
                        <form action="<?php echo base_url()."register_taxi/Taxi" ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <select required id="sel1"  class="selectform"  name='city'>
                                <option value="" selected disabled>Select City</option>
                                <option value='Gjakovë'>Gjakovë</option>
                                <option value='Mitrovicë e Jugut'>Mitrovicë e Jugut</option>
                                <option value='Pejë'>Pejë</option>
                                <option value='Prizren'>Prizren</option>
                                <option value='Prishtinë'>Prishtinë</option>
                                <option value='Vushtrri'>Vushtrri</option>
                                <option value='Gjilan'>Gjilan</option>
                                <option value='Ferizaj'>Ferizaj</option>
                              </select>
                              <span class='text_danger' style="color:red;"><?php echo form_error('city'); ?></span>
                            </div>
                            <div class="form-group">
                            <input class="au-input au-input--full" type="text" name="name" placeholder="Taxi Name" pattern='.{3,100}' required title='3 to 100 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="telephone" placeholder="Telephone" pattern='.{9,100}' required title='9 to 100 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('telephone'); ?></span>
                            </div>
                              <div class="form-group">
                              <select required id="sel1"  class="selectform"  name='stars'>
                                <option value='' selected disabled>What's the rating? Select</option>
                                <option value='8.0'>8.0</option>
                                <option value='8.1'>8.1</option>
                                <option value='8.2'>8.2</option>
                                <option value='8.3'>8.3</option>
                                <option value='8.4'>8.4</option>
                                <option value='8.5'>8.5</option>
                                <option value='8.6'>8.6</option>
                                <option value='8.7'>8.7</option>
                                <option value='8.8'>8.8</option>
                                <option value='8.9'>8.9</option>
                                <option value='9.0'>9.0</option>
                                <option value='9.1'>9.1</option>
                                <option value='9.2'>9.2</option>
                                <option value='9.3'>9.3</option>
                                <option value='9.4'>9.4</option>
                                <option value='9.5'>9.5</option>
                                <option value='9.6'>9.6</option>
                                <option value='9.7'>9.7</option>
                                <option value='9.8'>9.8</option>
                                <option value='9.9'>9.9</option>
                                <option value='10.0'>10.0</option>
                              </select>
                              <span class='text_danger' style="color:red;"><?php echo form_error('stars'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="type_ineed" value="Taxi" hidden>
                                <span class='text_danger' style="color:red;"><?php echo form_error('type_ineed'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="upload_image" type="file" name="image" placeholder="Place Image" required>
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
                      <div class='col-md-2'>

                      </div>
                      <div class='col-md-8'>
                          <div class="image">
                          <img src="<?php echo asset_url()."images/icon/taxi.png";?>" alt="taxi" />
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
                        <th class="th-sm">Taxi Name</th>
                        <th class="th-sm">City</th>
                        <th class="th-sm">Rating</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($table_data[0]['id'] != ''){
                        foreach ($table_data as $key => $value) {
                          echo
                           "<tr>
                            <td>".$value['name']."</td>
                            <td>".$value['city']."</td>
                            <td>".$value['stars']."</td>
                            <td style='background-color:#63c76a;' >
                            <button type='button' data-toggle='modal' data-target='#myModal".$key."' style='outline:none;'><span style='font-weight:bold;color:white;'>Edit</span></button>
                                <div class='container'>
                                  <!-- Modal -->
                                  <div class='modal fade' id='myModal".$key."' role='dialog'>
                                    <div class='modal-dialog'>
                                      <div class='modal-content'>
                                        <div class='modal-body'>
                                        <p  style='text-align:center;font-size:25px;'>
                                          Update the taxi
                                        </p>
                                          <form action=".base_url().'updatetaxidata/Taxi'." method='post' enctype='multipart/form-data''>
                                                <div class='form-group'>
                                                <input class='au-input au-input--full' type='text' name='idupdate' value=".$value['id']." hidden>
                                                </div>
                                                <div class='form-group'>
                                                  <select  id='sel1'  class='selectform'  name='cityupdate'>
                                                    <option selected >".$value['city']."</option>
                                                    <option value='Gjakovë'>Gjakovë</option>
                                                    <option value='Mitrovicë e Jugut'>Mitrovicë e Jugut</option>
                                                    <option value='Pejë'>Pejë</option>
                                                    <option value='Prizren'>Prizren</option>
                                                    <option value='Prishtinë'>Prishtinë</option>
                                                    <option value='Vushtrri'>Vushtrri</option>
                                                    <option value='Gjilan'>Gjilan</option>
                                                    <option value='Ferizaj'>Ferizaj</option>
                                                  </select>
                                                </div>
                                                <div class='form-group'>
                                                <input class='au-input au-input--full' type='text' name='nameupdate' value='".$value['name']."' placeholder='Taxi Name' pattern='.{3,100}' required title='3 to 100 characters'>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='au-input au-input--full' type='text' name='telephoneupdate' value='".$value['telephone']."' placeholder='Telephone' pattern='.{9,100}' required title='9 to 100 characters'>
                                                </div>
                                                  <div class='form-group'>
                                                  <select  id='sel1'  class='selectform'  name='starsupdate'>
                                                    <option selected >".$value['stars']."</option>
                                                    <option value='8.0'>8.0</option>
                                                    <option value='8.1'>8.1</option>
                                                    <option value='8.2'>8.2</option>
                                                    <option value='8.3'>8.3</option>
                                                    <option value='8.4'>8.4</option>
                                                    <option value='8.5'>8.5</option>
                                                    <option value='8.6'>8.6</option>
                                                    <option value='8.7'>8.7</option>
                                                    <option value='8.8'>8.8</option>
                                                    <option value='8.9'>8.9</option>
                                                    <option value='9.0'>9.0</option>
                                                    <option value='9.1'>9.1</option>
                                                    <option value='9.2'>9.2</option>
                                                    <option value='9.3'>9.3</option>
                                                    <option value='9.4'>9.4</option>
                                                    <option value='9.5'>9.5</option>
                                                    <option value='9.6'>9.6</option>
                                                    <option value='9.7'>9.7</option>
                                                    <option value='9.8'>9.8</option>
                                                    <option value='9.9'>9.9</option>
                                                    <option value='10.0'>10.0</option>
                                                  </select>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='au-input au-input--full' type='text' name='type_ineedupdate' value='Taxi' hidden>
                                                </div>
                                                <div class='main-section'>
                                                  <p  style='color:red;'>If you edit any data you should update the taxi photo again</p>
                                                <div class='form-group'>
                                                      <input class='upload_image' type='file' name='imageupdate' placeholder='Taxi Image' required>
                                                </div>
                                                </div>
                                                <div class='register-link'>
                                                    <p>
                                                      <button class='au-btn au-btn--block au-btn--green m-b-10' type='submit'>Save</button>
                                                    </p>
                                                </div>

                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                            </td>
                            <form action=".base_url().'deleteineeddata/Taxi'." method='post' onsubmit='return ConfirmDelete()'>
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/bootstrap.min.css"/>
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

    <script>
        function messageBox(){
          var error_message_update  = "<?php echo $error_message_update; ?>";
          var return_message_update = "<?php echo $return_message_update; ?>";
          var cityupdate            = "<?php echo form_error('cityupdate'); ?>";
          var nameupdate            = "<?php echo form_error('nameupdate'); ?>";
          var telephoneupdate       = "<?php echo form_error('telephoneupdate'); ?>";
          var stars                 = "<?php echo form_error('stars'); ?>";

          var str                   = error_message_update +',' + nameupdate + ',' + telephoneupdate + ',' + cityupdate + ',' + stars;
          var array                 = str.split(",");
          var newArray              = [];
          if('' != return_message_update){
            alertify.alert('Update Message', return_message_update);
          }else if(('' == error_message_update) && ('' == nameupdate) && ('' == telephoneupdate) && ('' == cityupdate) && ('' == stars)){
            return ;
          }else{
            var arrayLength = array.length;
            if(arrayLength==0){
                return ;
            }else{
              for (var i = 0; i < arrayLength; i++) {
                if('' !=array[i]){
                    array[i] = array[i].replace('<p>', '');
                    array[i] = array[i].replace('</p>','<br />');
                    newArray.push(array[i]);
                }
              }
              var stringData      = newArray.join(' ');
                alertify.alert('Update Message', stringData);
            }
          }

        }
    </script>


</body>

</html>
<!-- end document-->

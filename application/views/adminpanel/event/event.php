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
    input[type=datetimelocal]::-webkit-inner-spin-button {
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
                        Register new event
                      </p>
                        <span class='col-md-12' style="color:#63C76A;font-size:20px;"><?php echo $return_message;?></span>
                        <form action="<?php echo base_url()."register_event/Event" ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                            <input class="au-input au-input--full" type="text" name="name" placeholder="Event Name" pattern='.{3,100}' required title='3 to 100 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group">
                              <select  required id="sel1"  class="selectform"  name='city'>
                                <option value='' selected disabled>Select City</option>
                                <option value='Deçan'>Deçan</option>
                                <option value='Dragash'>Dragash</option>
                                <option value='Ferizaj'>Ferizaj</option>
                                <option value='Fushe Kosove'>Fushe Kosove</option>
                                <option value='Gjakovë'>Gjakovë</option>
                                <option value='Gjilan'>Gjilan</option>
                                <option value='Gllogoc'>Gllogoc</option>
                                <option value='Gracanice'>Gracanice</option>
                                <option value='Hani i Elezit'>Hani i Elezit</option>
                                <option value='Istog'>Istog</option>
                                <option value='Junik'>Junik</option>
                                <option value='Kaçanik'>Kaçanik</option>
                                <option value='Klinë'>Klinë</option>
                                <option value='Kllokot'>Kllokot</option>
                                <option value='Leposaviq'>Leposaviq</option>
                                <option value='Lipijan'>Lipijan</option>
                                <option value='Malishevë'>Malishevë</option>
                                <option value='Mamushë'>Mamushë</option>
                                <option value='Mitrovicë e Jugut'>Mitrovicë e Jugut</option>
                                <option value='Mitrovicë e Veriut'>Mitrovicë e Veriut</option>
                                <option value='Obiliq'>Obiliq</option>
                                <option value='Partesh'>Partesh</option>
                                <option value='Pejë'>Pejë</option>
                                <option value='Podujevë'>Podujevë</option>
                                <option value='Prizren'>Prizren</option>
                                <option value='Prishtinë'>Prishtinë</option>
                                <option value='Rahovec'>Rahovec</option>
                                <option value='Ranilug'>Ranilug</option>
                                <option value='Shtërpce'>Shtërpce</option>
                                <option value='Shtime'>Shtime</option>
                                <option value='Skenderaj'>Skenderaj</option>
                                <option value='Suharekë'>Suharekë</option>
                                <option value='Viti'>Viti</option>
                                <option value='Vushtrri'>Vushtrri</option>
                                <option value='Zubin Potok'>Zubin Potok</option>
                                <option value='Zvecan'>Zvecan</option>
                              </select>
                              <span class='text_danger' style="color:red;"><?php echo form_error('city'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="place" placeholder="Address" pattern='.{3,100}' required title='3 to 100 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('place'); ?></span>
                            </div>
                          <div class="main-section">
                            <h5  style="color:black;">Start Date of Event</h5><br>
                            <div class="form-group">
                                <input placeholder="Date Trip" class="au-input au-input--full" type="datetime-local" onfocus="(this.type='datetime-local')"  id="datetime-local" name="startdate" required/>
                                <span class='text_danger' style="color:red;"><?php echo form_error('time'); ?></span>
                            </div>
                          </div>
                          <div class="main-section">
                            <h5  style="color:black;">End Date of Event</h5><br>
                            <div class="form-group">
                                <input placeholder="Date Trip" class="au-input au-input--full" type="datetime-local" onfocus="(this.type='datetime-local')"  id="datetime-local" name="enddate" required/>
                                <span class='text_danger' style="color:red;"><?php echo form_error('time'); ?></span>
                            </div>
                        </div>
                        <br />
                            <div class="form-group">
                                <textarea class="au-input au-input--full" style ="width:100%;"  name="info" placeholder="Info" required></textarea>
                                <span class='text_danger' style="color:red;"><?php echo form_error('info'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="email" placeholder="Email (Optional)" pattern='.{3,100}' title='3 to 100 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="telephone" placeholder="Telephone (Optional)" pattern='.{3,100}' title='3 to 100 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('telephone'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="latitude" step="any" placeholder="Latitude(42.662651)" pattern='.{3,50}' required title='3 to 50 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('latitude'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="longitude" placeholder="Longitude(21.163969)" pattern='.{3,50}' required title='3 to 50 characters'>
                                <span class='text_danger' style="color:red;"><?php echo form_error('longitude'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="url" placeholder="Website of Event (Optional)">
                                <span class='text_danger' style="color:red;"><?php echo form_error('url'); ?></span>
                            </div>
                            <div class="form-group">
                              <select required  id="sel1"  class="selectform"  name='type'>
                                <option value= '' selected disabled>Type of Event</option>
                                <option value='Music'>Music</option>
                                <option value='Art'>Art</option>
                                <option value='Nature'>Nature</option>
                                <option value='Culture'>Culture</option>
                                <option value='Sport'>Sport</option>
                              </select>
                              <span class='text_danger' style="color:red;"><?php echo form_error('type'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="upload_image" type="file" name="image" placeholder="Evemt Image" required>
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
                          <img src="<?php echo asset_url()."images/icon/event.png";?>" alt="event" />
                          </div>
                      </div>
                      <div class='col-md-6'>
                        <div class="image">
                        <img src="<?php echo asset_url()."images/icon/event1.png";?>" alt="event" />
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
                        <th class="th-sm">Event Name</th>
                        <th class="th-sm">Place</th>
                        <th class="th-sm">City</th>
                        <th class="th-sm">Type of Event</th>
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
                            <td>".$value['place']."</td>
                            <td>".$value['city']."</td>
                            <td>".$value['type']."</td>
                            <td style='background-color:#63c76a;' >

                            <button type='button' data-toggle='modal' data-target='#myModal".$key."' style='outline:none;'><span style='font-weight:bold;color:white;'>Edit</span></button>
                                <div class='container'>
                                  <!-- Modal -->
                                  <div class='modal fade' id='myModal".$key."' role='dialog'>
                                    <div class='modal-dialog'>
                                      <div class='modal-content'>
                                        <div class='modal-body'>
                                        <p  style='text-align:center;font-size:25px;'>
                                          Update the event
                                        </p>
                                          <form action=".base_url().'updateeventdata/Event'." method='post' enctype='multipart/form-data''>
                                          <div class='form-group'>
                                          <input class='au-input au-input--full' type='text' name='idupdate' value='".$value['id']."' hidden>
                                          </div>
                                        <div class='form-group'>
                                        <input class='au-input au-input--full' type='text' name='nameupdate' value='".$value['name']."' placeholder='Event Name' pattern='.{3,100}' required title='3 to 100 characters'>
                                        </div>
                                        <div class='form-group'>
                                          <select  id='sel1'  class='selectform'  name='cityupdate'>
                                            <option  selected >".$value['city']."</option>
                                            <option value='Deçan'>Deçan</option>
                                            <option value='Dragash'>Dragash</option>
                                            <option value='Ferizaj'>Ferizaj</option>
                                            <option value='Fushe Kosove'>Fushe Kosove</option>
                                            <option value='Gjakovë'>Gjakovë</option>
                                            <option value='Gjilan'>Gjilan</option>
                                            <option value='Gllogoc'>Gllogoc</option>
                                            <option value='Gracanice'>Gracanice</option>
                                            <option value='Hani i Elezit'>Hani i Elezit</option>
                                            <option value='Istog'>Istog</option>
                                            <option value='Junik'>Junik</option>
                                            <option value='Kaçanik'>Kaçanik</option>
                                            <option value='Klinë'>Klinë</option>
                                            <option value='Kllokot'>Kllokot</option>
                                            <option value='Leposaviq'>Leposaviq</option>
                                            <option value='Lipijan'>Lipijan</option>
                                            <option value='Malishevë'>Malishevë</option>
                                            <option value='Mamushë'>Mamushë</option>
                                            <option value='Mitrovicë e Jugut'>Mitrovicë e Jugut</option>
                                            <option value='Mitrovicë e Veriut'>Mitrovicë e Veriut</option>
                                            <option value='Obiliq'>Obiliq</option>
                                            <option value='Partesh'>Partesh</option>
                                            <option value='Pejë'>Pejë</option>
                                            <option value='Podujevë'>Podujevë</option>
                                            <option value='Prizren'>Prizren</option>
                                            <option value='Prishtinë'>Prishtinë</option>
                                            <option value='Rahovec'>Rahovec</option>
                                            <option value='Ranilug'>Ranilug</option>
                                            <option value='Shtërpce'>Shtërpce</option>
                                            <option value='Shtime'>Shtime</option>
                                            <option value='Skenderaj'>Skenderaj</option>
                                            <option value='Suharekë'>Suharekë</option>
                                            <option value='Viti'>Viti</option>
                                            <option value='Vushtrri'>Vushtrri</option>
                                            <option value='Zubin Potok'>Zubin Potok</option>
                                            <option value='Zvecan'>Zvecan</option>
                                          </select>
                                        </div>
                                        <div class='form-group'>
                                            <input class='au-input au-input--full' type='text' name='placeupdate' value='".$value['place']."' placeholder='Address' pattern='.{3,100}' required title='3 to 100 characters' >
                                        </div>


                                          <div class='form-group'>
                                              <input placeholder='Date Trip' class='au-input au-input--full' type='datetime-local' onfocus='(this.type='datetime-local')' value='".$value['startdate']."'  id='datetime-local' name='startdateupdate' required/>
                                              <span class='text_danger' style='color:red;'><?php echo form_error('time'); ?></span>
                                          </div>

                                          <div class='form-group'>
                                              <input placeholder='Date Trip' class='au-input au-input--full' type='datetime-local' onfocus='(this.type='datetime-local')' value='".$value['enddate']."' id='datetime-local' name='enddateupdate' required/>
                                              <span class='text_danger' style='color:red;'><?php echo form_error('time'); ?></span>
                                          </div>

                                        <div class='form-group'>
                                            <textarea class='au-input au-input--full' style ='width:100%;'  name='infoupdate' placeholder='Info' required>".$value['info']."</textarea>
                                        </div>
                                        <div class='form-group'>
                                            <input class='au-input au-input--full' type='text' name='emailupdate' value='".$value['email']."' placeholder='Email (Optional)' pattern='.{3,100}' title='3 to 100 characters'>
                                        </div>
                                        <div class='form-group'>
                                            <input class='au-input au-input--full' type='text' name='telephoneupdate' value='".$value['telephone']."' placeholder='Telephone (Optional)' pattern='.{3,100}' title='3 to 100 characters'>
                                        </div>
                                        <div class='form-group'>
                                            <input class='au-input au-input--full' type='text' name='latitudeupdate' step='any' placeholder='Latitude(42.662651)' value='".$value['latitude']."' pattern='.{3,50}' required title='3 to 50 characters'>
                                            <span class='text_danger' style='color:red;'><?php echo form_error('latitude'); ?></span>
                                        </div>
                                        <div class='form-group'>
                                            <input class='au-input au-input--full' type='text' name='longitudeupdate' placeholder='Longitude(21.163969)' value='".$value['longitude']."' pattern='.{3,50}' required title='3 to 50 characters'>
                                            <span class='text_danger' style='color:red;'><?php echo form_error('longitude'); ?></span>
                                        </div>
                                        <div class='form-group'>
                                            <input class='au-input au-input--full' type='text' name='urlupdate' value='".$value['url']."' placeholder='Website of Event (Optional)'>
                                        </div>
                                        <div class='form-group'>
                                          <select required id='sel1'  class='selectform' name='typeupdate'>
                                            <option selected>".$value['type']."</option>
                                            <option value='Music'>Music</option>
                                            <option value='Art'>Art</option>
                                            <option value='Nature'>Nature</option>
                                            <option value='Culture'>Culture</option>
                                            <option value='Sport'>Sport</option>
                                          </select>
                                        </div>
                                        <div class='main-section'>
                                          <p  style='color:red;'>If you edit any data you should update the event photo again</p>
                                        <div class='form-group'>
                                            <input class='upload_image' type='file' name='imageupdate' placeholder='Event Image' required>
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
                            <form action=".base_url().'deleteeventdata/Event'." method='post' onsubmit='return ConfirmDelete()'>
                            <td style='  background-color:#d11a2a;'><button type='submit' name='id' value=".$value['id']." style='outline:none;'><span style='font-weight:bold;color:white;'>Delete</span></button></td>
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
          var nameupdate            = "<?php echo form_error('nameupdate'); ?>";
          var placeupdate           = "<?php echo form_error('placeupdate'); ?>";
          var cityupdate            = "<?php echo form_error('cityupdate'); ?>";
          var startdateupdate       = "<?php echo form_error('startdateupdate'); ?>";
          var enddateupdate         = "<?php echo form_error('enddateupdate'); ?>";
          var infoupdate            = "<?php echo form_error('infoupdate'); ?>";
          var typeupdate            = "<?php echo form_error('typeupdate'); ?>";
          var telephoneupdate       = "<?php echo form_error('telephoneupdate'); ?>";
          var latitudeupdate        = "<?php echo form_error('latitudeupdate'); ?>";
          var longitudepdate        = "<?php echo form_error('longitudepdate'); ?>";


          var str                   = error_message_update +',' + nameupdate + ',' + placeupdate + ',' + cityupdate + ',' + startdateupdate+ ',' + enddateupdate + ','+ infoupdate +','+typeupdate+ ','+ latitudeupdate +','+longitudepdate;
          var array                 = str.split(",");
          var newArray              = [];
          if('' != return_message_update){
            alertify.alert('Update Message', return_message_update);
          }else if(('' == error_message_update) && ('' == nameupdate) && ('' == placeupdate) && ('' == cityupdate) && ('' == startdateupdate) && ('' == enddateupdate) && ('' == infoupdate) && ('' == typeupdate)&& ('' == latitudeupdate) && ('' == longitudepdate)){
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

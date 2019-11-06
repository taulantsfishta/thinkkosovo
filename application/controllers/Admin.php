<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Europe/Berlin");
    $this->load->helper(array('form', 'url'));
    $this->load->helper('security');
    $this->load->library('form_validation');
    $this->load->library('upload');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  }

  function index(){


    $this->load->view('adminpanel/login');

  }

  function login_validation(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username','Username','required|xss_clean|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('password','Password','required|xss_clean|min_length[3]|max_length[20]');

    if($this->form_validation->run()){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->load->library('adminpanel/loginadmin');
      if($this->loginadmin->checkUser($username,$password)){
         $session_data = array('username' =>$username);
         $this->session->set_userdata($session_data);
         redirect('https://thinkkosovo.cleverapps.io/home');

      }else{
        $this->session->set_flashdata('error','Invalid Username or Password');
        redirect('https://thinkkosovo.cleverapps.io/admin');
      }

    }else{
      $this->index();
    }

  }

  function home(){
    if($this->session->userdata('username') != ''){
      $username['username'] = $this->session->userdata('username');
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/home',$username);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }

  function logout(){
    $this->session->unset_userdata('username');
    redirect('https://thinkkosovo.cleverapps.io/admin');

  }

  /*---------------------------------------------------------------------------------------History & Culture---------------------------------------------------------------------------------------------------------*/


  function museum($getTypename='Museum'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/historyandculture');
      $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }

  function nature($getTypename='Nature'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/historyandculture');
      $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }

  function history($getTypename='History'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/historyandculture');
      $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }

   function attraction($getTypename='Attraction'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/historyandculture');
      $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }

  function register_historyandculturedata($getTypename=''){

          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/historyandculture');
             $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
             header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('name',$getTypename.' name','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('location','City','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('description','Description','required|xss_clean|min_length[3]|max_length[2000]');
             $this->form_validation->set_rules('address','Address','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('work_time','Work Time','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('latitude','Latitude','required|xss_clean|min_length[3]|max_length[50]');
             $this->form_validation->set_rules('longitude','Longitude','required|xss_clean|min_length[3]|max_length[50]');
             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);

            if(($this->form_validation->run())){
              if(!($this->upload->do_upload('image'))){
                  $this->load->library('adminpanel/historyandculture');
                  $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
                }else{
                  $image_info     = $this->upload->data();
                  $image_name     = $image_info['file_name'];
                  $name           = $this->input->post('name');
                  $type_name      = $this->input->post('type_name');
                  $location       = $this->input->post('location');
                  $description    = $this->input->post('description');
                  $address        = $this->input->post('address');
                  $work_time      = $this->input->post('work_time');
                  $latitude       = $this->input->post('latitude');
                  $longitude      = $this->input->post('longitude');
                  $postData       = ['image'=>$image_name,'name'=>$name,'location'=>$location,'description'=>$description,'address'=>$address,'work_time'=>$work_time,'type_name'=>$type_name,'latitude'=>$latitude,'longitude'=>$longitude];
                  $this->load->library('adminpanel/historyandculture');
                  $returnData_1     = $this->historyandculture->register_data($postData);
                  $this->load->library('adminpanel/historyandculture');
                  $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=>'','return_message'=>$returnData_1['message'],'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/history&culture/'.$getTypename,$data);

                }
             }else{
                   if(!($this->upload->do_upload('image'))){
                    $this->load->library('adminpanel/historyandculture');
                    $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/historyandculture');
                    $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                    $image = $this->upload->data();
                    unlink('uploads/'.$image['file_name']);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

  function updatehistoryandculturedata($getTypename=''){

          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/historyandculture');
             $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
             header( "refresh:3;url=https://thinkkosovo.cleverapps.io/".$getTypename );
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('nameupdate',$getTypename.' name','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('locationupdate','City','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('descriptionupdate','Description','required|xss_clean|min_length[3]|max_length[2000]');
             $this->form_validation->set_rules('addressupdate','Address','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('work_timeupdate','Work Time','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('latitudeupdate','Latitude','required|xss_clean|min_length[3]|max_length[50]');
             $this->form_validation->set_rules('longitudeupdate','Longitude','required|xss_clean|min_length[3]|max_length[50]');
             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);

            if(($this->form_validation->run())){
              if(!($this->upload->do_upload('imageupdate'))){
                  $this->load->library('adminpanel/historyandculture');
                  $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=>$this->upload->display_errors(),'return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
                }else{
                  $image_info     = $this->upload->data();
                  $image_name     = $image_info['file_name'];
                  $id             = $this->input->post('idupdate');
                  $name           = $this->input->post('nameupdate');
                  $type_name      = $this->input->post('type_nameupdate');
                  $location       = $this->input->post('locationupdate');
                  $description    = $this->input->post('descriptionupdate');
                  $address        = $this->input->post('addressupdate');
                  $work_time      = $this->input->post('work_timeupdate');
                  $latitude       = $this->input->post('latitudeupdate');
                  $longitude      = $this->input->post('longitudeupdate');
                  $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'location'=>$location,'description'=>$description,'address'=>$address,'work_time'=>$work_time,'type_name'=>$type_name,'latitude'=>$latitude,'longitude'=>$longitude];
                  $this->load->library('adminpanel/historyandculture');
                  $returnData_1     = $this->historyandculture->update_data($postData);
                  $this->load->library('adminpanel/historyandculture');
                  $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=>$this->upload->display_errors(),'return_message'=>'','return_message_update'=>$returnData_1['message'],'table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/history&culture/'.$getTypename,$data);

                }
             }else{
                   if(!($this->upload->do_upload('image'))){
                    $this->load->library('adminpanel/historyandculture');
                    $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=>$this->upload->display_errors(),'return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:3;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/historyandculture');
                    $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
                    $image = $this->upload->data();
                    unlink('uploads/'.$image['file_name']);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:3;url=https://thinkkosovo.cleverapps.io/".$getTypename );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

  function deletehistoryandculturedata($getTypename=''){

    if($this->session->userdata('username') != ''){
      $row_id = $this->input->post('id');

      $this->load->library('adminpanel/historyandculture');
      $message_deleted = $this->historyandculture->deleteHistoryandculturedata($row_id);
      $this->load->library('adminpanel/historyandculture');
      $returnData = $this->historyandculture->getHistoryandculturedata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','table_data'=>$returnData,'message_deleted'=>$message_deleted['message']);
      $getTypename   = lcfirst($getTypename);
      header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/history&culture/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }

  /*---------------------------------------------------------------------------------------FANS---------------------------------------------------------------------------------------------------------*/

  //
  // function fanstory($getTypename='Fanstory'){
  //
  //   if($this->session->userdata('username') != ''){
  //     $this->load->library('adminpanel/fan');
  //     $returnData = $this->fan->getFansdata($getTypename);
  //     $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //     $getTypename   = lcfirst($getTypename);
  //     $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //   }else{
  //     redirect('https://thinkkosovo.cleverapps.io/admin');
  //   }
  //
  // }
  //
  // function register_fanstory($getTypename=''){
  //
  //         if($this->session->userdata('username') != ''){
  //          if($this->input->post()==null){
  //            $this->load->library('adminpanel/fan');
  //            $returnData = $this->fan->getFansdata($getTypename);
  //            $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //            $getTypename   = lcfirst($getTypename);
  //            $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //          }else{
  //            $this->load->library('form_validation');
  //            $this->form_validation->set_rules('name','Name','required|xss_clean|min_length[2]|max_length[15]');
  //            $this->form_validation->set_rules('surename','Surename','required|xss_clean|min_length[2]|max_length[15]');
  //            $this->form_validation->set_rules('title','Title','required|xss_clean|min_length[2]|max_length[40]');
  //            $this->form_validation->set_rules('tags','Tags','required|xss_clean|min_length[2]|max_length[40]');
  //            $this->form_validation->set_rules('story','Story','required|xss_clean');
  //            $this->form_validation->set_rules('date_trip','Date Trip','required|xss_clean');
  //            $this->form_validation->set_rules('location_trip','Location Trip','required|xss_clean|min_length[2]|max_length[20]');
  //            $config['upload_path']   = 'uploads/';
  //            $config['allowed_types'] = 'jpg|jpeg|png|gif';
  //            $config['encrypt_name']  = FALSE;
  //            $this->load->library('upload', $config);
  //            $this->upload->initialize($config);
  //           if(($this->form_validation->run())){
  //               if(!($this->upload->do_upload('image_trip'))){
  //                 $this->load->library('adminpanel/fan');
  //                 $returnData = $this->fan->getFansdata($getTypename);
  //                 $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //                 $getTypename   = lcfirst($getTypename);
  //                 $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //               }else{
  //                 $image_info     = $this->upload->data();
  //                 $image_name     = $image_info['file_name'];
  //                 $name           = $this->input->post('name');
  //                 $surename       = $this->input->post('surename' );
  //                 $title          = $this->input->post('title');
  //                 $tags           = $this->input->post('tags');
  //                 $story          = $this->input->post('story');
  //                 $date_trip      = $this->input->post('date_trip');
  //                 $location_trip  = $this->input->post('location_trip');
  //                 $postData       = ['image_trip'=>$image_name,'name'=>$name,'surename'=>$surename,'title'=>$title,'tags'=>$tags,'story'=>$story,'date_trip'=>$date_trip,'location_trip'=>$location_trip];
  //                 $this->load->library('adminpanel/fan');
  //                 $returnData_1     = $this->fan->register_data($postData);
  //                 $this->load->library('adminpanel/fan');
  //                 $returnData = $this->fan->getFansdata($getTypename);
  //                 $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>$returnData_1['message'],'table_data'=>$returnData,'message_deleted'=>'');
  //                 $getTypename   = lcfirst($getTypename);
  //                 $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //
  //               }
  //            }else{
  //                 if(!($this->upload->do_upload('image_trip'))){
  //                   $this->load->library('adminpanel/fan');
  //                   $returnData = $this->fan->getFansdata($getTypename);
  //                   $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //                   $getTypename   = lcfirst($getTypename);
  //                   $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //                 }else{
  //                   $this->load->library('adminpanel/fan');
  //                   $returnData = $this->fan->getFansdata($getTypename);
  //                   $image = $this->upload->data();
  //                   unlink('uploads/'.$image['file_name']);
  //                   $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //                   $getTypename   = lcfirst($getTypename);
  //                   $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //                 }
  //           }
  //          }
  //
  //       }else{
  //           redirect('https://thinkkosovo.cleverapps.io/admin');
  //       }
  // }

  // function deletefanstorydata($getTypename=''){
  //
  //   if($this->session->userdata('username') != ''){
  //     $row_id = $this->input->post('id');
  //     $this->load->library('adminpanel/fan');
  //     $message_deleted = $this->fan->deleteFansdata($row_id);
  //     $this->load->library('adminpanel/fan');
  //     $returnData = $this->fan->getFansdata($getTypename);
  //     $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','table_data'=>$returnData,'message_deleted'=>$message_deleted['message']);
  //     $getTypename   = lcfirst($getTypename);
  //     $this->load->view('adminpanel/fan/'.$getTypename,$data);
  //   }else{
  //     redirect('https://thinkkosovo.cleverapps.io/admin');
  //   }
  //
  // }

  /*---------------------------------------------------------------------------------------GALLERY---------------------------------------------------------------------------------------------------------*/
  //
  // function photo($getTypename='Photo'){
  //
  //   if($this->session->userdata('username') != ''){
  //     $this->load->library('adminpanel/gallery');
  //     $returnData = $this->gallery->getGallerydata($getTypename);
  //     $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //     $getTypename   = lcfirst($getTypename);
  //     $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //   }else{
  //     redirect('https://thinkkosovo.cleverapps.io/admin');
  //   }
  // }
  // function register_photodata($getTypename=''){
  //
  //         if($this->session->userdata('username') != ''){
  //          if($this->input->post()==null){
  //            $this->load->library('adminpanel/gallery');
  //            $returnData = $this->gallery->getGallerydata($getTypename);
  //            $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //            $getTypename   = lcfirst($getTypename);
  //            $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //          }else{
  //            $this->load->library('form_validation');
  //            $this->form_validation->set_rules('place_name','Place Name','required|xss_clean|min_length[2]|max_length[20]');
  //            $this->form_validation->set_rules('city','City','required|xss_clean|min_length[2]|max_length[20]');
  //            $this->form_validation->set_rules('place_location','Place\'s Location','required|xss_clean|min_length[2]|max_length[30]');
  //            $this->form_validation->set_rules('description','Description','required|xss_clean|min_length[2]|max_length[200]');
  //            $config['upload_path']   = 'uploads/';
  //            $config['allowed_types'] = 'jpg|jpeg|png|gif';
  //            $config['encrypt_name']  = FALSE;
  //            $this->load->library('upload', $config);
  //            $this->upload->initialize($config);
  //           if(($this->form_validation->run())){
  //               if(!($this->upload->do_upload('image_place'))){
  //                 $this->load->library('adminpanel/gallery');
  //                 $returnData = $this->gallery->getGallerydata($getTypename);
  //                 $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //                 $getTypename   = lcfirst($getTypename);
  //                 $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //               }else{
  //                 $image_info     = $this->upload->data();
  //                 $image_name     = $image_info['file_name'];
  //                 $place_name     = $this->input->post('place_name');
  //                 $city           = $this->input->post('city' );
  //                 $place_location = $this->input->post('place_location');
  //                 $description    = $this->input->post('description');
  //                 $postData       = ['image_place'=>$image_name,'place_name'=>$place_name,'city'=>$city,'place_location'=>$place_location,'description'=>$description];
  //                 $this->load->library('adminpanel/gallery');
  //                 $returnData_1     = $this->gallery->register_data($postData);
  //                 $this->load->library('adminpanel/gallery');
  //                 $returnData = $this->gallery->getGallerydata($getTypename);
  //                 $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>$returnData_1['message'],'table_data'=>$returnData,'message_deleted'=>'');
  //                 $getTypename   = lcfirst($getTypename);
  //                 $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //
  //               }
  //            }else{
  //                 if(!($this->upload->do_upload('image_trip'))){
  //                   $this->load->library('adminpanel/gallery');
  //                   $returnData = $this->gallery->getGallerydata($getTypename);
  //                   $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //                   $getTypename   = lcfirst($getTypename);
  //                   $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //                 }else{
  //                   $this->load->library('adminpanel/gallery');
  //                   $returnData = $this->gallery->getGallerydata($getTypename);
  //                   $image = $this->upload->data();
  //                   unlink('uploads/'.$image['file_name']);
  //                   $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','table_data'=>$returnData,'message_deleted'=>'');
  //                   $getTypename   = lcfirst($getTypename);
  //                   $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //                 }
  //           }
  //          }
  //
  //       }else{
  //           redirect('https://thinkkosovo.cleverapps.io/admin');
  //       }
  // }
  //
  // function deletephotodata($getTypename=''){
  //
  //   if($this->session->userdata('username') != ''){
  //     $row_id = $this->input->post('id');
  //     $this->load->library('adminpanel/gallery');
  //     $message_deleted = $this->gallery->deletePhotodata($row_id);
  //     $this->load->library('adminpanel/gallery');
  //     $returnData = $this->gallery->getGallerydata($getTypename);
  //     $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','table_data'=>$returnData,'message_deleted'=>$message_deleted['message']);
  //     $getTypename   = lcfirst($getTypename);
  //     $this->load->view('adminpanel/gallery/'.$getTypename,$data);
  //   }else{
  //     redirect('https://thinkkosovo.cleverapps.io/admin');
  //   }
  //
  // }

  /*---------------------------------------------------------------------------------------EVENT---------------------------------------------------------------------------------------------------------*/


  function event($getTypename='Event'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/event');
      $returnData = $this->event->getEventdata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/event/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

   function banner($getTypename='Banner'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/event');
      $returnData = $this->event->getBannerdata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/event/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function register_event($getTypename=''){
          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/event');
             $returnData = $this->event->getEventdata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
             header( "refresh:2;url=https://thinkkosovo.cleverapps.io/event" );
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/event/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('name','Event Name','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('place','Address','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('startdate','Start Date','required|xss_clean');
             $this->form_validation->set_rules('enddate','End Date','required|xss_clean');
             $this->form_validation->set_rules('info','Info','xss_clean');
             $this->form_validation->set_rules('email','Email','xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('url','Url','xss_clean');
             $this->form_validation->set_rules('type','Type of Event','required|xss_clean');
             $this->form_validation->set_rules('latitude','Latitude','required|xss_clean|min_length[3]|max_length[50]');
             $this->form_validation->set_rules('longitude','Longitude','required|xss_clean|min_length[3]|max_length[50]');

             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if(($this->form_validation->run())){
                if(!($this->upload->do_upload('image'))){
                  $this->load->library('adminpanel/event');
                  $returnData = $this->event->getEventdata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/event" );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/event/'.$getTypename,$data);
                }else{
                  $image_info     = $this->upload->data();
                  $image_name     = $image_info['file_name'];
                  $name           = $this->input->post('name');
                  $place          = $this->input->post('place' );
                  $city           = $this->input->post('city');
                  $startdate      = $this->input->post('startdate');
                  $enddate        = $this->input->post('enddate');
                  $info           = $this->input->post('info');
                  $type           = $this->input->post('type');
                  $url            = $this->input->post('url');
                  $email          = $this->input->post('email');
                  $telephone      = $this->input->post('telephone');
                  $latitude       = $this->input->post('latitude');
                  $longitude      = $this->input->post('longitude');
                  $postData       = ['image'=>$image_name,'name'=>$name,'place'=>$place,'city'=>$city,'startdate'=>$startdate,'enddate'=>$enddate,'info'=>$info,'type'=>$type,'email'=>$email,'telephone'=>$telephone,'url'=>$url,'latitude'=>$latitude,'longitude'=>$longitude];
                  $this->load->library('adminpanel/event');
                  $returnData_1     = $this->event->register_data($postData);
                  $this->load->library('adminpanel/event');
                  $returnData = $this->event->getEventdata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>$returnData_1['message'],'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/event" );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/event/'.$getTypename,$data);

                }
             }else{
                  if(!($this->upload->do_upload('image'))){
                    $this->load->library('adminpanel/event');
                    $returnData = $this->event->getEventdata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/event" );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/event/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/event');
                    $returnData = $this->event->getEventdata($getTypename);
                    $image = $this->upload->data();
                    unlink('uploads/'.$image['file_name']);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/event" );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/event/'.$getTypename,$data);
                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

  function updateeventdata($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/event');
       $returnData = $this->event->getEventdata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=>'','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
       header( "refresh:3;url=https://thinkkosovo.cleverapps.io/event" );
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/event/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('nameupdate','Event Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('placeupdate','Address','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('startdateupdate','Start Date','required|xss_clean');
       $this->form_validation->set_rules('enddateupdate','End Date','required|xss_clean');
       $this->form_validation->set_rules('infoupdate','Info','required|xss_clean');
       $this->form_validation->set_rules('emailupdate','Email','xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephoneupdate','Telephone','xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('urlupdate','Url','xss_clean');
       $this->form_validation->set_rules('typeupdate','Type of Event','required|xss_clean');
       $this->form_validation->set_rules('latitudeupdate','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitudeupdate','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('imageupdate'))){
            $this->load->library('adminpanel/event');
            $returnData = $this->event->getEventdata($getTypename);
            $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> $this->upload->display_errors(),'return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
            $getTypename   = lcfirst($getTypename);
            header( "refresh:3;url=https://thinkkosovo.cleverapps.io/event" );
            $this->load->view('adminpanel/header');
            $this->load->view('adminpanel/event/'.$getTypename,$data);
          }else{
            $image_info     = $this->upload->data();
            $image_name     = $image_info['file_name'];
            $id             = $this->input->post('idupdate');
            $name           = $this->input->post('nameupdate');
            $place          = $this->input->post('placeupdate' );
            $city           = $this->input->post('cityupdate');
            $startdate      = $this->input->post('startdateupdate');
            $enddate        = $this->input->post('enddateupdate');
            $info           = $this->input->post('infoupdate');
            $type           = $this->input->post('typeupdate');
            $email          = $this->input->post('emailupdate');
            $telephone      = $this->input->post('telephoneupdate');
            $url            = $this->input->post('urlupdate');
            $latitude       = $this->input->post('latitudeupdate');
            $longitude      = $this->input->post('longitudeupdate');
            $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'place'=>$place,'city'=>$city,'startdate'=>$startdate,'enddate'=>$enddate,'info'=>$info,'type'=>$type,'email'=>$email,'telephone'=>$telephone,'url'=>$url,'latitude'=>$latitude,'longitude'=>$longitude];
            $this->load->library('adminpanel/event');
            $returnData_1     = $this->event->update_data($postData);
            // if($returnData_1['message'] == "Data are updated!"){
            //   foreach(glob('uploads/'.'*') as $filename){
            //     $str            = explode('.',$image_name);
            //     $length_image   = strlen($str[0]);
            //     $str_1          = substr($str[0],0,$length_image-1);
            //     $filename       = substr($filename,8);
            //     $selectImage    = $this->db->select('*')->from('event')->where('image',$str_1.'.'.$str[1])->get()->result_array();
            //     if($selectImage != null){
            //       foreach ($selectImage as $key => $value) {
            //         $this->db->set('image',$selectImage['image']);
            //         $this->db->where('id',$selectImage['id']);
            //         $are_data_updated   = $this->db->update('event');
            //       }
            //
            //     }
            //     if($filename == $str_1.'.'.$str[1]){
            //       unlink('uploads/'.$str_1.'.'.$str[1]);
            //     }
            //   }
            //
            // }
            $this->load->library('adminpanel/event');
            $returnData = $this->event->getEventdata($getTypename);
            $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> $this->upload->display_errors(),'return_message'=>'','return_message_update'=>$returnData_1['message'],'table_data'=>$returnData,'message_deleted'=>'');
            $getTypename   = lcfirst($getTypename);
            // header( "refresh:3;url=https://thinkkosovo.cleverapps.io/event" );
            $this->load->view('adminpanel/header');
            $this->load->view('adminpanel/event/'.$getTypename,$data);
          }
       }else{
            if(!($this->upload->do_upload('image'))){
              $this->load->library('adminpanel/event');
              $returnData = $this->event->getEventdata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> $this->upload->display_errors(),'return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/event" );
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/event/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/event');
              $returnData = $this->event->getEventdata($getTypename);
              $image = $this->upload->data();
              unlink('uploads/'.$image['file_name']);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/event" );
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/event/'.$getTypename,$data);
            }
      }
     }

  }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
  }

  }

  function register_banner($getTypename=''){
          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/event');
             $returnData = $this->event->getBannerdata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
             header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/event/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('name','Banner Name','required|xss_clean|min_length[3]|max_length[100]');

             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if(($this->form_validation->run())){
                if(!($this->upload->do_upload('image'))){
                  $this->load->library('adminpanel/event');
                  $returnData = $this->event->getBannerdata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/event/'.$getTypename,$data);
                }else{
                  $image_info     = $this->upload->data();
                  $image_name     = $image_info['file_name'];
                  $name           = $this->input->post('name');
                  $postData       = ['image'=>$image_name,'name'=>$name];
                  $this->load->library('adminpanel/event');
                  $returnData_1     = $this->event->register_data_banner($postData);
                  $this->load->library('adminpanel/event');
                  $returnData = $this->event->getBannerdata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>$returnData_1['message'],'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/event/'.$getTypename,$data);

                }
             }else{
                  if(!($this->upload->do_upload('image'))){
                    $this->load->library('adminpanel/event');
                    $returnData = $this->event->getBannerdata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/event/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/event');
                    $returnData = $this->event->getBannerdata($getTypename);
                    $image = $this->upload->data();
                    unlink('uploads/'.$image['file_name']);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/event/'.$getTypename,$data);
                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

    function updatebannerdata($getTypename=''){
          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/event');
             $returnData = $this->event->getBannerdata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
             header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/event/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('nameupdate','Banner Name','required|xss_clean|min_length[3]|max_length[100]');
             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if(($this->form_validation->run())){
                if(!($this->upload->do_upload('imageupdate'))){
                  $this->load->library('adminpanel/event');
                  $returnData = $this->event->getBannerdata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/event/'.$getTypename,$data);
                }else{
                  $image_info     = $this->upload->data();
                  $image_name     = $image_info['file_name'];
                  $id           = $this->input->post('idupdate');
                  $name           = $this->input->post('nameupdate');
                  $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name];
                  $this->load->library('adminpanel/event');
                  $returnData_1     = $this->event->update_data_banner($postData);
                  $this->load->library('adminpanel/event');
                  $returnData = $this->event->getBannerdata($getTypename);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>$returnData_1['message'],'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/event/'.$getTypename,$data);

                }
             }else{
                  if(!($this->upload->do_upload('image'))){
                    $this->load->library('adminpanel/event');
                    $returnData = $this->event->getBannerdata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/event/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/event');
                    $returnData = $this->event->getBannerdata($getTypename);
                    $image = $this->upload->data();
                    unlink('uploads/'.$image['file_name']);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/banner" );
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/event/'.$getTypename,$data);
                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

  function deleteeventdata($getTypename=''){

    if($this->session->userdata('username') != ''){
      $row_id = $this->input->post('id');
      $this->load->library('adminpanel/event');
      $message_deleted = $this->event->deleteEventdata($row_id);
      $this->load->library('adminpanel/event');
      $returnData = $this->event->getEventdata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>$message_deleted['message']);
      $getTypename   = lcfirst($getTypename);
      header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/event/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

    function deletebannerdata($getTypename=''){
    if($this->session->userdata('username') != ''){
      $row_id = $this->input->post('id');
      $this->load->library('adminpanel/event');
      $message_deleted = $this->event->deleteBannerdata($row_id);
      $this->load->library('adminpanel/event');
      $returnData = $this->event->getBannerdata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_update'=> '','return_message'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>$message_deleted['message']);
      $getTypename   = lcfirst($getTypename);
      header( "refresh:2;url=https://thinkkosovo.cleverapps.io/".$getTypename );
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/event/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }


/*---------------------------------------------------------------------------------------INEED---------------------------------------------------------------------------------------------------------*/


  function place($getTypename='Place'){

    if($this->session->userdata('username') != ''){
      $this->load->library('adminpanel/ineed');
      $returnData = $this->ineed->getIneeddata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
      $getTypename   = lcfirst($getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/ineed/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }


    function travelagency($getTypename='Travelagency'){
      if($this->session->userdata('username') != ''){
        $this->load->library('adminpanel/ineed');
        $returnData = $this->ineed->getIneeddata($getTypename);
        $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
        $getTypename   = lcfirst($getTypename);
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
      }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
      }
    }

    function food($getTypename='Food'){

      if($this->session->userdata('username') != ''){
        $this->load->library('adminpanel/ineed');
        $returnData = $this->ineed->getIneeddata($getTypename);
        $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
        $getTypename   = lcfirst($getTypename);
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
      }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
      }
    }

    function coffe($getTypename='Coffe'){

      if($this->session->userdata('username') != ''){
        $this->load->library('adminpanel/ineed');
        $returnData = $this->ineed->getIneeddata($getTypename);
        $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
        $getTypename   = lcfirst($getTypename);
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
      }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
      }
    }

    function taxi($getTypename='Taxi'){

      if($this->session->userdata('username') != ''){
        $this->load->library('adminpanel/ineed');
        $returnData = $this->ineed->getIneeddata($getTypename);
        $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
        $getTypename   = lcfirst($getTypename);
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
      }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
      }
    }

    function rent($getTypename='Rent'){

      if($this->session->userdata('username') != ''){
        $this->load->library('adminpanel/ineed');
        $returnData = $this->ineed->getIneeddata($getTypename);
        $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
        $getTypename   = lcfirst($getTypename);
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
      }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
      }
    }


  function register_place($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/ineed');
       $returnData = $this->ineed->getIneeddata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
       header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/ineed/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('name','Place Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('location','Address','required|xss_clean|min_length[3]|max_length[500]');
       $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[9]|max_length[100]');
       $this->form_validation->set_rules('description','Description','required|xss_clean|min_length[3]|max_length[1000]');
       $this->form_validation->set_rules('stars','Star of Place','required|xss_clean|min_length[3]|max_length[4]');
       $this->form_validation->set_rules('url','Url','xss_clean');
       $this->form_validation->set_rules('email','Email','xss_clean');
       $this->form_validation->set_rules('latitude','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitude','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('image'))){
            if(($_FILES['gallery']['name'][0]) != ''){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }else{
            if(($_FILES['gallery']['name'][0]) != ''){

              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $name           = $this->input->post('name');
              $location       = $this->input->post('location');
              $city           = $this->input->post('city');
              $telephone      = $this->input->post('telephone');
              $description    = $this->input->post('description');
              $stars          = $this->input->post('stars');
              $latitude       = $this->input->post('latitude');
              $longitude      = $this->input->post('longitude');
              $offer          = $this->input->post('offer');
              $type           = $this->input->post('type_ineed');
              $url            = $this->input->post('url');
              $email           = $this->input->post('email');

              $data = [];
              $count = count($_FILES['gallery']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['gallery']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

                  $config['upload_path'] = 'uploads/';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['gallery']['name'][$i];

                  $this->load->library('upload',$config);

                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[] = $filename;
                  }
                }

              }
              $postData       = ['image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'offer'=>$offer,'type'=>$type,'url'=>$url,'email'=>$email];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->register_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=>'','return_message'=>$returnData_1['message'],'error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }
       }else{
            if(!($this->upload->do_upload('image'))){
              if(($_FILES['gallery']['name'][0]) != ''){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
            }else{
                if(($_FILES['gallery']['name'][0]) != ''){
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }else{
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/place");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }

            }
      }
     }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function updateplacedata($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/ineed');
       $returnData = $this->ineed->getIneeddata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
       header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/ineed/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('nameupdate','Place Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('locationupdate','Address','required|xss_clean|min_length[3]|max_length[500]');
       $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephoneupdate','Telephone','required|xss_clean|min_length[9]|max_length[100]');
       $this->form_validation->set_rules('descriptionupdate','Description','required|xss_clean|min_length[3]|max_length[1000]');
       $this->form_validation->set_rules('starsupdate','Star of Place','required|xss_clean|min_length[3]|max_length[4]');
       $this->form_validation->set_rules('urlupdate','Url','xss_clean');
       $this->form_validation->set_rules('emailupdate','Email','xss_clean');
       $this->form_validation->set_rules('latitudeupdate','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitudeupdate','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('imageupdate'))){
            if(($_FILES['galleryupdate']['name'][0]) != ''){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }else{
            if(($_FILES['galleryupdate']['name'][0]) != ''){
              $image_info     = $this->upload->data();
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $id             = $this->input->post('idupdate');
              $name           = $this->input->post('nameupdate');
              $location       = $this->input->post('locationupdate');
              $city           = $this->input->post('cityupdate');
              $telephone      = $this->input->post('telephoneupdate');
              $description    = $this->input->post('descriptionupdate');
              $stars          = $this->input->post('starsupdate');
              $latitude       = $this->input->post('latitudeupdate');
              $longitude      = $this->input->post('longitudeupdate');
              $type           = $this->input->post('type_ineedupdate');
              $url            = $this->input->post('urlupdate');
              $email          = $this->input->post('emailupdate');

              $data = [];
              $count = count($_FILES['galleryupdate']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['galleryupdate']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['galleryupdate']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['galleryupdate']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['galleryupdate']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['galleryupdate']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['galleryupdate']['size'][$i];

                  $config['upload_path'] = 'uploads/';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['galleryupdate']['name'][$i];

                  $this->load->library('upload',$config);

                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[] = $filename;
                  }
                }

              }
              $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'type'=>$type,'url'=>$url,'email'=>$email];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->update_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=>'','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>$returnData_1['message'],'error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header("refresh:3;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }
       }else{
            if(!($this->upload->do_upload('imageupdate'))){
              if(($_FILES['galleryupdate']['name'][0]) != ''){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'<p>No photos found for upload.</p>','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
            }else{
                if(($_FILES['galleryupdate']['name'][0]) != ''){
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }else{
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/place");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }

            }
      }
     }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }


  function register_travelagency($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/ineed');
       $returnData = $this->ineed->getIneeddata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
       header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/ineed/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('name','Travel Agency Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('location','Address','required|xss_clean|min_length[3]|max_length[500]');
       $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[9]|max_length[100]');
       $this->form_validation->set_rules('description','Description','required|xss_clean|min_length[3]|max_length[1000]');
       $this->form_validation->set_rules('stars','Star of Travel Agency','required|xss_clean|min_length[3]|max_length[4]');
       $this->form_validation->set_rules('url','Url','xss_clean');
       $this->form_validation->set_rules('email','Email','xss_clean');
       $this->form_validation->set_rules('latitude','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitude','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('image'))){
            if(($_FILES['gallery']['name'][0]) != ''){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }else{
            if(($_FILES['gallery']['name'][0]) != ''){
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $name           = $this->input->post('name');
              $location       = $this->input->post('location');
              $city           = $this->input->post('city');
              $telephone      = $this->input->post('telephone');
              $description    = $this->input->post('description');
              $stars          = $this->input->post('stars');
              $latitude       = $this->input->post('latitude');
              $longitude      = $this->input->post('longitude');
              $offer          = $this->input->post('offer');
              $type           = $this->input->post('type_ineed');
              $url            = $this->input->post('url');
              $email          = $this->input->post('email');

              $data = [];
              $count = count($_FILES['gallery']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['gallery']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

                  $config['upload_path'] = 'uploads/';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['gallery']['name'][$i];

                  $this->load->library('upload',$config);

                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[] = $filename;
                  }
                }

              }
              $postData       = ['image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'offer'=>$offer,'type'=>$type,'url'=>$url,'email'=>$email];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->register_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=>'','return_message'=>$returnData_1['message'],'error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }
       }else{
            if(!($this->upload->do_upload('image'))){
              if(($_FILES['gallery']['name'][0]) != ''){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
            }else{
                if(($_FILES['gallery']['name'][0]) != ''){
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }else{
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/travelagency");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }

            }
      }
     }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function updatetravelagencydata($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/ineed');
       $returnData = $this->ineed->getIneeddata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
        header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/ineed/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('nameupdate','Travel Agency Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('locationupdate','Address','required|xss_clean|min_length[3]|max_length[500]');
       $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephoneupdate','Telephone','required|xss_clean|min_length[9]|max_length[100]');
       $this->form_validation->set_rules('descriptionupdate','Description','required|xss_clean|min_length[3]|max_length[1000]');
       $this->form_validation->set_rules('starsupdate','Star of Travel Agency','required|xss_clean|min_length[3]|max_length[4]');
       $this->form_validation->set_rules('updateurl','Url','xss_clean');
       $this->form_validation->set_rules('updateemail','Email','xss_clean');
       $this->form_validation->set_rules('latitudeupdate','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitudeupdate','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('imageupdate'))){
            if(($_FILES['galleryupdate']['name'][0]) != ''){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }else{
            if(($_FILES['galleryupdate']['name'][0]) != ''){
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $id             = $this->input->post('idupdate');
              $name           = $this->input->post('nameupdate');
              $location       = $this->input->post('locationupdate');
              $city           = $this->input->post('cityupdate');
              $telephone      = $this->input->post('telephoneupdate');
              $description    = $this->input->post('descriptionupdate');
              $stars          = $this->input->post('starsupdate');
              $latitude       = $this->input->post('latitudeupdate');
              $longitude      = $this->input->post('longitudeupdate');
              $type           = $this->input->post('type_ineedupdate');
              $url            = $this->input->post('urlupdate');
              $email          = $this->input->post('emailupdate');

              $data = [];
              $count = count($_FILES['galleryupdate']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['galleryupdate']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['galleryupdate']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['galleryupdate']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['galleryupdate']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['galleryupdate']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['galleryupdate']['size'][$i];

                  $config['upload_path'] = 'uploads/';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['galleryupdate']['name'][$i];

                  $this->load->library('upload',$config);

                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[] = $filename;
                  }
                }

              }
              $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'type'=>$type,'url'=>$url,'email'=>$email];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->update_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=>'','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>$returnData_1['message'],'error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }
       }else{
            if(!($this->upload->do_upload('imageupdate'))){
              if(($_FILES['galleryupdate']['name'][0]) != ''){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'<p>No photos found for upload.</p>','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
            }else{
                if(($_FILES['galleryupdate']['name'][0]) != ''){
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }else{
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/travelagency");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }

            }
      }
     }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function register_food($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/ineed');
       $returnData = $this->ineed->getIneeddata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
        header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/ineed/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('name','Food Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('location','Address','required|xss_clean|min_length[3]|max_length[500]');
       $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[9]|max_length[100]');
       $this->form_validation->set_rules('description','Description','required|xss_clean|min_length[3]|max_length[1000]');
       $this->form_validation->set_rules('stars','Star of Food Service','required|xss_clean|min_length[3]|max_length[4]');
       $this->form_validation->set_rules('url','Url','xss_clean');
       $this->form_validation->set_rules('email','Email','xss_clean');
       $this->form_validation->set_rules('latitude','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitude','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('image'))){
            if(($_FILES['gallery']['name'][0]) != ''){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }else{
            if(($_FILES['gallery']['name'][0]) != ''){
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $name           = $this->input->post('name');
              $location       = $this->input->post('location');
              $city           = $this->input->post('city');
              $telephone      = $this->input->post('telephone');
              $description    = $this->input->post('description');
              $stars          = $this->input->post('stars');
              $latitude       = $this->input->post('latitude');
              $longitude      = $this->input->post('longitude');
              $offer          = $this->input->post('offer');
              $type           = $this->input->post('type_ineed');
              $url            = $this->input->post('url');
              $email          = $this->input->post('email');

              $data = [];
              $count = count($_FILES['gallery']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['gallery']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

                  $config['upload_path'] = 'uploads/';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['gallery']['name'][$i];

                  $this->load->library('upload',$config);

                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[] = $filename;
                  }
                }

              }
              $postData       = ['image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'offer'=>$offer,'type'=>$type,'url'=>$url,'email'=>$email];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->register_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=>'','return_message'=>$returnData_1['message'],'error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }
       }else{
            if(!($this->upload->do_upload('image'))){
              if(($_FILES['gallery']['name'][0]) != ''){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
            }else{
                if(($_FILES['gallery']['name'][0]) != ''){
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }else{
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:2;url=https://thinkkosovo.cleverapps.io/food");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }

            }
      }
     }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function updatefooddata($getTypename=''){
    if($this->session->userdata('username') != ''){
     if($this->input->post()==null){
       $this->load->library('adminpanel/ineed');
       $returnData = $this->ineed->getIneeddata($getTypename);
       $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
       $getTypename   = lcfirst($getTypename);
       header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
       $this->load->view('adminpanel/header');
       $this->load->view('adminpanel/ineed/'.$getTypename,$data);
     }else{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('nameupdate','Food Name','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('locationupdate','Address','required|xss_clean|min_length[3]|max_length[500]');
       $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
       $this->form_validation->set_rules('telephoneupdate','Telephone','required|xss_clean|min_length[9]|max_length[100]');
       $this->form_validation->set_rules('descriptionupdate','Description','required|xss_clean|min_length[3]|max_length[1000]');
       $this->form_validation->set_rules('starsupdate','Star of Food Service','required|xss_clean|min_length[3]|max_length[4]');
       $this->form_validation->set_rules('urlupdate','Url','xss_clean');
       $this->form_validation->set_rules('emailupdate','Email','xss_clean');
       $this->form_validation->set_rules('latitudeupdate','Latitude','required|xss_clean|min_length[3]|max_length[50]');
       $this->form_validation->set_rules('longitudeupdate','Longitude','required|xss_clean|min_length[3]|max_length[50]');
       $config['upload_path']   = 'uploads/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $config['encrypt_name']  = FALSE;
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
      if(($this->form_validation->run())){
          if(!($this->upload->do_upload('imageupdate'))){
            if(($_FILES['galleryupdate']['name'][0]) != ''){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }else{
            if(($_FILES['galleryupdate']['name'][0]) != ''){
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $id             = $this->input->post('idupdate');
              $name           = $this->input->post('nameupdate');
              $location       = $this->input->post('locationupdate');
              $city           = $this->input->post('cityupdate');
              $telephone      = $this->input->post('telephoneupdate');
              $description    = $this->input->post('descriptionupdate');
              $stars          = $this->input->post('starsupdate');
              $latitude       = $this->input->post('latitudeupdate');
              $longitude      = $this->input->post('longitudeupdate');
              $type           = $this->input->post('type_ineedupdate');
              $url            = $this->input->post('urlupdate');
              $email          = $this->input->post('emailupdate');

              $data = [];
              $count = count($_FILES['galleryupdate']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['galleryupdate']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['galleryupdate']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['galleryupdate']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['galleryupdate']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['galleryupdate']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['galleryupdate']['size'][$i];

                  $config['upload_path'] = 'uploads/';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['galleryupdate']['name'][$i];

                  $this->load->library('upload',$config);

                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data[] = $filename;
                  }
                }

              }
              $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'type'=>$type,'url'=>$url,'email'=>$email];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->update_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=>'','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>$returnData_1['message'],'error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }
          }
       }else{
            if(!($this->upload->do_upload('imageupdate'))){
              if(($_FILES['galleryupdate']['name'][0]) != ''){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'<p>No photos found for upload.</p>','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
            }else{
                if(($_FILES['galleryupdate']['name'][0]) != ''){
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }else{
                  $this->load->library('adminpanel/ineed');
                  $returnData = $this->ineed->getIneeddata($getTypename);
                  $image = $this->upload->data();
                  unlink('uploads/'.$image['file_name']);
                  $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                  $getTypename   = lcfirst($getTypename);
                  header( "refresh:3;url=https://thinkkosovo.cleverapps.io/food");
                  $this->load->view('adminpanel/header');
                  $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                }

            }
      }
     }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }



  function register_coffe($getTypename=''){
          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/ineed');
             $returnData = $this->ineed->getIneeddata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/ineed/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('name','Coffe Name','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('location','Address','required|xss_clean|min_length[3]|max_length[500]');
             $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[9]|max_length[100]');
             $this->form_validation->set_rules('description','Description','required|xss_clean|min_length[3]|max_length[1000]');
             $this->form_validation->set_rules('stars','Star of Coffe Service','required|xss_clean|min_length[3]|max_length[4]');
             $this->form_validation->set_rules('url','Url','xss_clean');
             $this->form_validation->set_rules('email','Email','xss_clean');
             $this->form_validation->set_rules('latitude','Latitude','required|xss_clean|min_length[3]|max_length[50]');
             $this->form_validation->set_rules('longitude','Longitude','required|xss_clean|min_length[3]|max_length[50]');
             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if(($this->form_validation->run())){
                if(!($this->upload->do_upload('image'))){
                  if(($_FILES['gallery']['name'][0]) != ''){
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }
                }else{
                  if(($_FILES['gallery']['name'][0]) != ''){
                    $image_info     = $this->upload->data();
                    $image_name     = $image_info['file_name'];
                    $name           = $this->input->post('name');
                    $location       = $this->input->post('location');
                    $city           = $this->input->post('city');
                    $telephone      = $this->input->post('telephone');
                    $description    = $this->input->post('description');
                    $stars          = $this->input->post('stars');
                    $latitude       = $this->input->post('latitude');
                    $longitude      = $this->input->post('longitude');
                    $offer          = $this->input->post('offer');
                    $type           = $this->input->post('type_ineed');
                    $url            = $this->input->post('url');
                    $email          = $this->input->post('email');

                    $data = [];
                    $count = count($_FILES['gallery']['name']);
                    for($i=0;$i<$count;$i++){
                      if(!empty($_FILES['gallery']['name'][$i])){
                        $_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '5000';
                        $config['file_name'] = $_FILES['gallery']['name'][$i];

                        $this->load->library('upload',$config);

                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];

                          $data[] = $filename;
                        }
                      }

                    }
                    $postData       = ['image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'offer'=>$offer,'type'=>$type,'url'=>$url,'email'=>$email];
                    $this->load->library('adminpanel/ineed');
                    $returnData_1     = $this->ineed->register_data($postData);
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'error_message_1'=>'','return_message'=>$returnData_1['message'],'error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }
                }
             }else{
                  if(!($this->upload->do_upload('image'))){
                    if(($_FILES['gallery']['name'][0]) != ''){
                      $this->load->library('adminpanel/ineed');
                      $returnData = $this->ineed->getIneeddata($getTypename);
                      $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                      $getTypename   = lcfirst($getTypename);
                      header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                      $this->load->view('adminpanel/header');
                      $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                    }else{
                      $this->load->library('adminpanel/ineed');
                      $returnData = $this->ineed->getIneeddata($getTypename);
                      $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_1'=>'No photos found for upload.','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                      $getTypename   = lcfirst($getTypename);
                      header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                      $this->load->view('adminpanel/header');
                      $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                    }
                  }else{
                      if(($_FILES['gallery']['name'][0]) != ''){
                        $this->load->library('adminpanel/ineed');
                        $returnData = $this->ineed->getIneeddata($getTypename);
                        $image = $this->upload->data();
                        unlink('uploads/'.$image['file_name']);
                        $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                        $getTypename   = lcfirst($getTypename);
                        header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                        $this->load->view('adminpanel/header');
                        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                      }else{
                        $this->load->library('adminpanel/ineed');
                        $returnData = $this->ineed->getIneeddata($getTypename);
                        $image = $this->upload->data();
                        unlink('uploads/'.$image['file_name']);
                        $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> 'No photos found for upload.','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                        $getTypename   = lcfirst($getTypename);
                        header( "refresh:2;url=https://thinkkosovo.cleverapps.io/coffe");
                        $this->load->view('adminpanel/header');
                        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                      }

                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

  function updatecoffedata($getTypename=''){
          if($this->session->userdata('username') != ''){
           if($this->input->post()==null){
             $this->load->library('adminpanel/ineed');
             $returnData = $this->ineed->getIneeddata($getTypename);
             $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
             $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
             $this->load->view('adminpanel/header');
             $this->load->view('adminpanel/ineed/'.$getTypename,$data);
           }else{
             $this->load->library('form_validation');
             $this->form_validation->set_rules('nameupdate','Coffe Name','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('locationupdate','Address','required|xss_clean|min_length[3]|max_length[500]');
             $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
             $this->form_validation->set_rules('telephoneupdate','Telephone','required|xss_clean|min_length[9]|max_length[100]');
             $this->form_validation->set_rules('descriptionupdate','Description','required|xss_clean|min_length[3]|max_length[1000]');
             $this->form_validation->set_rules('starsupdate','Star of Coffe Service','required|xss_clean|min_length[3]|max_length[4]');
             $this->form_validation->set_rules('urlupdate','Url','xss_clean');
             $this->form_validation->set_rules('emailupdate','Email','xss_clean');
             $this->form_validation->set_rules('latitudeupdate','Latitude','required|xss_clean|min_length[3]|max_length[50]');
             $this->form_validation->set_rules('longitudeupdate','Longitude','required|xss_clean|min_length[3]|max_length[50]');
             $config['upload_path']   = 'uploads/';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['encrypt_name']  = FALSE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
            if(($this->form_validation->run())){
                if(!($this->upload->do_upload('imageupdate'))){
                  if(($_FILES['galleryupdate']['name'][0]) != ''){
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }
                }else{
                  if(($_FILES['galleryupdate']['name'][0]) != ''){
                    $image_info     = $this->upload->data();
                    $image_name     = $image_info['file_name'];
                    $id             = $this->input->post('idupdate');
                    $name           = $this->input->post('nameupdate');
                    $location       = $this->input->post('locationupdate');
                    $city           = $this->input->post('cityupdate');
                    $telephone        = $this->input->post('telephoneupdate');
                    $description    = $this->input->post('descriptionupdate');
                    $stars          = $this->input->post('starsupdate');
                    $latitude       = $this->input->post('latitudeupdate');
                    $longitude      = $this->input->post('longitudeupdate');
    
                    $type           = $this->input->post('type_ineedupdate');
                    $url            = $this->input->post('urlupdate');
                    $email          = $this->input->post('emailupdate');

                    $data = [];
                    $count = count($_FILES['galleryupdate']['name']);
                    for($i=0;$i<$count;$i++){
                      if(!empty($_FILES['galleryupdate']['name'][$i])){
                        $_FILES['file']['name'] = $_FILES['galleryupdate']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['galleryupdate']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['galleryupdate']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['galleryupdate']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['galleryupdate']['size'][$i];

                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '5000';
                        $config['file_name'] = $_FILES['galleryupdate']['name'][$i];

                        $this->load->library('upload',$config);

                        if($this->upload->do_upload('file')){
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];

                          $data[] = $filename;
                        }
                      }

                    }
                    $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'location'=>$location,'city'=>$city,'telephone'=>$telephone,'description'=>$description,'stars'=>$stars,'latitude'=>$latitude,'longitude'=>$longitude,'gallery'=>$data,'type'=>$type,'url'=>$url,'email'=>$email];
                    $this->load->library('adminpanel/ineed');
                    $returnData_1     = $this->ineed->update_data($postData);
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=>'','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>$returnData_1['message'],'error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }else{
                    $this->load->library('adminpanel/ineed');
                    $returnData = $this->ineed->getIneeddata($getTypename);
                    $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                    $getTypename   = lcfirst($getTypename);
                    header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                    $this->load->view('adminpanel/header');
                    $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                  }
                }
             }else{
                  if(!($this->upload->do_upload('image'))){
                    if(($_FILES['galleryupdate']['name'][0]) != ''){
                      $this->load->library('adminpanel/ineed');
                      $returnData = $this->ineed->getIneeddata($getTypename);
                      $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                      $getTypename   = lcfirst($getTypename);
                      header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                      $this->load->view('adminpanel/header');
                      $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                    }else{
                      $this->load->library('adminpanel/ineed');
                      $returnData = $this->ineed->getIneeddata($getTypename);
                      $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_1'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                      $getTypename   = lcfirst($getTypename);
                      header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                      $this->load->view('adminpanel/header');
                      $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                    }
                  }else{
                      if(($_FILES['galleryupdate']['name'][0]) != ''){
                        $this->load->library('adminpanel/ineed');
                        $returnData = $this->ineed->getIneeddata($getTypename);
                        $image = $this->upload->data();
                        unlink('uploads/'.$image['file_name']);
                        $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'','table_data'=>$returnData,'message_deleted'=>'');
                        $getTypename   = lcfirst($getTypename);
                        header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                        $this->load->view('adminpanel/header');
                        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                      }else{
                        $this->load->library('adminpanel/ineed');
                        $returnData = $this->ineed->getIneeddata($getTypename);
                        $image = $this->upload->data();
                        unlink('uploads/'.$image['file_name']);
                        $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','error_message_1'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','error_message_update_1'=>'<p>No photos found for upload.</p>','table_data'=>$returnData,'message_deleted'=>'');
                        $getTypename   = lcfirst($getTypename);
                        header( "refresh:3;url=https://thinkkosovo.cleverapps.io/coffe");
                        $this->load->view('adminpanel/header');
                        $this->load->view('adminpanel/ineed/'.$getTypename,$data);
                      }

                  }
            }
           }

        }else{
            redirect('https://thinkkosovo.cleverapps.io/admin');
        }
  }

  function register_taxi($getTypename=''){
      if($this->session->userdata('username') != ''){
       if($this->input->post()==null){
         $this->load->library('adminpanel/ineed');
         $returnData = $this->ineed->getIneeddata($getTypename);
         $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
         $getTypename   = lcfirst($getTypename);
          header( "refresh:2;url=https://thinkkosovo.cleverapps.io/taxi");
         $this->load->view('adminpanel/header');
         $this->load->view('adminpanel/ineed/'.$getTypename,$data);
       }else{
         $this->load->library('form_validation');
         $this->form_validation->set_rules('name','Taxi Name','required|xss_clean|min_length[3]|max_length[100]');
         $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[9]|max_length[100]');
         $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
         $this->form_validation->set_rules('stars','Star of Taxi','required|xss_clean|min_length[3]|max_length[4]');
         $config['upload_path']   = 'uploads/';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['encrypt_name']  = FALSE;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
        if(($this->form_validation->run())){

            if(!($this->upload->do_upload('image'))){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/taxi");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{

              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $name           = $this->input->post('name');
              $telephone      = $this->input->post('telephone');
              $city           = $this->input->post('city');
              $stars          = $this->input->post('stars');
              $type           = $this->input->post('type_ineed');
              $postData       = ['image'=>$image_name,'name'=>$name,'telephone'=>$telephone,'city'=>$city,'stars'=>$stars,'type'=>$type];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->register_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>$returnData_1['message'],'error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/taxi");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);

            }
         }else{
              if(!($this->upload->do_upload('image'))){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/taxi");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $image = $this->upload->data();
                unlink('uploads/'.$image['file_name']);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/taxi");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
        }
       }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function updatetaxidata($getTypename=''){
      if($this->session->userdata('username') != ''){
       if($this->input->post()==null){
         $this->load->library('adminpanel/ineed');
         $returnData = $this->ineed->getIneeddata($getTypename);
         $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
         $getTypename   = lcfirst($getTypename);
         header( "refresh:3;url=https://thinkkosovo.cleverapps.io/taxi");
         $this->load->view('adminpanel/header');
         $this->load->view('adminpanel/ineed/'.$getTypename,$data);
       }else{
         $this->load->library('form_validation');
         $this->form_validation->set_rules('nameupdate','Taxi Name','required|xss_clean|min_length[3]|max_length[100]');
         $this->form_validation->set_rules('telephoneupdate','Telephone','required|xss_clean|min_length[9]|max_length[100]');
         $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
         $this->form_validation->set_rules('starsupdate','Star of Taxi','required|xss_clean|min_length[3]|max_length[4]');
         $config['upload_path']   = 'uploads/';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['encrypt_name']  = FALSE;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
        if(($this->form_validation->run())){
            if(!($this->upload->do_upload('imageupdate'))){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/taxi");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $id             = $this->input->post('idupdate');
              $name           = $this->input->post('nameupdate');
              $telephone      = $this->input->post('telephoneupdate');
              $city           = $this->input->post('cityupdate');
              $stars          = $this->input->post('starsupdate');
              $type           = $this->input->post('type_ineedupdate');
              $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'telephone'=>$telephone,'city'=>$city,'stars'=>$stars,'type'=>$type];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->update_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>$returnData_1['message'],'table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/taxi");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);

            }
         }else{
              if(!($this->upload->do_upload('imageupdate'))){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/taxi");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $image = $this->upload->data();
                unlink('uploads/'.$image['file_name']);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/taxi");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
        }
       }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function register_rent($getTypename=''){
      if($this->session->userdata('username') != ''){
       if($this->input->post()==null){
         $this->load->library('adminpanel/ineed');
         $returnData = $this->ineed->getIneeddata($getTypename);
         $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
         $getTypename   = lcfirst($getTypename);
          header( "refresh:2;url=https://thinkkosovo.cleverapps.io/rent");
         $this->load->view('adminpanel/header');
         $this->load->view('adminpanel/ineed/'.$getTypename,$data);
       }else{
         $this->load->library('form_validation');
         $this->form_validation->set_rules('name','Rent Name','required|xss_clean|min_length[3]|max_length[100]');
         $this->form_validation->set_rules('telephone','Telephone','required|xss_clean|min_length[9]|max_length[100]');
         $this->form_validation->set_rules('location','Address','required|xss_clean|min_length[3]|max_length[500]');
         $this->form_validation->set_rules('city','City','required|xss_clean|min_length[3]|max_length[100]');
         $config['upload_path']   = 'uploads/';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['encrypt_name']  = FALSE;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
        if(($this->form_validation->run())){
            if(!($this->upload->do_upload('image'))){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/rent");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $name           = $this->input->post('name');
              $telephone      = $this->input->post('telephone');
              $location       = $this->input->post('location');
              $city           = $this->input->post('city');
              $type           = $this->input->post('type_ineed');
              $postData       = ['image'=>$image_name,'name'=>$name,'telephone'=>$telephone,'city'=>$city,'location'=>$location,'type'=>$type];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->register_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>$returnData_1['message'],'error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:2;url=https://thinkkosovo.cleverapps.io/rent");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);

            }
         }else{
              if(!($this->upload->do_upload('image'))){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> $this->upload->display_errors(),'return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/rent");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $image = $this->upload->data();
                unlink('uploads/'.$image['file_name']);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:2;url=https://thinkkosovo.cleverapps.io/rent");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
        }
       }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function updaterentdata($getTypename=''){
      if($this->session->userdata('username') != ''){
       if($this->input->post()==null){
         $this->load->library('adminpanel/ineed');
         $returnData = $this->ineed->getIneeddata($getTypename);
         $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
         $getTypename   = lcfirst($getTypename);
         header( "refresh:3;url=https://thinkkosovo.cleverapps.io/rent");
         $this->load->view('adminpanel/header');
         $this->load->view('adminpanel/ineed/'.$getTypename,$data);
       }else{
         $this->load->library('form_validation');
         $this->form_validation->set_rules('nameupdate','Rent Name','required|xss_clean|min_length[3]|max_length[100]');
         $this->form_validation->set_rules('telephoneupdate','Telephone','required|xss_clean|min_length[9]|max_length[100]');
         $this->form_validation->set_rules('locationupdate','Address','required|xss_clean|min_length[3]|max_length[500]');
         $this->form_validation->set_rules('cityupdate','City','required|xss_clean|min_length[3]|max_length[100]');
         $config['upload_path']   = 'uploads/';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['encrypt_name']  = FALSE;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
        if(($this->form_validation->run())){
            if(!($this->upload->do_upload('imageupdate'))){
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/rent");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);
            }else{
              $image_info     = $this->upload->data();
              $image_name     = $image_info['file_name'];
              $id             = $this->input->post('idupdate');
              $name           = $this->input->post('nameupdate');
              $telephone      = $this->input->post('telephoneupdate');
              $location       = $this->input->post('locationupdate');
              $city           = $this->input->post('cityupdate');
              $type           = $this->input->post('type_ineedupdate');
              $postData       = ['id'=>$id,'image'=>$image_name,'name'=>$name,'telephone'=>$telephone,'city'=>$city,'location'=>$location,'type'=>$type];
              $this->load->library('adminpanel/ineed');
              $returnData_1     = $this->ineed->update_data($postData);
              $this->load->library('adminpanel/ineed');
              $returnData = $this->ineed->getIneeddata($getTypename);
              $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>$returnData_1['message'],'table_data'=>$returnData,'message_deleted'=>'');
              $getTypename   = lcfirst($getTypename);
              header( "refresh:3;url=https://thinkkosovo.cleverapps.io/rent");
              $this->load->view('adminpanel/header');
              $this->load->view('adminpanel/ineed/'.$getTypename,$data);

            }
         }else{
              if(!($this->upload->do_upload('imageupdate'))){
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>$this->upload->display_errors(),'return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/rent");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }else{
                $this->load->library('adminpanel/ineed');
                $returnData = $this->ineed->getIneeddata($getTypename);
                $image = $this->upload->data();
                unlink('uploads/'.$image['file_name']);
                $data =array('username' =>  $this->session->userdata('username'),'error_message'=> '','return_message'=>'','error_message_update'=>'','return_message_update'=>'','table_data'=>$returnData,'message_deleted'=>'');
                $getTypename   = lcfirst($getTypename);
                header( "refresh:3;url=https://thinkkosovo.cleverapps.io/rent");
                $this->load->view('adminpanel/header');
                $this->load->view('adminpanel/ineed/'.$getTypename,$data);
              }
        }
       }

    }else{
        redirect('https://thinkkosovo.cleverapps.io/admin');
    }
  }

  function deleteineeddata($getTypename=''){

    if($this->session->userdata('username') != ''){
      $row_id = $this->input->post('id');
      $this->load->library('adminpanel/ineed');
      $message_deleted = $this->ineed->deleteIneeddata($row_id);
      $this->load->library('adminpanel/ineed');
      $returnData = $this->ineed->getIneeddata($getTypename);
      $data =array('username' =>  $this->session->userdata('username'),'error_message'=>'','error_message_1'=>'','return_message'=>'','table_data'=>$returnData,'message_deleted'=>$message_deleted['message']);
      $getTypename   = lcfirst($getTypename);
      header( "refresh:3;url=https://thinkkosovo.cleverapps.io/".$getTypename);
      $this->load->view('adminpanel/header');
      $this->load->view('adminpanel/ineed/'.$getTypename,$data);
    }else{
      redirect('https://thinkkosovo.cleverapps.io/admin');
    }

  }





}

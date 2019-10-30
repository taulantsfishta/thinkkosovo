<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Europe/Berlin");
    $this->load->helper(array('form', 'url'));
    $this->load->helper('security');
    $this->load->library('form_validation');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  }

  function index()
  {
    $this->load->view('adminpanel/404.html');
    $data['heading']                    = "Error 404";
    $data['message']                    = " Unknown Path For This Request";
    $this->load->view('errors/html/error_404',$data);
  }

  function control($libraryName='',$methodName='',$methodExtradata=''){


      if ( ( (!empty($libraryName)) && (!empty($methodName)) ) || (!empty($methodExtradata)) ) {
          $this->load->library('api/'.$libraryName);
          $data                         = $this->$libraryName->controlData($methodName,$methodExtradata);


      }elseif(!empty($libraryName) && (empty($methodName) && empty($methodExtradata))){

          $data['status']               = false;
          $data['message']              = "select a method for '" .$libraryName."' library!";

        }
      exit (json_encode($data));
  }

}

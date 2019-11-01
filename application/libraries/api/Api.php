<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  function controlData($methodName,$methodExtradata=''){
  // /  $getData                 = $this->ci->input->post();
     $getData                   = json_decode(file_get_contents("php://input"),true);
     $getData                   = (isset($getData) && ('' != $getData)) ? $getData : '';
     if('getAppdata' == $methodName){
         $returnData    = $this->getAppdata($getData);

     }else{
         $returnData['status']      = false;
         $returnData['message']     = "Wrong method name";
     }
     // header('Content-type:application/json');
     return ($returnData);
  }

  function getAppdata($getData   = ''){

    $select_events = $this->ci->db->select('*')->from('event')->order_by('enddate','desc')->get()->result_array();
    $selectedData = [];
    $returnData =[];
    if(null != $select_events){
      foreach ($select_events as $key => $value) {
        $latitude_longitude = $value['latitude_longitude'];
        $strArray   = explode('_',$latitude_longitude);
        $latitude   = $strArray[0];
        $longitude  = $strArray[1];
        $today      = date('Y-m-d H:i:s');

        if( ((strtotime($value['startdate'])) < (strtotime($today))) && ((strtotime($value['enddate'])) < (strtotime($today)))  ){
         $selectedData[] =
                                                [

                                                 'id'              => $value['id'],
                                                 'name'            => $value['name'],
                                                 'place'           => $value['place'],
                                                 'city'            => $value['city'],
                                                 'startdate'       => $value['startdate'],
                                                 'enddate'         => $value['enddate'],
                                                 'info'            => $value['info'],
                                                 'email'           => $value['email'],
                                                 'telephone'       => $value['telephone'],
                                                 'eventStatus'     => 'ended',
                                                 'latitude'        => $latitude,
                                                 'longitude'       => $longitude,
                                                 'image'           => "http://192.168.0.14/thinkkosovo/uploads/".$value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                               ];

       }else if(((strtotime($value['startdate'])) < (strtotime($today))) && ((strtotime($value['enddate'])) > (strtotime($today)))){
          $selectedData[] =   [
                                                 'id'              => $value['id'],
                                                 'name'            => $value['name'],
                                                 'place'           => $value['place'],
                                                 'city'            => $value['city'],
                                                 'startdate'       => $value['startdate'],
                                                 'enddate'         => $value['enddate'],
                                                 'info'            => $value['info'],
                                                 'email'           => $value['email'],
                                                 'telephone'       => $value['telephone'],
                                                 'eventStatus'     => 'happening',
                                                 'latitude'        => $latitude,
                                                 'longitude'       => $longitude,
                                                 'image'           => "http://192.168.0.14/thinkkosovo/uploads/".$value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                               ];
        }else if(((strtotime($value['startdate'])) > (strtotime($today))) && ((strtotime($value['enddate'])) > (strtotime($today)))){
          $selectedData[] =   [
                                                 'id'              => $value['id'],
                                                 'name'            => $value['name'],
                                                 'place'           => $value['place'],
                                                 'city'            => $value['city'],
                                                 'startdate'       => $value['startdate'],
                                                 'enddate'         => $value['enddate'],
                                                 'info'            => $value['info'],
                                                 'email'           => $value['email'],
                                                 'telephone'       => $value['telephone'],
                                                 'eventStatus'     => 'upcoming',
                                                 'latitude'        => $latitude,
                                                 'longitude'       => $longitude,
                                                 'image'           => "http://192.168.0.14/thinkkosovo/uploads/".$value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                               ];
        }
      }

      $returnData[] = [$selectedData];
      }else{
      $returnData []= [false];
    } 

    $select_ineed = $this->ci->db->select('*')->from('ineed')->order_by('id','desc')->get()->result_array();
    $selectedData_1 = [];

    if(null != $select_ineed){
      foreach ($select_ineed as $key => $value) {
        if($value['type']=='Taxi'){
          $selectedData_1[] =
                                                [
                                                  'id'                 => $value['id'],
                                                  'name'               => $value['name'],
                                                  'telephone'          => $value['telephone'],
                                                  'city'               => $value['city'],
                                                  'stars'              => $value['stars'],
                                                  'image'              => $value['image'],
                                                  'type'               => $value['type'],
                                               ];
        }elseif($value['type']=='Rent'){
          $selectedData_1[] =
                                                [
                                                  'id'                 => $value['id'],
                                                  'name'               => $value['name'],
                                                  'telephone'          => $value['telephone'],
                                                  'location'           => $value['location'],
                                                  'city'               => $value['city'],
                                                  'image'              => $value['image'],
                                                  'type'               => $value['type'],
                                               ];
        }else{
        $latitude_longitude = $value['latitude_longitude'];
        $strArray   = explode('_',$latitude_longitude);
        $latitude   = $strArray[0];
        $longitude  = $strArray[1];
        $selectedData_1[] =
                                                [
                                                  'id'                 => $value['id'],
                                                  'name'               => $value['name'],
                                                  'location'           => $value['location'],
                                                  'city'               => $value['city'],
                                                  'contact'            => $value['contact'],
                                                  'description'        => $value['description'],
                                                  'offer'              => $value['offer'],
                                                  'stars'              => $value['stars'],
                                                  'type'               => $value['type'],
                                                  'latitude'           => $latitude,
                                                  'longitude'          => $longitude,
                                               ];
      }
    }

      $returnData[] = [$selectedData_1];
      }else{
      $returnData []= [false];
    }

      return $returnData;
  }


}

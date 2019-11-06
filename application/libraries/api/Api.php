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

    $select_events  = $this->ci->db->select('*')->from('event')->order_by('enddate','desc')->get()->result_array();
    $selectedData   = [];
    $selectedData_1 = [];
    $selectedData_2 = [];
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
                                                 'image'           => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
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
                                                 'image'           => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
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
                                                 'image'           => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                               ];
        }
      }


      }else{
      $selectedData[] =false;
    } 

    $select_explore = $this->ci->db->select('*')->from('ineed')->order_by('id','desc')->get()->result_array();


    if(null != $select_explore){
      foreach ($select_explore as $key => $value) {
        if($value['type']=='Taxi'){
          $selectedData_1[] =
                                                [
                                                  'id'                 => $value['id'],
                                                  'name'               => $value['name'],
                                                  'telephone'          => $value['telephone'],
                                                  'city'               => $value['city'],
                                                  'stars'              => $value['stars'],
                                                  'image'              => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
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
                                                  'image'              => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
                                                  'type'               => $value['type'],
                                               ];
        }else{
        $latitude_longitude = $value['latitude_longitude'];
        $strArray   = explode('_',$latitude_longitude);
        $latitude   = $strArray[0];
        $longitude  = $strArray[1];
        $gallery    = json_decode($value['gallery'],1);
        rsort($gallery);
        foreach($gallery as $key => $value_1){
          $gallery_1[] =$value_1;
        }
        $selectedData_1[] =
                                                [
                                                  'id'                 => $value['id'],
                                                  'name'               => $value['name'],
                                                  'location'           => $value['location'],
                                                  'city'               => $value['city'],
                                                  'telephone'          => $value['telephone'],
                                                  'description'        => $value['description'],
                                                  'offer'              => $value['offer'],
                                                  'stars'              => $value['stars'],
                                                  'type'               => $value['type'],
                                                  'url'                => $value['url'],
                                                  'email'              => $value['email'],
                                                  'image'              => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
                                                  'gallery'            => $gallery_1,
                                                  'latitude'           => $latitude,
                                                  'longitude'          => $longitude,
                                               ];
      }
    }

      
      }else{
      $selectedData_1[]= false;
    }

    $select_map = $this->ci->db->select('*')->from('historyandculture')->order_by('id','desc')->get()->result_array();
    if(null != $select_map){
      foreach ($select_map as $key => $value) {
        $latitude_longitude = $value['latitude_longitude'];
        $strArray   = explode('_',$latitude_longitude);
        $latitude   = $strArray[0];
        $longitude  = $strArray[1];
        $selectedData_2[] =
                           [
                            'id'              => $value['id'],
                            'name'            => $value['name'],
                            'type_name'       => $value['type_name'],
                            'location'        => $value['location'],
                            'description'     => $value['description'],
                            'address'         => $value['address'],
                            'work_time'       => $value['work_time'],
                            'latitude'        => $latitude,
                            'longitude'       => $longitude,
                            'image'           => "https://thinkkosovo.cleverapps.io/uploads/".$value['image'],
                            'created_at'      => $value['created_at'],
                            'updated_at'      => $value['updated_at'],
                          ];
      
        }

      }else{
      $selectedData_2[]= false;
    }
    $returnData =[[json_encode($selectedData)],[json_encode($selectedData_1)],[json_encode($selectedData_2)]];
    return $returnData;
  }


}

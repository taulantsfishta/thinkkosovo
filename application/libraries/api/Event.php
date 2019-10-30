<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  function controlData($methodName,$methodExtradata=''){
  // /  $getData                 = $this->ci->input->post();
     $getData                   = json_decode(file_get_contents("php://input"),true);
     $getData                   = (isset($getData) && ('' != $getData)) ? $getData : '';
     if('getEvents' == $methodName){
         $returnData    = $this->getEvents($getData);

     }else{
         $returnData['status']      = false;
         $returnData['message']     = "Wrong method name";
     }
     return json_encode($returnData);
  }

  function getEvents($getData   = ''){
    $select_events = $this->ci->db->select('*')->from('event')->get()->result_array();

    if(null != $select_events){
      foreach ($select_events as $key => $value) {
        $latitude_longitude = $value['latitude_longitude'];
        $strArray   = explode('_',$latitude_longitude);
        $latitude   = $strArray[0];
        $longitude  = $strArray[1];
        $today      = date('Y-m-d H:i:s');
        if( ((strtotime($value['startdate'])) < (strtotime($today))) && ((strtotime($value['enddate'])) < (strtotime($today)))  ){
         $selectedData[]['endevent'] =
                                                [
                                                 'id'              => $value['id'],
                                                 'name'            => $value['name'],
                                                 'place'           => $value['place'],
                                                 'city'            => $value['city'],
                                                 'startdate'       => $value['startdate'],
                                                 'info'            => $value['info'],
                                                 'latitude'        => $latitude,
                                                 'longitude'       => $longitude,
                                                 'image'           => $value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                                 'created_at'      => $value['created_at'],
                                                 'updated_at'      => $value['updated_at'],
                                               ];

       }else if(((strtotime($value['startdate'])) < (strtotime($today))) && ((strtotime($value['enddate'])) > (strtotime($today)))){
          $selectedData[]['happeningevent'] =   [
                                                 'id'              => $value['id'],
                                                 'name'            => $value['name'],
                                                 'place'           => $value['place'],
                                                 'city'            => $value['city'],
                                                 'startdate'       => $value['startdate'],
                                                 'info'            => $value['info'],
                                                 'latitude'        => $latitude,
                                                 'longitude'       => $longitude,
                                                 'image'           => $value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                                 'created_at'      => $value['created_at'],
                                                 'updated_at'      => $value['updated_at'],
                                               ];
        }else if(((strtotime($value['startdate'])) > (strtotime($today))) && ((strtotime($value['enddate'])) > (strtotime($today)))){
          $selectedData[]['soonevent'] =   [
                                                 'id'              => $value['id'],
                                                 'name'            => $value['name'],
                                                 'place'           => $value['place'],
                                                 'city'            => $value['city'],
                                                 'startdate'       => $value['startdate'],
                                                 'info'            => $value['info'],
                                                 'latitude'        => $latitude,
                                                 'longitude'       => $longitude,
                                                 'image'           => $value['image'],
                                                 'type'            => $value['type'],
                                                 'url'             => $value['url'],
                                                 'created_at'      => $value['created_at'],
                                                 'updated_at'      => $value['updated_at'],
                                               ];
        }
      }
      $returnData['category']['event']['status'] = true;
      $returnData['category']['event']['data']   = $selectedData;
      }else{
      $returnData['category']['event']['status'] = false;
    }
      return $returnData;
  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fan {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  function controlData($methodName,$methodExtradata=''){
  // /  $getData                 = $this->ci->input->post();
     $getData                   = json_decode(file_get_contents("php://input"),true);
     $getData                   = (isset($getData) && ('' != $getData)) ? $getData : '';
     if('getFans' == $methodName){
         $returnData    = $this->getFans($getData);

     }else{
         $returnData['status']      = false;
         $returnData['message']     = "Wrong method name";
     }
     return json_encode($returnData);
  }

  function getFans($getData   = ''){
    $select_fans = $this->ci->db->select('*')->from('fan')->get()->result_array();
    if(null != $select_fans){
      foreach ($select_fans as $key => $value) {
        $selectedData [] = [
                          'name'           => $value['name'],
                          'surename'       => $value['surename'],
                          'title'          => $value['title'],
                          'tags'           => $value['tags'],
                          'story'          => $value['story'],
                          'date_trip'      => $value['date_trip'],
                          'location_trip'  => $value['location_trip'],
                          'image_trip'     => $value['image_trip'],
                          'created_at'     => $value['created_at'],
                          'updated_at'     => $value['updated_at']
                         ];
      }
      $returnData['status'] = true;
      $returnData['data']   = $selectedData;
      }else{
      $returnData['status'] = false;
    }
    return $returnData;
  }

}

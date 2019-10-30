<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  function controlData($methodName,$methodExtradata=''){
  // /  $getData                 = $this->ci->input->post();
     $getData                   = json_decode(file_get_contents("php://input"),true);
     $getData                   = (isset($getData) && ('' != $getData)) ? $getData : '';
     if('getPhotos' == $methodName){
         $returnData    = $this->getPhotos($getData);

     }else{
         $returnData['status']      = false;
         $returnData['message']     = "Wrong method name";
     }
     return json_encode($returnData);
  }

  function getPhotos($getData   = ''){
    $select_photos = $this->ci->db->select('*')->from('gallery')->get()->result_array();
    if(null != $select_photos){
      foreach ($select_photos as $key => $value) {
        $selectedData [] = [
                          'place_name'      => $value['place_name'],
                          'city'            => $value['city'],
                          'place_location'  => $value['place_location'],
                          'description'     => $value['description'],
                          'image_place'     => $value['image_place'],
                          'created_at'      => $value['created_at'],
                          'updated_at'      => $value['updated_at']
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

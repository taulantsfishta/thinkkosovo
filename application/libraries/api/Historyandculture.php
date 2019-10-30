<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historyandculture {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  function controlData($methodName,$methodExtradata=''){
  // /  $getData                 = $this->ci->input->post();
     $getData                   = json_decode(file_get_contents("php://input"),true);
     $getData                   = (isset($getData) && ('' != $getData)) ? $getData : '';
     if('getMuseums' == $methodName){
         $returnData    = $this->getMuseums($getData);

     }else if('getNatures' == $methodName){
          $returnData    = $this->getNatures($getData);

      }else if('getFoodandcoffe' == $methodName){
           $returnData    = $this->getFoodandcoffe($getData);

       }else{
         $returnData['status']      = false;
         $returnData['message']     = "Wrong method name";
     }
     return json_encode($returnData);
  }

  function getMuseums($getData   = ''){
    $select_museums = $this->ci->db->select('*')->from('historyandculture')->where('type_name','Museum')->get()->result_array();
    if(null != $select_museums){
      foreach ($select_museums as $key => $value) {
        $selectedData [] = [
                          'name'        => $value['name'],
                          'type_name'   => $value['type_name'],
                          'location'    => $value['location'],
                          'description' => $value['description'],
                          'address'     => $value['address'],
                          'work_time'   => $value['work_time'],
                          'transport'   => $value['transport'],
                          'image'       => $value['image'],
                          'created_at'  => $value['created_at'],
                          'updated_at'  => $value['updated_at']
                         ];
      }
      $returnData['status'] = true;
      $returnData['data']   = $selectedData;
      }else{
      $returnData['status'] = false;
    }
    return $returnData;
  }

  function getNatures($getData   = ''){
    $select_natures = $this->ci->db->select('*')->from('historyandculture')->where('type_name','Nature')->get()->result_array();
    if(null != $select_natures){
      foreach ($select_natures as $key => $value) {
        $selectedData [] = [
                          'name'        => $value['name'],
                          'type_name'   => $value['type_name'],
                          'location'    => $value['location'],
                          'description' => $value['description'],
                          'address'     => $value['address'],
                          'work_time'   => $value['work_time'],
                          'transport'   => $value['transport'],
                          'image'       => $value['image'],
                          'created_at'  => $value['created_at'],
                          'updated_at'  => $value['updated_at']
                         ];
      }
      $returnData['status'] = true;
      $returnData['data']   = $selectedData;
      }else{
      $returnData['status'] = false;
    }
    return $returnData;
  }

  function getFoodandcoffe($getData   = ''){
    $select_foodandcoffe = $this->ci->db->select('*')->from('historyandculture')->where('type_name','Foodandcoffe')->get()->result_array();
    if(null != $select_foodandcoffe){
      foreach ($select_foodandcoffe as $key => $value) {
        $selectedData [] = [
                          'name'        => $value['name'],
                          'type_name'   => $value['type_name'],
                          'location'    => $value['location'],
                          'description' => $value['description'],
                          'address'     => $value['address'],
                          'work_time'   => $value['work_time'],
                          'transport'   => $value['transport'],
                          'image'       => $value['image'],
                          'created_at'  => $value['created_at'],
                          'updated_at'  => $value['updated_at']
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

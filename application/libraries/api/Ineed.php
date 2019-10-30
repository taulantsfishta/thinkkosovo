<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ineed {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  function controlData($methodName,$methodExtradata=''){
  // /  $getData                 = $this->ci->input->post();
     $getData                   = json_decode(file_get_contents("php://input"),true);
     $getData                   = (isset($getData) && ('' != $getData)) ? $getData : '';
     if('getHotels' == $methodName){
         $returnData    = $this->getHotels($getData);

     }else if('getFoods' == $methodName){
          $returnData    = $this->getFoods($getData);

     }else if('getCoffees' == $methodName){
           $returnData    = $this->getCoffees($getData);

     }else if('getTaxis' == $methodName){
            $returnData    = $this->getTaxis($getData);

     }else if('getTravelagencies' == $methodName){
             $returnData    = $this->getTravelagencies($getData);

     }else if('getRents' == $methodName){
              $returnData    = $this->getRents($getData);

     }else{
         $returnData['status']      = false;
         $returnData['message']     = "Wrong method name";
     }
     return json_encode($returnData);
  }

  function getHotels($getData   = ''){
    $select_hotels = $this->ci->db->select('*')->from('ineed')->where('type','Hotel')->get()->result_array();
    if(null != $select_hotels){
      foreach ($select_hotels as $key => $value) {
        $lati_long = explode("_",$value['latitude_longitude']);
        $latitude  = $lati_long[0];
        $longitude = $lati_long[1];
        $selectedData [] = [
                          'name'        => $value['name'],
                          'location'    => $value['location'],
                          'city'        => $value['city'],
                          'description' => $value['description'],
                          'image'       => $value['image'],
                          'gallery'     => $value['gallery'],
                          'offer'       => $value['offer'],
                          'stars'       => $value['stars'],
                          'type'        => $value['type'],
                          'latitude'    => $latitude,
                          'longitude'   => $longitude,
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

  function getFoods($getData   = ''){
    $select_foods = $this->ci->db->select('*')->from('ineed')->where('type','Food')->get()->result_array();
    if(null != $select_foods){
      foreach ($select_foods as $key => $value) {
        $lati_long = explode("_",$value['latitude_longitude']);
        $latitude  = $lati_long[0];
        $longitude = $lati_long[1];
        $selectedData [] = [
                          'name'        => $value['name'],
                          'location'    => $value['location'],
                          'city'        => $value['city'],
                          'description' => $value['description'],
                          'image'       => $value['image'],
                          'gallery'     => $value['gallery'],
                          'offer'       => $value['offer'],
                          'stars'       => $value['stars'],
                          'type'        => $value['type'],
                          'latitude'    => $latitude,
                          'longitude'   => $longitude,
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

  function getCoffees($getData   = ''){
    $select_coffees = $this->ci->db->select('*')->from('ineed')->where('type','Coffe')->get()->result_array();
    if(null != $select_coffees){
      foreach ($select_coffees as $key => $value) {
        $lati_long = explode("_",$value['latitude_longitude']);
        $latitude  = $lati_long[0];
        $longitude = $lati_long[1];
        $selectedData [] = [
                          'name'        => $value['name'],
                          'location'    => $value['location'],
                          'city'        => $value['city'],
                          'description' => $value['description'],
                          'image'       => $value['image'],
                          'gallery'     => $value['gallery'],
                          'offer'       => $value['offer'],
                          'stars'       => $value['stars'],
                          'type'        => $value['type'],
                          'latitude'    => $latitude,
                          'longitude'   => $longitude,
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

  function getTravelagencies($getData   = ''){
    $select_travelagencies = $this->ci->db->select('*')->from('ineed')->where('type','Travelagency')->get()->result_array();
    if(null != $select_travelagencies){
      foreach ($select_travelagencies as $key => $value) {
        $lati_long = explode("_",$value['latitude_longitude']);
        $latitude  = $lati_long[0];
        $longitude = $lati_long[1];
        $selectedData [] = [
                          'name'        => $value['name'],
                          'location'    => $value['location'],
                          'city'        => $value['city'],
                          'description' => $value['description'],
                          'image'       => $value['image'],
                          'gallery'     => $value['gallery'],
                          'offer'       => $value['offer'],
                          'stars'       => $value['stars'],
                          'type'        => $value['type'],
                          'latitude'    => $latitude,
                          'longitude'   => $longitude,
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

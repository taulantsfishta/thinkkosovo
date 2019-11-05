<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  public function register_data($postData='')
  {
    $getData = $this->ci->db->select('*')
                           ->from('event')
                           ->where('name',$postData['name'])
                           ->where('city',$postData['city'])
                           ->get()
                           ->result_array();
    if($getData){
       $data   = ['message'=>"Data are saved!"];
    }else{
      $insertData_photo = [
                            'name'                 => $postData['name'],
                            'place'                => $postData['place'],
                            'city'                 => $postData['city'],
                            'startdate'            => $postData['startdate'],
                            'enddate'              => $postData['enddate'],
                            'info'                 => $postData['info'],
                            'email'                => $postData['email'],
                            'telephone'            => $postData['telephone'],
                            'latitude_longitude'   => $postData['latitude'].'_'.$postData['longitude'],
                            'image'                => $postData['image'],
                            'type'                 => $postData['type'],
                            'url'                  => $postData['url'],
                            'created_at'           => date('Y-m-d H:i:s'),
                            'updated_at'           => date('Y-m-d H:i:s')
                            ]     ;
       $insertDb             = $this->ci->db->insert('event',$insertData_photo);
       if($insertDb){
         $data   = ['message'=>"Data are saved!"];
       }else{
         $data   = ['message'=>"An error has happened!"];
       }
    }

     return $data;
  }
  // //
  public function getEventdata($type_name)
  {
     $getData = $this->ci->db->select('*')
                            ->from('event')
                            ->order_by('id','desc')
                            ->get()
                            ->result_array();
      if(NULL != $getData ){
        foreach ($getData as $key => $value) {
          $datetime = (new DateTime($value['startdate']))->format('c');
          $datatime_1 = substr((string)$datetime,0,16);
          $datetime = (new DateTime($value['enddate']))->format('c');
          $datatime_2 = substr((string)$datetime,0,16);
          $latitude_longitude = $value['latitude_longitude'];
          $strArray   = explode('_',$latitude_longitude);
          $latitude   = $strArray[0];
          $longitude  = $strArray[1];
          $returnData []  = [
                            'id'              => $value['id'],
                            'name'            => $value['name'],
                            'place'           => $value['place'],
                            'city'            => $value['city'],
                            'startdate'       => $datatime_1,
                            'enddate'         => $datatime_2,
                            'info'            => $value['info'],
                            'email'           => $value['email'],
                            'telephone'       => $value['telephone'],
                            'latitude'        => $latitude,
                            'longitude'       => $longitude,
                            'image'           => $value['image'],
                            'type'            => $value['type'],
                            'url'             => $value['url'],
                            'created_at'      => $value['created_at'],
                            'updated_at'      => $value['updated_at'],
                          ];
        }
      }else{
        $returnData []  = [
                            'id'              => '',
                            'name'            => '',
                            'place'           => '',
                            'city'            => '',
                            'startdate'       => '',
                            'enddate'         => '',
                            'info'            => '',
                            'email'           => '',
                            'telephone'       => '',
                            'latitude'        => '',
                            'longitude'       => '',
                            'image'           => '',
                            'type'            => '',
                            'url'             => '',
                            'created_at'      => '',
                            'updated_at'      => '',
                        ];
      }

      return $returnData;

  }

  public function update_data($postData='')
  {
        $data_to_update          = [
                                        'name'               => $postData['name'],
                                        'place'              => $postData['place'],
                                        'city'               => $postData['city'],
                                        'startdate'          => $postData['startdate'],
                                        'enddate'            => $postData['enddate'],
                                        'info'               => $postData['info'],
                                        'email'              => $postData['email'],
                                        'telephone'          => $postData['telephone'],
                                        'latitude_longitude' => $postData['latitude'].'_'.$postData['longitude'],
                                        'image'              => $postData['image'],
                                        'type'               => $postData['type'],
                                        'url'                => $postData['url'],
                                        'updated_at'         => date('Y-m-d H:i:s')
                                   ];

        $this->ci->db->set($data_to_update);
        $this->ci->db->where('id',$postData['id']);
        $are_data_updated        = $this->ci->db->update('event');

     if($are_data_updated){
       $data   = ['message'=>"Data are updated!"];
     }else{
       $data   = ['message'=>"An error has happened!"];
     }
     return $data;
  }

  public function deleteEventdata($row_id)
  {
    $this->ci->db->where('id',$row_id);
    $id_row_deleted = $this->ci->db->delete('event');
    if($id_row_deleted){
         $data   = ['message'=>"Row is deleted!"];
    }else{
         $data   = ['message'=>"An error has happened!"];
    }
    return $data;

  }

  /*-----------------Banner------------------------*/

    public function register_data_banner($postData='')
  {
    $getData = $this->ci->db->select('*')
                           ->from('banner')
                           ->where('name',$postData['name'])
                           ->get()
                           ->result_array();
    if($getData){
       $data   = ['message'=>"Data are saved!"];
    }else{
      $insertData_photo = [
                            'name'                 => $postData['name'],
                            'image'                => $postData['image'],
                            'created_at'           => date('Y-m-d H:i:s'),
                            'updated_at'           => date('Y-m-d H:i:s')
                            ]     ;
       $insertDb             = $this->ci->db->insert('banner',$insertData_photo);
       if($insertDb){
         $data   = ['message'=>"Data are saved!"];
       }else{
         $data   = ['message'=>"An error has happened!"];
       }
    }

     return $data;
  }
  // //
  public function getBannerdata($type_name)
  {
     $getData = $this->ci->db->select('*')
                            ->from('banner')
                            ->order_by('id','desc')
                            ->get()
                            ->result_array();
      if(NULL != $getData ){
        foreach ($getData as $key => $value) {

          $returnData []  = [
                            'id'              => $value['id'],
                            'name'            => $value['name'],
                            'image'           => $value['image'],
                            'created_at'      => $value['created_at'],
                            'updated_at'      => $value['updated_at'],
                          ];
        }
      }else{
        $returnData []  = [
                            'id'              => '',
                            'name'            => '',
                            'image'           => '',
                            'created_at'      => '',
                            'updated_at'      => '',
                        ];
      }

      return $returnData;

  }

  public function update_data_banner($postData='')
  {
        $data_to_update          = [
                                        'name'               => $postData['name'],
                                        'image'              => $postData['image'],
                                        'updated_at'         => date('Y-m-d H:i:s')
                                   ];

        $this->ci->db->set($data_to_update);
        $this->ci->db->where('id',$postData['id']);
        $are_data_updated        = $this->ci->db->update('banner');

     if($are_data_updated){
       $data   = ['message'=>"Data are updated!"];
     }else{
       $data   = ['message'=>"An error has happened!"];
     }
     return $data;
  }

  public function deleteBannerdata($row_id)
  {
    $this->ci->db->where('id',$row_id);
    $id_row_deleted = $this->ci->db->delete('banner');
    if($id_row_deleted){
         $data   = ['message'=>"Row is deleted!"];
    }else{
         $data   = ['message'=>"An error has happened!"];
    }
    return $data;

  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fan {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  public function register_data($postData='')
  {
    $insertData_fans = [

                          'name'            => $postData['name'],
                          'surename'        => $postData['surename'],
                          'title'           => $postData['title'],
                          'tags'            => $postData['tags'],
                          'story'           => $postData['story'],
                          'date_trip'       => $postData['date_trip'],
                          'location_trip'   => $postData['location_trip'],
                          'image_trip'      => $postData['image_trip'],
                          'created_at'      => date('Y-m-d H:i:s'),
                          'updated_at'      => date('Y-m-d H:i:s')
                          ]     ;
     $insertDb             = $this->ci->db->insert('fan',$insertData_fans);
     if($insertDb){
       $data   = ['message'=>"Data are saved!"];
     }else{
       $data   = ['message'=>"An error has happened!"];
     }
     return $data;
  }
  //
  public function getFansdata($type_name)
  {
     $getData = $this->ci->db->select('*')
                            ->from('fan')
                            ->order_by('id','desc')
                            ->get()
                            ->result_array();
      if(NULL != $getData ){
        foreach ($getData as $key => $value) {
          $returnData []  = [
                            'id'              => $value['id'],
                            'name'            => $value['name'],
                            'surename'        => $value['surename'],
                            'title'           => $value['title'],
                            'tags'            => $value['tags'],
                            'story'           => $value['story'],
                            'date_trip'       => $value['date_trip'],
                            'location_trip'   => $value['location_trip'],
                            'image_trip'      => $value['image_trip'],
                            'created_at'      => $value['created_at'],
                            'updated_at'      => $value['updated_at'],
                          ];
        }
      }else{
        $returnData []  = [
                          'id'                => '',
                          'name'              => '',
                          'surename'          => '',
                          'title'             => '',
                          'tags'              => '',
                          'story'             => '',
                          'date_trip'         => '',
                          'location_trip'     => '',
                          'image_trip'        => '',
                          'created_at'        => '',
                          'updated_at'        => '',
                        ];
      }
      return $returnData;

  }
  //
  public function deleteFansdata($row_id)
  {
    $this->ci->db->where('id',$row_id);
    $id_row_deleted = $this->ci->db->delete('fan');
    if($id_row_deleted){
         $data   = ['message'=>"Row is deleted!"];
    }else{
         $data   = ['message'=>"An error has happened!"];
    }
    return $data;

  }

}

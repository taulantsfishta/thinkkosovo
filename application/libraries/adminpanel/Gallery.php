<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  public function register_data($postData='')
  {

    $insertData_photo = [

                          'place_name'      => $postData['place_name'],
                          'city'            => $postData['city'],
                          'place_location'  => $postData['place_location'],
                          'description'     => $postData['description'],
                          'image_place'     => $postData['image_place'],
                          'created_at'      => date('Y-m-d H:i:s'),
                          'updated_at'      => date('Y-m-d H:i:s')
                          ]     ;
     $insertDb             = $this->ci->db->insert('gallery',$insertData_photo);
     if($insertDb){
       $data   = ['message'=>"Data are saved!"];
     }else{
       $data   = ['message'=>"An error has happened!"];
     }
     return $data;
  }
  // //
  public function getGallerydata($type_name)
  {
     $getData = $this->ci->db->select('*')
                            ->from('gallery')
                            ->order_by('id','desc')
                            ->get()
                            ->result_array();
      if(NULL != $getData ){
        foreach ($getData as $key => $value) {
          $returnData []  = [
                            'id'              => $value['id'],
                            'place_name'      => $value['place_name'],
                            'city'            => $value['city'],
                            'place_location'  => $value['place_location'],
                            'description'     => $value['description'],
                            'image_place'     => $value['image_place'],
                            'created_at'      => $value['created_at'],
                            'updated_at'      => $value['updated_at'],
                          ];
        }
      }else{
        $returnData []  = [
                          'id'                => '',
                          'place_name'        => '',
                          'city'              => '',
                          'place_location'    => '',
                          'description'       => '',
                          'image_place'       => '',
                          'created_at'        => '',
                          'updated_at'        => '',
                        ];
      }
      return $returnData;

  }

  public function deletePhotodata($row_id)
  {
    $this->ci->db->where('id',$row_id);
    $id_row_deleted = $this->ci->db->delete('gallery');
    if($id_row_deleted){
         $data   = ['message'=>"Row is deleted!"];
    }else{
         $data   = ['message'=>"An error has happened!"];
    }
    return $data;

  }

}

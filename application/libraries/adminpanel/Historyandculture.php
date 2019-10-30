<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historyandculture {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  public function register_data($postData='')
  {

    $getData = $this->ci->db->select('*')
                           ->from('historyandculture')
                           ->where('name',$postData['name'])
                           ->where('location',$postData['location'])
                           ->get()
                           ->result_array();
    if($getData){
       $data   = ['message'=>"Data are saved!"];
    } else{
      $insertData_museum = [
             'name'                             => $postData['name'],
             'type_name'                        => $postData['type_name'],
             'location'                         => $postData['location'],
             'description'                      => $postData['description'],
             'address'                          => $postData['address'],
             'work_time'                        => $postData['work_time'],
             'image'                            => $postData['image'],
             'latitude_longitude'               => $postData['latitude'].'_'.$postData['longitude'],
             'created_at'                       => date('Y-m-d H:i:s'),
             'updated_at'                       => date('Y-m-d H:i:s')
                    ]     ;
       $insertDb             = $this->ci->db->insert('historyandculture',$insertData_museum);
       if($insertDb){
         $data   = ['message'=>"Data are saved!"];
       }else{
         $data   = ['message'=>"An error has happened!"];
       }
    }

     return $data;
  }

  public function getHistoryandculturedata($type_name)
  {
     $getData = $this->ci->db->select('*')
                            ->from('historyandculture')
                            ->where('type_name',$type_name)
                            ->order_by('id','desc')
                            ->get()
                            ->result_array();
      if(NULL != $getData ){
        foreach ($getData as $key => $value) {
          $latitude_longitude = $value['latitude_longitude'];
          $strArray   = explode('_',$latitude_longitude);
          $latitude   = $strArray[0];
          $longitude  = $strArray[1];
          $returnData []  = [
                            'id'              => $value['id'],
                            'name'            => $value['name'],
                            'type_name'       => $value['type_name'],
                            'location'        => $value['location'],
                            'description'     => $value['description'],
                            'address'         => $value['address'],
                            'work_time'       => $value['work_time'],
                            'latitude'        => $latitude,
                            'longitude'       => $longitude,
                            'image'           => $value['image'],
                            'created_at'      => $value['created_at'],
                            'updated_at'      => $value['updated_at'],
                          ];
        }
      }else{
        $returnData []  = [
                          'id'              =>'',
                          'name'            =>'',
                          'type_name'       =>'',
                          'location'        =>'',
                          'description'     =>'',
                          'address'         =>'',
                          'work_time'       =>'',
                          'latitude'        =>'',
                          'longitude'       =>'',
                          'image'           =>'',
                          'created_at'      =>'',
                          'updated_at'      =>'',
                        ];
      }
      return $returnData;

  }

  public function update_data($postData='')
  {
        $data_to_update          =[
                                      'name'                             => $postData['name'],
                                      'type_name'                        => $postData['type_name'],
                                      'location'                         => $postData['location'],
                                      'description'                      => $postData['description'],
                                      'address'                          => $postData['address'],
                                      'work_time'                        => $postData['work_time'],
                                      'image'                            => $postData['image'],
                                      'latitude_longitude'               => $postData['latitude'].'_'.$postData['longitude'],
                                      'updated_at'                       => date('Y-m-d H:i:s')
                                      ];

        $this->ci->db->set($data_to_update);
        $this->ci->db->where('id',$postData['id']);
        $are_data_updated        = $this->ci->db->update('historyandculture');

     if($are_data_updated){
       $data   = ['message'=>"Data are updated!"];
     }else{
       $data   = ['message'=>"An error has happened!"];
     }
     return $data;
  }

  public function deleteHistoryandculturedata($row_id)
  {
    $this->ci->db->where('id',$row_id);
    $id_row_deleted = $this->ci->db->delete('historyandculture');
    if($id_row_deleted){
         $data   = ['message'=>"Row is deleted!"];
    }else{
         $data   = ['message'=>"An error has happened!"];
    }
    return $data;

  }

}

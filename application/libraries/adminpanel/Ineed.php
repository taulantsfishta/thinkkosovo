<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ineed {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  public function register_data($postData='')
  {
    $getData = $this->ci->db->select('*')
                           ->from('ineed')
                           ->where('name',$postData['name'])
                           ->where('city',$postData['city'])
                           ->get()
                           ->result_array();
  if($getData){
     $data   = ['message'=>"Data are saved!"];
  }else{
    if($postData['type'] == 'Taxi'){
      $insertData_ineed = [
                            'name'               => $postData['name'],
                            'telephone'          => $postData['telephone'],
                            'city'               => $postData['city'],
                            'stars'              => $postData['stars'],
                            'image'              => $postData['image'],
                            'type'               => $postData['type'],
                            'created_at'         => date('Y-m-d H:i:s'),
                            'updated_at'         => date('Y-m-d H:i:s')
                            ];
       $insertDb             = $this->ci->db->insert('ineed',$insertData_ineed);
       if($insertDb){
         $data   = ['message'=>"Data are saved!"];
       }else{
         $data   = ['message'=>"An error has happened!"];
       }
    }else if($postData['type'] == 'Rent'){
      $insertData_ineed = [
                            'name'               => $postData['name'],
                            'telephone'          => $postData['telephone'],
                            'location'           => $postData['location'],
                            'city'               => $postData['city'],
                            'image'              => $postData['image'],
                            'type'               => $postData['type'],
                            'created_at'         => date('Y-m-d H:i:s'),
                            'updated_at'         => date('Y-m-d H:i:s')
                            ];
       $insertDb             = $this->ci->db->insert('ineed',$insertData_ineed);
       if($insertDb){
         $data   = ['message'=>"Data are saved!"];
       }else{
         $data   = ['message'=>"An error has happened!"];
       }
    }else{
      $gallery = $postData['gallery'];
      foreach ($gallery as $key => $value) {
        $gallerys[]= 'https://thinkkosovo.cleverapps.io/uploads/'.$value;
      }
       $insertData_ineed = [
                             'name'               => $postData['name'],
                             'location'           => $postData['location'],
                             'city'               => $postData['city'],
                             'contact'            => $postData['contact'],
                             'description'        => $postData['description'],
                             'image'              => $postData['image'],
                             'gallery'            => json_encode($gallerys),
                             'offer'              => $postData['offer'],
                             'stars'              => $postData['stars'],
                             'type'               => $postData['type'],
                             'url'                => $postData['url'],
                             'email'              => $postData['email'],
                             'latitude_longitude' => $postData['latitude'].'_'.$postData['longitude'],
                             'created_at'         => date('Y-m-d H:i:s'),
                             'updated_at'         => date('Y-m-d H:i:s')
                             ];
        $insertDb             = $this->ci->db->insert('ineed',$insertData_ineed);
        if($insertDb){
          $data   = ['message'=>"Data are saved!"];
        }else{
          $data   = ['message'=>"An error has happened!"];
        }
    }
  }

     return $data;
  }
  // //
  public function getIneeddata($type_name)
  {

    $getData = $this->ci->db->select('*')
                           ->from('ineed')
                           ->where('type',$type_name)
                           ->order_by('id','desc')
                           ->get()
                           ->result_array();
      if($type_name == 'Taxi'){

         if(NULL != $getData ){
           foreach ($getData as $key => $value) {
             $returnData []  = [
                                   'id'                 => $value['id'],
                                   'name'               => $value['name'],
                                   'telephone'          => $value['telephone'],
                                   'city'               => $value['city'],
                                   'stars'              => $value['stars'],
                                   'image'              => $value['image'],
                                   'type'               => $value['type'],
                                   'created_at'         => date('Y-m-d H:i:s'),
                                   'updated_at'         => date('Y-m-d H:i:s')
                                   ];
           }
         }else{
           $returnData []  =  [
                                   'id'                 => '',
                                   'name'               => '',
                                   'telephone'          => '',
                                   'city'               => '',
                                   'stars'              => '',
                                   'image'              => '',
                                   'type'               => '',
                                   'created_at'         => '',
                                   'updated_at'         => ''
                            ];
         }
      }else if($type_name == 'Rent'){

        if(NULL != $getData ){
          foreach ($getData as $key => $value) {
            $returnData []  =  [
                                  'id'                 => $value['id'],
                                  'name'               => $value['name'],
                                  'telephone'          => $value['telephone'],
                                  'location'           => $value['location'],
                                  'city'               => $value['city'],
                                  'image'              => $value['image'],
                                  'type'               => $value['type'],
                                  'created_at'         => date('Y-m-d H:i:s'),
                                  'updated_at'         => date('Y-m-d H:i:s')
                              ];
          }
        }else{
          $returnData []  =  [
                                  'id'                 => '',
                                  'name'               => '',
                                  'telephone'          => '',
                                  'location'           => '',
                                  'city'               => '',
                                  'image'              => '',
                                  'type'               => '',
                                  'created_at'         => '',
                                  'updated_at'         => ''
                           ];
        }
      }else{
                if(NULL != $getData ){
                  foreach ($getData as $key => $value) {
                    $latitude_longitude = $value['latitude_longitude'];
                    $strArray   = explode('_',$latitude_longitude);
                    $latitude   = $strArray[0];
                    $longitude  = $strArray[1];
                    $returnData []  =  [
                                            'id'                 => $value['id'],
                                            'name'               => $value['name'],
                                            'location'           => $value['location'],
                                            'city'               => $value['city'],
                                            'contact'            => $value['contact'],
                                            'description'        => $value['description'],
                                            'offer'              => $value['offer'],
                                            'stars'              => $value['stars'],
                                            'type'               => $value['type'],
                                            'url'                => $value['url'],
                                            'email'              => $value['email'],
                                            'latitude'           => $latitude,
                                            'longitude'          => $longitude,
                                            'created_at'         => date('Y-m-d H:i:s'),
                                            'updated_at'         => date('Y-m-d H:i:s')
                                      ];
                  }
                }else{
                  $returnData []  =  [
                                            'id'                 => '',
                                            'name'               => '',
                                            'location'           => '',
                                            'city'               => '',
                                            'contact'            => '',
                                            'description'        => '',
                                            'offer'              => '',
                                            'stars'              => '',
                                            'type'               => '',
                                            'url'                => '',
                                            'email'              => '',
                                            'latitude'           => '',
                                            'longitude'          => '',
                                            'created_at'         => '',
                                            'updated_at'         => '',
                                   ];
                }
      }

      return $returnData;

  }

  public function update_data($postData='')
  {
        if($postData['type'] == 'Taxi'){
          $data_to_update = [
                                'name'               => $postData['name'],
                                'telephone'          => $postData['telephone'],
                                'city'               => $postData['city'],
                                'stars'              => $postData['stars'],
                                'image'              => $postData['image'],
                                'type'               => $postData['type'],
                                'updated_at'         => date('Y-m-d H:i:s')
                                ];

          $this->ci->db->set($data_to_update);
          $this->ci->db->where('id',$postData['id']);
          $are_data_updated        = $this->ci->db->update('ineed');

           if($are_data_updated){
             $data   = ['message'=>"Data are updated!"];
           }else{
             $data   = ['message'=>"An error has happened!"];
           }
        }else if($postData['type'] == 'Rent'){
          $data_to_update = [
                                'name'               => $postData['name'],
                                'telephone'          => $postData['telephone'],
                                'location'           => $postData['location'],
                                'city'               => $postData['city'],
                                'image'              => $postData['image'],
                                'type'               => $postData['type'],
                                'updated_at'         => date('Y-m-d H:i:s')
                                ];

          $this->ci->db->set($data_to_update);
          $this->ci->db->where('id',$postData['id']);
          $are_data_updated        = $this->ci->db->update('ineed');

           if($are_data_updated){
             $data   = ['message'=>"Data are updated!"];
           }else{
             $data   = ['message'=>"An error has happened!"];
           }
        }else{
          $gallery = $postData['gallery'];
          foreach ($gallery as $key => $value) {
            $gallerys[]= 'http://localhost/thinkkosovo/uploads/'.$value;
          }
           $data_to_update = [
                                 'name'               => $postData['name'],
                                 'location'           => $postData['location'],
                                 'city'               => $postData['city'],
                                 'contact'            => $postData['contact'],
                                 'description'        => $postData['description'],
                                 'image'              => $postData['image'],
                                 'gallery'            => json_encode($gallerys),
                                 'offer'              => $postData['offer'],
                                 'stars'              => $postData['stars'],
                                 'type'               => $postData['type'],
                                 'url'                => $postData['url'],
                                 'email'              => $postData['email'],
                                 'latitude_longitude' => $postData['latitude'].'_'.$postData['longitude'],
                                 'updated_at'         => date('Y-m-d H:i:s')
                                 ];

          $this->ci->db->set($data_to_update);
          $this->ci->db->where('id',$postData['id']);
          $are_data_updated        = $this->ci->db->update('ineed');

           if($are_data_updated){
             $data   = ['message'=>"Data are updated!"];
           }else{
             $data   = ['message'=>"An error has happened!"];
           }

        }
      return $data;
  }

  public function deleteIneeddata($row_id)
  {
    $this->ci->db->where('id',$row_id);
    $id_row_deleted = $this->ci->db->delete('ineed');
    if($id_row_deleted){
         $data   = ['message'=>"Row is deleted!"];
    }else{
         $data   = ['message'=>"An error has happened!"];
    }
    return $data;

  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

  $route['default_controller']                                     = 'admin';
  $route['default_controller/(:any)']                              = 'admin/$1';
  $route['default_controller/(:any/)/(:any/)']                     = 'admin/$1/$2';
  $route['general']                                                = 'general';

  /* --------------------------------------------ADMINPANEL------------------------------------------------------*/

  $route['home']                                                   = 'admin/home';
  $route['home/(:any)']                                            = 'admin/home/$1';
  $route['home/(:any)/(:any)']                                     = "admin/home/$1/$2";
  $route['home/(:any)/(:any)/(:any)']                              = "admin/home/$1/$2/$3";

  $route['login_validation']                                       = 'admin/login_validation';
  $route['login_validation/(:any)']                                = 'admin/login_validation/$1';
  $route['login_validation/(:any)/(:any)']                         = "admin/login_validation/$1/$2";
  $route['login_validation/(:any)/(:any)/(:any)']                  = "admin/login_validation/$1/$2/$3";

  $route['logout']                                                 = 'admin/logout';
  $route['logout/(:any)']                                          = 'admin/logout/$1';
  $route['logout/(:any)/(:any)']                                   = "admin/logout/$1/$2";
  $route['logout/(:any)/(:any)/(:any)']                            = "admin/logout/$1/$2/$3";

  $route['museum']                                                 = 'admin/museum';
  $route['museum/(:any)']                                          = 'admin/museum/$1';
  $route['museum/(:any)/(:any)']                                   = "admin/museum/$1/$2";
  $route['museum/(:any)/(:any)/(:any)']                            = "admin/museum/$1/$2/$3";

  $route['nature']                                                 = 'admin/nature';
  $route['nature/(:any)']                                          = 'admin/nature/$1';
  $route['nature/(:any)/(:any)']                                   = "admin/nature/$1/$2";
  $route['nature/(:any)/(:any)/(:any)']                            = "admin/nature/$1/$2/$3";

  $route['history']                                                = 'admin/history';
  $route['history/(:any)']                                         = 'admin/history/$1';
  $route['history/(:any)/(:any)']                                  = "admin/history/$1/$2";
  $route['history/(:any)/(:any)/(:any)']                           = "admin/history/$1/$2/$3";

  $route['club']                                                   = 'admin/club';
  $route['club/(:any)']                                            = 'admin/club/$1';
  $route['club/(:any)/(:any)']                                     = "admin/club/$1/$2";
  $route['club/(:any)/(:any)/(:any)']                              = "admin/club/$1/$2/$3";

  $route['foodandcoffe']                                           = 'admin/foodandcoffe';
  $route['foodandcoffe/(:any)']                                    = 'admin/foodandcoffe/$1';
  $route['foodandcoffe/(:any)/(:any)']                             = "admin/foodandcoffe/$1/$2";
  $route['foodandcoffe/(:any)/(:any)/(:any)']                      = "admin/foodandcoffe/$1/$2/$3";

  $route['register_historyandculturedata']                         = 'admin/register_historyandculturedata';
  $route['register_historyandculturedata/(:any)']                  = 'admin/register_historyandculturedata/$1';
  $route['register_historyandculturedata/(:any)/(:any)']           = "admin/register_historyandculturedata/$1/$2";
  $route['register_historyandculturedata/(:any)/(:any)/(:any)']    = "admin/register_historyandculturedata/$1/$2/$3";

  $route['updatehistoryandculturedata']                            = 'admin/updatehistoryandculturedata';
  $route['updatehistoryandculturedata/(:any)']                     = 'admin/updatehistoryandculturedata/$1';
  $route['updatehistoryandculturedata/(:any)/(:any)']              = "admin/updatehistoryandculturedata/$1/$2";
  $route['updatehistoryandculturedata/(:any)/(:any)/(:any)']       = "admin/updatehistoryandculturedata/$1/$2/$3";

  $route['deletehistoryandculturedata']                            = 'admin/deletehistoryandculturedata';
  $route['deletehistoryandculturedata/(:any)']                     = 'admin/deletehistoryandculturedata/$1';
  $route['deletehistoryandculturedata/(:any)/(:any)']              = "admin/deletehistoryandculturedata/$1/$2";
  $route['deletehistoryandculturedata/(:any)/(:any)/(:any)']       = "admin/deletehistoryandculturedata/$1/$2/$3";

  $route['fanstory']                                               = 'admin/fanstory';
  $route['fanstory/(:any)']                                        = 'admin/fanstory/$1';
  $route['fanstory/(:any)/(:any)']                                 = "admin/fanstory/$1/$2";
  $route['fanstory/(:any)/(:any)/(:any)']                          = "admin/fanstory/$1/$2/$3";

  $route['register_fanstory']                                      = 'admin/register_fanstory';
  $route['register_fanstory/(:any)']                               = 'admin/register_fanstory/$1';
  $route['register_fanstory/(:any)/(:any)']                        = "admin/register_fanstory/$1/$2";
  $route['register_fanstory/(:any)/(:any)/(:any)']                 = "admin/register_fanstory/$1/$2/$3";

  $route['deletefanstorydata']                                     = 'admin/deletefanstorydata';
  $route['deletefanstorydata/(:any)']                              = 'admin/deletefanstorydata/$1';
  $route['deletefanstorydata/(:any)/(:any)']                       = "admin/deletefanstorydata/$1/$2";
  $route['deletefanstorydata/(:any)/(:any)/(:any)']                = "admin/deletefanstorydata/$1/$2/$3";

  $route['photo']                                                  = 'admin/photo';
  $route['photo/(:any)']                                           = 'admin/photo/$1';
  $route['photo/(:any)/(:any)']                                    = "admin/photo/$1/$2";
  $route['photo/(:any)/(:any)/(:any)']                             = "admin/photo/$1/$2/$3";

  $route['register_photodata']                                     = 'admin/register_photodata';
  $route['register_photodata/(:any)']                              = 'admin/register_photodata/$1';
  $route['register_photodata/(:any)/(:any)']                       = "admin/register_photodata/$1/$2";
  $route['register_photodata/(:any)/(:any)/(:any)']                = "admin/register_photodata/$1/$2/$3";

  $route['deletephotodata']                                        = 'admin/deletephotodata';
  $route['deletephotodata/(:any)']                                 = 'admin/deletephotodata/$1';
  $route['deletephotodata/(:any)/(:any)']                          = "admin/deletephotodata/$1/$2";
  $route['deletephotodata/(:any)/(:any)/(:any)']                   = "admin/deletephotodata/$1/$2/$3";

  $route['event']                                                  = 'admin/event';
  $route['event/(:any)']                                           = 'admin/event/$1';
  $route['event/(:any)/(:any)']                                    = "admin/event/$1/$2";
  $route['event/(:any)/(:any)/(:any)']                             = "admin/event/$1/$2/$3";

  $route['register_event']                                         = 'admin/register_event';
  $route['register_event/(:any)']                                  = 'admin/register_event/$1';
  $route['register_event/(:any)/(:any)']                           = "admin/register_event/$1/$2";
  $route['register_event/(:any)/(:any)/(:any)']                    = "admin/register_event/$1/$2/$3";

  $route['updateeventdata']                                        = 'admin/updateeventdata';
  $route['updateeventdata/(:any)']                                 = 'admin/updateeventdata/$1';
  $route['updateeventdata/(:any)/(:any)']                          = "admin/updateeventdata/$1/$2";
  $route['updateeventdata/(:any)/(:any)/(:any)']                   = "admin/updateeventdata/$1/$2/$3";

  $route['deleteeventdata']                                        = 'admin/deleteeventdata';
  $route['deleteeventdata/(:any)']                                 = 'admin/deleteeventdata/$1';
  $route['deleteeventdata/(:any)/(:any)']                          = "admin/deleteeventdata/$1/$2";
  $route['deleteeventdata/(:any)/(:any)/(:any)']                   = "admin/deleteeventdata/$1/$2/$3";

  $route['place']                                                  = 'admin/place';
  $route['place/(:any)']                                           = 'admin/place/$1';
  $route['place/(:any)/(:any)']                                    = "admin/place/$1/$2";
  $route['place/(:any)/(:any)/(:any)']                             = "admin/place/$1/$2/$3";

  $route['register_place']                                         = 'admin/register_place';
  $route['register_place/(:any)']                                  = 'admin/register_place/$1';
  $route['register_place/(:any)/(:any)']                           = "admin/register_place/$1/$2";
  $route['register_place/(:any)/(:any)/(:any)']                    = "admin/register_place/$1/$2/$3";

  $route['updateplacedata']                                        = 'admin/updateplacedata';
  $route['updateplacedata/(:any)']                                 = 'admin/updateplacedata/$1';
  $route['updateplacedata/(:any)/(:any)']                          = "admin/updateplacedata/$1/$2";
  $route['updateplacedata/(:any)/(:any)/(:any)']                   = "admin/updateplacedata/$1/$2/$3";

  $route['deleteineeddata']                                        = 'admin/deleteineeddata';
  $route['deleteineeddata/(:any)']                                 = 'admin/deleteineeddata/$1';
  $route['deleteineeddata/(:any)/(:any)']                          = "admin/deleteineeddata/$1/$2";
  $route['deleteineeddata/(:any)/(:any)/(:any)']                   = "admin/deleteineeddata/$1/$2/$3";

  $route['travelagency']                                           = 'admin/travelagency';
  $route['travelagency/(:any)']                                    = 'admin/travelagency/$1';
  $route['travelagency/(:any)/(:any)']                             = "admin/travelagency/$1/$2";
  $route['travelagency/(:any)/(:any)/(:any)']                      = "admin/travelagency/$1/$2/$3";

  $route['register_travelagency']                                  = 'admin/register_travelagency';
  $route['register_travelagency/(:any)']                           = 'admin/register_travelagency/$1';
  $route['register_travelagency/(:any)/(:any)']                    = "admin/register_travelagency/$1/$2";
  $route['register_travelagency/(:any)/(:any)/(:any)']             = "admin/register_travelagency/$1/$2/$3";

  $route['updatetravelagencydata']                                 = 'admin/updatetravelagencydata';
  $route['updatetravelagencydata/(:any)']                          = 'admin/updatetravelagencydata/$1';
  $route['updatetravelagencydata/(:any)/(:any)']                   = "admin/updatetravelagencydata/$1/$2";
  $route['updatetravelagencydata/(:any)/(:any)/(:any)']            = "admin/updatetravelagencydata/$1/$2/$3";

  $route['food']                                                   = 'admin/food';
  $route['food/(:any)']                                            = 'admin/food/$1';
  $route['food/(:any)/(:any)']                                     = "admin/food/$1/$2";
  $route['food/(:any)/(:any)/(:any)']                              = "admin/food/$1/$2/$3";

  $route['register_food']                                          = 'admin/register_food';
  $route['register_food/(:any)']                                   = 'admin/register_food/$1';
  $route['register_food/(:any)/(:any)']                            = "admin/register_food/$1/$2";
  $route['register_food/(:any)/(:any)/(:any)']                     = "admin/register_food/$1/$2/$3";

  $route['updatefooddata']                                         = 'admin/updatefooddata';
  $route['updatefooddata/(:any)']                                  = 'admin/updatefooddata/$1';
  $route['updatefooddata/(:any)/(:any)']                           = "admin/updatefooddata/$1/$2";
  $route['updatefooddata/(:any)/(:any)/(:any)']                    = "admin/updatefooddata/$1/$2/$3";

  $route['coffe']                                                  = 'admin/coffe';
  $route['coffe/(:any)']                                           = 'admin/coffe/$1';
  $route['coffe/(:any)/(:any)']                                    = "admin/coffe/$1/$2";
  $route['coffe/(:any)/(:any)/(:any)']                             = "admin/coffe/$1/$2/$3";

  $route['register_coffe']                                         = 'admin/register_coffe';
  $route['register_coffe/(:any)']                                  = 'admin/register_coffe/$1';
  $route['register_coffe/(:any)/(:any)']                           = "admin/register_coffe/$1/$2";
  $route['register_coffe/(:any)/(:any)/(:any)']                    = "admin/register_coffe/$1/$2/$3";

  $route['updatecoffedata']                                        = 'admin/updatecoffedata';
  $route['updatecoffedata/(:any)']                                 = 'admin/updatecoffedata/$1';
  $route['updatecoffedata/(:any)/(:any)']                          = "admin/updatecoffedata/$1/$2";
  $route['updatecoffedata/(:any)/(:any)/(:any)']                   = "admin/updatecoffedata/$1/$2/$3";

  $route['taxi']                                                   = 'admin/taxi';
  $route['taxi/(:any)']                                            = 'admin/taxi/$1';
  $route['taxi/(:any)/(:any)']                                     = "admin/taxi/$1/$2";
  $route['taxi/(:any)/(:any)/(:any)']                              = "admin/taxi/$1/$2/$3";

  $route['register_taxi']                                          = 'admin/register_taxi';
  $route['register_taxi/(:any)']                                   = 'admin/register_taxi/$1';
  $route['register_taxi/(:any)/(:any)']                            = "admin/register_taxi/$1/$2";
  $route['register_taxi/(:any)/(:any)/(:any)']                     = "admin/register_taxi/$1/$2/$3";

  $route['updatetaxidata']                                         = 'admin/updatetaxidata';
  $route['updatetaxidata/(:any)']                                  = 'admin/updatetaxidata/$1';
  $route['updatetaxidata/(:any)/(:any)']                           = "admin/updatetaxidata/$1/$2";
  $route['updatetaxidata/(:any)/(:any)/(:any)']                    = "admin/updatetaxidata/$1/$2/$3";

  $route['rent']                                                   = 'admin/rent';
  $route['rent/(:any)']                                            = 'admin/rent/$1';
  $route['rent/(:any)/(:any)']                                     = "admin/rent/$1/$2";
  $route['rent/(:any)/(:any)/(:any)']                              = "admin/rent/$1/$2/$3";

  $route['register_rent']                                          = 'admin/register_rent';
  $route['register_rent/(:any)']                                   = 'admin/register_rent/$1';
  $route['register_rent/(:any)/(:any)']                            = "admin/register_rent/$1/$2";
  $route['register_rent/(:any)/(:any)/(:any)']                     = "admin/register_rent/$1/$2/$3";

  $route['updaterentdata']                                         = 'admin/updaterentdata';
  $route['updaterentdata/(:any)']                                  = 'admin/updaterentdata/$1';
  $route['updaterentdata/(:any)/(:any)']                           = "admin/updaterentdata/$1/$2";
  $route['updaterentdata/(:any)/(:any)/(:any)']                    = "admin/updaterentdata/$1/$2/$3";

/* --------------------------------------------API-----------------------------------------------------------*/

//Event
  $route['eventapi']                                               = 'general/control/event';
  $route['eventapi/(:any)']                                        = 'general/control/event/$1';
  $route['eventapi/(:any)/(:any)']                                 = 'general/control/event/$1/$2';

  $route['api']                                                    = 'general/control/api';
  $route['api/(:any)']                                             = 'general/control/api/$1';
  $route['api/(:any)/(:any)']                                      = 'general/control/api/$1/$2';

  //FAN
  $route['fanapi']                                                 = 'general/control/fan';
  $route['fanapi/(:any)']                                          = 'general/control/fan/$1';
  $route['fanapi/(:any)/(:any)']                                   = 'general/control/fan/$1/$2';

  $route['galleryapi']                                             = 'general/control/gallery';
  $route['galleryapi/(:any)']                                      = 'general/control/gallery/$1';
  $route['galleryapi/(:any)/(:any)']                               = 'general/control/gallery/$1/$2';

  $route['historyandcultureapi']                                   = 'general/control/historyandculture';
  $route['historyandcultureapi/(:any)']                            = 'general/control/historyandculture/$1';
  $route['historyandcultureapi/(:any)/(:any)']                     = 'general/control/historyandculture/$1/$2';

  $route['ineedapi']                                               = 'general/control/ineed';
  $route['ineedapi/(:any)']                                        = 'general/control/ineed/$1';
  $route['ineedapi/(:any)/(:any)']                                 = 'general/control/ineed/$1/$2';


  $route['404_override'] = '';
  $route['translate_uri_dashes'] = FALSE;

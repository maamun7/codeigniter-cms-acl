<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends CI_Controller {
   function __construct() {
     parent::__construct();
   }
   
   public function menu_active_sts_change()
   {
         $CI =& get_instance();
         $CI->load->model('front/menus');
         $menu_id =  $_POST['menu_id'];
         $status = $CI->menus->change_menu_active_sts($menu_id);
         echo $status;
   }
}

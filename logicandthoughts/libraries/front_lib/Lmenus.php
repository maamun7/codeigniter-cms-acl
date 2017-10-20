<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lmenus {
	// Data For Top Menu
	public function top_menu_data()
	{
		$CI =& get_instance();		
		$data = array(
			'data' => '',
		);
		$top_menu_view = $CI->parser->parse('front_view/menu/top-nav',$data,true);
		return $top_menu_view;
	}
	
	// Data For Main Menu
	public function main_menu_data()
	{
		$CI =& get_instance();
		$CI->load->model('front/menus');
		$new_menu=array();
            $current_menu = "current-menu-parent current-menu-item";
		$menu_lists = $CI->menus->get_main_menus(0);
		if(!empty($menu_lists)){
			$i = 0;
			foreach($menu_lists as $key=>$menu_list ){$i++;
				$new_menu[$i]['leb1_id']= $menu_list['id'];
				$new_menu[$i]['leb1_name']= $menu_list['name'];
				$new_menu[$i]['leb1_link']= $menu_list['link'];
				$new_menu[$i]['leb1_con_id']= $menu_list['contentid'];
                        if($menu_list['is_current']==1){
                           $current_menu= "";
                           $new_menu[$i]['active_menu']= "current-menu-parent current-menu-item";
                        }else{
                            $new_menu[$i]['active_menu']= "";
                        }
				$sub_level = $CI->menus->get_main_menus($menu_list['id']);
				if(!empty($sub_level)){ 
					$new_menu[$i]['sub_lebel']= $sub_level;
				}else{
					$new_menu[$i]['sub_lebel']= '';
				}
			}
		}

		$data = array(
			'menu_lists' => $new_menu,
                  'current_menu' => $current_menu
		);
		$main_menu_view = $CI->parser->parse('front_view/menu/main-nav',$data,true);
		return $main_menu_view;
	}
}
?>
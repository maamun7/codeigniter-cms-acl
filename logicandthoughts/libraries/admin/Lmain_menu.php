<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lmain_menu {
	
	public function get_list($limit,$page,$links)
	{
		$CI =& get_instance();
		$CI->load->model('admin/main_menu');		
		$all_mainmenu = $CI->main_menu->get_menu_list(0,1,$limit,$page);
		if(!empty($all_mainmenu)){
			$i = $page;
			foreach($all_mainmenu as $k=>$val){
				$i++;
				$all_mainmenu[$k]['sl']= $i;
				if($val['published']==1){
					$all_mainmenu[$k]['sts_class']="icon-ok";
				}else{
					$all_mainmenu[$k]['sts_class']="icon-remove-sign";
				}
			}
		}		
		$data = array(
				'title' => 'Menu List',
				'menu_lists' => $all_mainmenu,
				'links' => $links
			);
		$list_view =  $CI->parser->parse('admin_view/main_menus/index',$data,true);
		return $list_view;
	}	
		
	public function add_form() {
		$CI =& get_instance();
		$CI->load->model('admin/main_menu');
		$parent_menu = $CI->main_menu->retrieve_parent_menu_list();
		$data = array(
			'title' => 'Add Menu',
			'parent_menu' => $parent_menu
		);
		$new_menu =  $CI->parser->parse('admin_view/main_menus/add',$data,true);
		return $new_menu;
	}
	
	//menu Edit Data
	public function get_edit_data($menu_id)
	{
		$CI =& get_instance();
		$CI->load->model('admin/main_menu');
		$data = array();
		$menu_details = $CI->main_menu->retrieve_edit_data($menu_id);
		$parent_menus = $CI->main_menu->retrieve_parent_menu_list();
		
		if($menu_details!=""){
			if($parent_menus!=""){
				foreach($parent_menus as $indx=>$parent_menu){
					if($menu_details[0]['parent'] == $parent_menu['id']){
						$parent_menus[$indx]['selected']='selected="selected"';
					}
					else{
						$parent_menus[$indx]['selected']='';
					} 
				}
			}
			$content_type="external";
			$select_type="External Link";
			$content_name="";
			if($menu_details[0]['contentid']!=0){
				if($menu_details[0]['link'] == "view_category"){
					$content_name = $CI->main_menu->get_sub_cat_name($menu_details[0]['contentid']);
					$content_type="cat_art";
					$select_type="All Article List";
				}elseif($menu_details[0]['link'] == "content/view_content"){
					$content_name = $CI->main_menu->get_article_name($menu_details[0]['contentid']);
					$content_type="single";
					$select_type="Single Article";
				}
			}	
			$data = array(
				'title' 			=> "Edit Main Menu",
				'menu_id' 			=> $menu_details[0]['id'],
				'menutype' 			=> $select_type,
				'name' 				=> $menu_details[0]['name'],
				'alias' 			=> $menu_details[0]['alias'],
				'link' 				=> $menu_details[0]['link'],
				'type' 				=> $menu_details[0]['menutype'],
				'status' 			=> $menu_details[0]['published'],
				'contentid' 		=> $menu_details[0]['contentid'],
				'meta_description' 	=> $menu_details[0]['meta_description'],
				'meta_keyword' 		=> $menu_details[0]['meta_keyword'],				
				'menu_icon' 		=> $menu_details[0]['menu_icon'],				
				'bottom_text' 		=> $menu_details[0]['bottom_text'],				
				'content_type' 		=> $content_type,
				'select_type' 		=> $select_type,
				'parent_list' 		=> $parent_menus,
				'content_name' 		=> $content_name,
			);	
		}
		$edit_data = $CI->parser->parse('admin_view/main_menus/edit',$data,true);		
		return $edit_data;
	}
	//Search Product
	public function get_search_result($key_word)
	{
		$CI =& get_instance();
		$CI->load->model('admin/main_menu');		
		$all_mainmenu = $CI->main_menu->retrieve_search_list($key_word);

		if(!empty($all_mainmenu)){
			$i = 0;
			foreach($all_mainmenu as $k=>$val){
				$i++;
				$all_mainmenu[$k]['sl']= $i;
				if($val['published']==1){
					$all_mainmenu[$k]['sts_class']="icon-ok";
				}else{
					$all_mainmenu[$k]['sts_class']="icon-remove-sign";
				}
			}
		}		
		$data = array(
				'title' => 'Menu List',
				'menu_lists' => $all_mainmenu
			);
		$list_view =  $CI->parser->parse('admin_view/main_menus/search',$data,true);
		return $list_view;
	}
}
?>
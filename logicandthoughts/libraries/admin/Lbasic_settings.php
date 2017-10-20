<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lbasic_settings {
	
	public function generate_list()
	{
		$CI =& get_instance();
		$CI->load->model('admin/basic_setting');
		$data_list = $CI->basic_setting->get_all();
		if(!empty($data_list)){
			$i = 0;
			foreach($data_list as $k=>$val){ $i++;
				$data_list[$k]['sl']= $i;
				if($val['status']==1){
					$data_list[$k]['sts_class']="icon-ok";
				}else{
					$data_list[$k]['sts_class']="icon-remove-sign";
				}
			}
		}
		$data = array(
			'title' => 'Basic Settings',
			'data_lists' => $data_list
		);
		$all_list =  $CI->parser->parse('admin_view/basic_setting/index',$data,true);
		return $all_list;
	}

	public function get_add_form() {
		$CI =& get_instance();
		$data = array(
			'title' => 'New Basic Settings'
		);
		$basic_setting_add =  $CI->parser->parse('admin_view/basic_setting/add',$data,true);
		return $basic_setting_add;
	}
	
	//article Edit Data
	public function get_edit_data($setting_id)
	{
		$CI =& get_instance();
		$CI->load->model('admin/basic_setting');
		$edit_data = $CI->basic_setting->retrieve_edit_data($setting_id);

		$data = array(
			'title' 			=> "Edit Basic Setting" ,
			'setting_id' 		=> $edit_data[0]['id'],
			'company_name' 		=> $edit_data[0]['company_name'],			
			'company_moto' 		=> $edit_data[0]['company_moto'],			
			'contact_details' 	=> $edit_data[0]['contact_address'],
			'email' 			=> $edit_data[0]['email_address'],
			'phone_number' 		=> $edit_data[0]['phone_no'],
			'mobile_number' 	=> $edit_data[0]['mobile_no'],
			'logo' 				=> "my-assets/front/images/common_img/".$edit_data[0]['logo'],
			'logo_height' 		=> $edit_data[0]['logo_height'],
			'logo_width' 		=> $edit_data[0]['logo_width'],			
			'status' 			=> $edit_data[0]['status']
		);
		$edit_view = $CI->parser->parse('admin_view/basic_setting/edit',$data,true);		
		return $edit_view;
	}

}
?>
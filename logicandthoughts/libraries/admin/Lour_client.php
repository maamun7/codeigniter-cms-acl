<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lour_client {
	
	public function get_list($limit,$page,$links)
	{
		$CI =& get_instance();
		$CI->load->model('admin/our_client');
		$data_list = $CI->our_client->retrieve_all($limit,$page);
		if(!empty($data_list)){
			$i = $page;
			foreach($data_list as $k=>$val){ $i++;
				$data_list[$k]['sl']= $i;
				$data_list[$k]['sts_class']= ($val['status'] ==1) ? "icon-ok" : "icon-remove-sign";
			}
		}
		$data = array(
			'title' => 'Our Client List',
			'data_lists' => $data_list,
			'links' => $links
		);
		$all_list =  $CI->parser->parse('admin_view/our_clients/index',$data,true);
		return $all_list;
	}
	
	//article Edit Data
	public function get_edit_data($client_id)
	{
		$CI =& get_instance();
		$CI->load->model('admin/our_client');
		$edit_data = $CI->our_client->retrieve_edit_data($client_id);

		$data = array(
			'title' 			=> "Edit our clients" ,
			'client_id' 		=> $edit_data[0]['id'],
			'company_name' 		=> $edit_data[0]['company_name'],			
			'details' 			=> $edit_data[0]['company_details'],			
			'company_logo' 		=> $edit_data[0]['company_logo'],
			'web_link' 			=> $edit_data[0]['web_link'],
			'status' 			=> $edit_data[0]['status']
		);
		$article_data = $CI->parser->parse('admin_view/our_clients/edit',$data,true);		
		return $article_data;
	}
	//Search Product
	public function get_search_result($key_word)
	{
		$CI =& get_instance();
		$CI->load->model('admin/our_client');
		$data_list = $CI->our_client->retrieve_search_list($key_word);
		
		if(!empty($data_list)){
			$i = 0;
			foreach($data_list as $k=>$val){ $i++;
				$data_list[$k]['sl']= $i;
				$data_list[$k]['sts_class']= ($val['status'] ==1) ? "icon-ok" : "icon-remove-sign";
			}
		}
		$data = array(
				'title' => 'Our Client List',
				'data_lists' => $data_list
			);
		$all_list =  $CI->parser->parse('admin_view/our_clients/index',$data,true);
		return $all_list;
	}
}
?>
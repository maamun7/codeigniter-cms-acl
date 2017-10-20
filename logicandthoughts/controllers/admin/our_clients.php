<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Our_clients extends CI_Controller {
	
	function __construct() {
      parent::__construct();	  
	   $this->admin_template->current_menu = 'our_client';
	   $this->admin_template->page_header = 'Clients';
	   $this->admin_template->breadcrumb_url = 'our_client';
    }
	
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_our_client');
		$CI->load->library('admin/lour_client');
		$CI->load->model('admin/our_client');
		
		$config = array();
		$config["base_url"] = base_url()."admin/our_clients/index";
		$config["total_rows"] = $this->our_client->count_all_list();	  
		$config["per_page"] = 25;
		$config["uri_segment"] = 4;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
        $content = $CI->lour_client->get_list($limit,$page,$links);
        $sub_menu = array(
			array('label'=> 'Manage', 'url' => 'admin/our_clients','class' =>'active'),
			array('label'=> 'Add New', 'url' => 'admin/our_clients/add')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_our_client');
		$CI->load->library('admin/lour_client');
		$data['title'] = "Add New Did You Know";
		$content =$CI->parser->parse('admin_view/our_clients/add',$data=array(),true);
		$sub_menu = array(
				array('label'=> 'Manage', 'url' => 'admin/our_clients'),
				array('label'=> 'Add New', 'url' => 'admin/our_clients/add','class' =>'active')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}	
	
	public function insert()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_our_client');
		$CI->load->model('admin/our_client');	

		$key_str = key_generator($length=5);		
		$img_name = $key_str.'-'.time();
		$config['upload_path'] = './uploads/our_client/orginal_img';	
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '5000';
		$config['file_name']= $img_name;
	
		$this->load->library('upload',$config);	
		
		if (!$this->upload->do_upload())
		{
			//$data["error"] = $this->upload->display_errors();
			$error = $this->upload->display_errors();
			$this->session->set_userdata(array('error_message'=>$error));
			redirect(base_url('admin/our_clients/add'));
		}	
		else
		{
			$data = $this->upload->data();		
			$file_name = $data['file_name'];
			$this->create_image_thumb($file_name);
			$image_path = $data['file_path'];
			
			$data = array(
				'id' 				=> null,
				'company_name' 		=> $this->input->post('company_name'),
				'company_details' 	=> htmlspecialchars($this->input->post('client_details')),
				'company_logo' 		=> $file_name,
				'image_path' 		=> $image_path,
				'web_link' 			=> $this->input->post('web_links'),
				'created_on' 		=> date('Y-m-d',time()),  
				'status' 			=> $this->input->post('status'),
				
			);
		}
		$CI->our_client->do_insert($data);			
		$this->session->set_userdata(array('message'=>"Successfully Added !"));
		redirect(base_url('admin/our_clients'));
		exit;
	}
	
	public function edit($client_id = Null)
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_our_client');
		$CI->load->library('admin/lour_client');
		if(!$client_id){
			$this->session->set_userdata(array('message'=>"You didn't select our_client !"));
			redirect(base_url('admin/our_clients'));
		}
		$content = $CI->lour_client->get_edit_data($client_id);
		$sub_menu = array(
				array('label'=> 'Manage', 'url' => 'admin/our_clients'),
				array('label'=> 'Add New', 'url' => 'admin/our_clients/add'),
				array('label'=> 'Edit', 'url' => "admin/our_clients/edit/".$client_id,'class' =>'active')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Product Update
	public function update()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_our_client');
		$CI->load->model('admin/our_client');	
		
		$client_id = $this->input->post('client_id');	
		$file = $_FILES['userfile']['name'];
		if($file!='')
		{
			$key_str = key_generator($length=5);		
			$img_name = $key_str.'-'.time();
			$config['upload_path'] = './uploads/our_client/orginal_img';	
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['file_name']= $img_name;
		
			$this->load->library('upload',$config);	
			
			if (!$this->upload->do_upload())
			{
				//$data["error"] = $this->upload->display_errors();
				$error = $this->upload->display_errors();
				$this->session->set_userdata(array('error_message'=>$error));
				redirect(base_url('admin/our_clients/edit/'.$client_id));
			}	
			else
			{
				$data = $this->upload->data();		
				$file_name = $data['file_name'];
				$this->create_image_thumb($file_name);
				$image_path = $data['file_path'];
				
				$data = array(
					'company_name' 		=> $this->input->post('company_name'),
					'company_details' 	=> htmlspecialchars($this->input->post('client_details')),
					'company_logo' 		=> $file_name,
					'image_path' 		=> $image_path,
					'created_on' 		=> date('Y-m-d',time()),  
					'web_link' 			=> $this->input->post('web_links'),
					'status' 			=> $this->input->post('status')				
				);
			}
			$CI->our_client->delete_existing_img($client_id);
			$CI->our_client->do_update($data,$client_id);			
			$this->session->set_userdata(array('message'=>"Successfully Updated !"));
			redirect(base_url('admin/our_clients'));
			exit;
		}else{
			$data = array(
				'company_name' 		=> $this->input->post('company_name'),
				'company_details' 	=> htmlspecialchars($this->input->post('client_details')),
				'web_link' 			=> $this->input->post('web_links'),
				'created_on' 		=> date('Y-m-d',time()),  
				'status' 			=> $this->input->post('status')				
			);
			$CI->our_client->do_update($data,$client_id);			
			$this->session->set_userdata(array('message'=>"Successfully Updated !"));
			redirect(base_url('admin/our_clients'));
		}
	}
		
	//Delate our_client
	public function delete()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('delete_our_client');
		$CI->load->model('admin/our_client');
		$client_id =  $_POST['client_id'];	
		$CI->our_client->delete_existing_img($client_id);
		$status = $CI->our_client->do_delete($client_id);
		echo $status;
	}

	//Status change Home our_client
	public function change_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_our_client');
		$CI->load->model('admin/our_client');
		$client_id =  $_POST['client_id'];	
		$status = $CI->our_client->do_status_change($client_id);
		echo $status;
	}
	
	public function search_list()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_our_client');
		$CI->load->library('admin/lour_client');
		$key_word = $this->input->post('key_word');
        $content = $CI->lour_client->get_search_result($key_word);
        $sub_menu = array(
				array('label'=> 'Manage', 'url' => 'admin/our_clients','class' =>'active'),
				array('label'=> 'Add New', 'url' => 'admin/our_clients/add')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Create Product Thumb
	private function create_image_thumb($file_name)
	{
		$original_path = base_url().'uploads/our_clients/orginal_img';
		$thumbs_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/our_client/';
	
		$this->load->library('image_lib');
		// CONFIGURE IMAGE LIBRARY
		$thumbs =array(
			array("img_folder"=>"thumb_img","height"=>75,"width"=>140)
		);
		
		foreach($thumbs as $thumb){
			$config['image_library']    = 'gd2';
			$config['source_image']     = './uploads/our_client/orginal_img/'."$file_name";
			$config['new_image']        = $thumbs_path.$thumb['img_folder']."/";
			$config['maintain_ratio']   = FALSE;
			$config['height']           = $thumb['height'];
			$config['width']            = $thumb['width'];
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}
		
	public function upload_image_path_change()
	{	
		$CI =& get_instance();
		$CI->auth->check_admin_auth();		
		if (file_exists("uploads/articles/images/" . $_FILES["upload"]["name"]))
		{
		 echo $_FILES["upload"]["name"] . " already exists please choose another image.";
		}
		else
		{
		 move_uploaded_file($_FILES["upload"]["tmp_name"],
		 "uploads/articles/images/" . $_FILES["upload"]["name"]);
		 echo "Stored in: " . "uploads/articles/images" . $_FILES["upload"]["name"];
		}
	}
	
			
	public function browse_our_client_image()
	{	
		$CI =& get_instance();
		$CI->auth->check_admin_auth();
		$data = array();
		$this->load->view('admin_view/our_clients/ckfinderImage',$data);
	}
}
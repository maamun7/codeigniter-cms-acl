<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Our_client extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_all_list(){
		$this->db->select('*');
		$this->db->from('our_clients');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();	
		}
		return false;
	}
	
	public function retrieve_all($limit,$page){
		$this->db->select('*');
		$this->db->from('our_clients');		
		$this->db->order_by('id','desc');	
		$this->db->limit($limit,$page); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	function do_insert($data)
	{ 	
		$this->db->insert('our_clients',$data);	
        return true;
	}
	
	public function retrieve_edit_data($client_id){
	
		$this->db->select('*');
		$this->db->from('our_clients');
		$this->db->where('id',$client_id);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {
			return $query->result_array();		
		}
		return false;
	}
	
	public function do_update($data,$client_id)
	{	
		$this->db->where('id',$client_id);
		$this->db->update('our_clients',$data); 
        return true;
	}
	
	public function delete_existing_img($client_id)
	{
		$thumbs_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/our_client/';
		$this->db->select('company_logo,image_path');
		$this->db->from('our_clients');
		$this->db->where('id',$client_id);
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			foreach($query->result() as $rows){			
				$orgn_image =$rows->image_path.$rows->company_logo;
				//unlink($orgn_image);
				if (file_exists($orgn_image)) {
					unlink($orgn_image);
				}
				$thumbs =array(
					array("img_folder"=>"thumb_img")
				);
				foreach($thumbs as $thumb){
					$thum_image = $thumbs_path.$thumb['img_folder']."/".$rows->company_logo;
					//unlink($thum_image); 
					if (file_exists($thum_image)) {
						unlink($thum_image);
					}
				}	
			}
		}
		return true;
	}
	
	// Delete Category 
	public function do_delete($client_id)
	{	
		$this->db->where('id',$client_id);
		$this->db->delete('our_clients');
		return true;
	}
		//Change Course Name Status
	public function do_status_change($client_id)
	{
		$this->db->select('status');
		$this->db->from('our_clients');
		$this->db->where('id',$client_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->status;
			}
		}
		$status = ($status ==1) ? 0 : 1;
		$data=array('status' =>$status);
		$this->db->where('id',$client_id);
		$this->db->update('our_clients',$data); 
		return $status ;
	}
	
	public function retrieve_search_list($key_word)
	{
		$this->db->select('*');
		$this->db->from('our_clients');
		$this->db->like('company_name',$key_word,'both');
		$this->db->order_by('id','desc');	
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
		


}
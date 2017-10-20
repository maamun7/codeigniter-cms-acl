<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Menus extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Get Main Menu
	public function get_main_menus($parent_id){
		$this->db->select("id,name,link,contentid,is_current");
		$this->db->from('mainmenu'); 
		$this->db->where(array('published'=>1,'parent'=>$parent_id));	
		$this->db->order_by('ordering','asc');
		$this->db->limit(7,0); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
      
	public function change_menu_active_sts($menu_id)
	{
            $data=array('is_current' =>0);
		$this->db->update('mainmenu',$data);

            $data1=array('is_current' =>1);
		$this->db->where('id',$menu_id);
		$this->db->update('mainmenu',$data1);
		return true;
	}
}
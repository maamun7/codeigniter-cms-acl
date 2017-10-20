<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_setting extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('basic_settings');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}

	public function insert_basic_info($datas)
	{
		$this->db->insert('basic_settings',$datas);
        return true;
	}

	public function retrieve_edit_data($setting_id)
	{
		$this->db->select('*');
		$this->db->from('basic_settings');
		$this->db->where('id',$setting_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}

	public function update_basic_info($datas,$setting_id)
	{
		$this->db->where('id',$setting_id);
		$this->db->update('basic_settings',$datas);
        return true;
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_menu extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public $data;
		
	public function count_menu_list() {
		$this->db->select('*');
		$this->db->from('mainmenu');
		//$this->db->where(array('published'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();	
		}
		return false;
	}
	
	public function get_menu_list($parent,$level,$limit,$page){
		
		$this->db->select('*');
		$this->db->from('mainmenu'); 
		$this->db->where('parent',$parent);
		$this->db->order_by('ordering','asc');
		$this->db->limit($limit,$page); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {			
			$result =$query->result_array();
			foreach($result as $indx=>$val){
				$val['level'] = $level;
				$this->data[] = $val;
				$this->get_menu_list($val['id'],$level + 1,$limit,$page);
			}
			return $this->data;
		}else{
			return false;
		}
	}
	
	public function retrieve_parent_menu_list() {
		$this->db->select("id,name as 'parent_menu'");
		$this->db->from('mainmenu');
		$this->db->where(array('published'=>1,'parent'=>0));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	public function get_all_single_article() {
		$this->db->select('article_id,article_name');
		$this->db->from('articles');
		$this->db->where(array('status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}

	public function get_all_category() {
		$this->db->select('categories_id,categories_name');
		$this->db->from('categories');
		$this->db->where(array('categories_status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	function do_entry($data){ 
		$this->db->insert('mainmenu',$data);
        return true;
	}
	
	public function retrieve_edit_data($menu_id)
	{
		$this->db->select('*');
		$this->db->from('mainmenu'); 
		$this->db->where(array('id'=>$menu_id));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
		
	public function get_sub_cat_name($sub_cat_id) {
		$this->db->select('a.sub_cat_id,a.sub_cat_name');
		$this->db->from('sub_categories a');
		$this->db->join('categories b','a.parent_id=b.categories_id');
		$this->db->where(array('a.sub_cat_status'=>1,'b.categories_status'=>1,'a.sub_cat_id'=>$sub_cat_id));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();	
			return $result[0]['sub_cat_name'];	
		}
		return false;
	}
		
	public function get_article_name($article_id) {
		$this->db->select('article_id,article_name');
		$this->db->from('articles');
		$this->db->where(array('status'=>1,'article_id'=>$article_id));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();	
			return $result[0]['article_name'];	
		}
		return false;
	}
	
	public function do_update($data,$menu_id)
	{	
		$this->db->where('id',$menu_id);
		$this->db->update('mainmenu',$data); 
		return true;
	}
		
	// Delete Category 
	public function do_delete($menu_id)
	{		
		$this->db->where('id',$menu_id);
		$this->db->delete('mainmenu');
		return true;
	}
		//Change Course Name Status
	public function do_change_status($menu_id)
	{
		$this->db->select('published');
		$this->db->from('mainmenu');
		$this->db->where('id',$menu_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->published;
			}
		}
		if($status==1){
			$status=0;
		}else if($status==0){
			$status=1;
		}
		$data=array(
			'published' =>$status
		);
		$this->db->where('id',$menu_id);
		$this->db->update('mainmenu',$data); 
		return $status ;
	}
	
	public function retrieve_search_list($key_word)
	{		
		$this->db->select('*');
		$this->db->from('mainmenu');
		$this->db->like('name',$key_word,'both');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}	
	
	public function do_update_ordering()
	{	
		parse_str($_POST['pages'],$pageOrder);		
		foreach ($pageOrder['page'] as $key => $value) {
			//$sql = "UPDATE mainmenu SET 'ordering' =".$key." WHERE 'id'="$value."";
			$data = array('ordering'=>$key);
			$this->db->where('id',$value);
			$this->db->update('mainmenu',$data); 
		}	
		return true;
	}

}
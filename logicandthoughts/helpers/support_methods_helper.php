<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('key_generator'))
	{
		function key_generator($length)
		{
			$number=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","U","V","T","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0");
			
			for($i=0; $i<$length; $i++)
			{
				$rand_value=rand(0,61);
				$rand_number=$number["$rand_value"];
			
				if(empty($con))
				{ 
				$con=$rand_number;
				}
				else
				{
				$con="$con"."$rand_number";}
				}
			return $con;
		}
	}

	if(!function_exists('rec_display_children'))
	{
		function rec_display_children($parent,$level){
			$CI =& get_instance();
			$CI->load->model('admin/main_menu');
			
			
			return $this->main_menu->display_children($parent,$level);
		
		}
	}
	
	//Return date with full Chars of Month 
	if(!function_exists('get_date_full_month'))
	{
		function get_date_full_month($full_date = Null){
			$final_date="";
				if($full_date){
					$final_date = date('F j, Y', strtotime($full_date));
				}
			return $final_date;
		}
	}
	
	//Return date with first 3Chars of Month 
	if(!function_exists('get_date_small_month'))
	{
		function get_date_small_month($full_date = Null){
			$final_date="";
				if($full_date){
					$final_date = date('M j, Y', strtotime($full_date));
				}
			return $final_date;
		}
	}

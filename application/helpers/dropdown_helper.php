<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('career_dropdown'))
{
		
		function career_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('careers');
			$dropdown = "";
			$dropdown .= "<option value='0'>-อาชีพ-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('sexual_dropdown'))
{
		
		function sexual_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('sexual');
			$dropdown = "";
			$dropdown .= "<option value='0'>-รสนิยม-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if




if ( ! function_exists('title_dropdown'))
{
		
		function title_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('title');
			$dropdown = "";
			$dropdown .= "<option value='0'>-คำนำหน้า-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['name'])
					{
						$dropdown .= '<option value="'.$row['name'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('province_dropdown'))
{
		
		function province_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->order_by('name');
			$query = $ci->db->get('provinces');
			$dropdown = "";
			$dropdown .= "<option value='0'>-จังหวัด-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['code'])
					{
						$dropdown .= '<option value="'.$row['code'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['code'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['code'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('countries_dropdown'))
{
		
		function countries_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('countries');
			$dropdown = "";
			$dropdown .= "<option value='0'>-ประเทศ-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if



if ( ! function_exists('education_dropdown'))
{
		
		function education_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('education');
			$dropdown = "";
			$dropdown .= "<option value='0'>-การศึกษา-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('salary_dropdown'))
{
		
		function salary_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('salary');
			$dropdown = "";
			$dropdown .= "<option value='0'>-รายได้-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('books_dropdown'))
{
		
		function books_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('books');
			$dropdown = "";
			$dropdown .= "<option value='0'>-หนังสือ-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('issues_dropdown'))
{
		
		function issues_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('issues');
			$dropdown = "";
			$dropdown .= "<option value='0'>-คอลัมน์-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

/* End of file dropdown_helper.php */
/* Location: ./application/helpers/dropdown_helper.php */

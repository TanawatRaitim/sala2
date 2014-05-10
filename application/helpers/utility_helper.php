<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('get_issue_name'))
{
		
		function get_issue_name($id)
		{
			$ci =& get_instance();
			$ci->db->where('id',$id);
			$query = $ci->db->get('issues');
			$issue = $query->result_array();
			
			return $issue[0]['name'];

		}
}//end if


if ( ! function_exists('get_book_name'))
{
		
		function get_book_name($id)
		{
			$ci =& get_instance();
			$ci->db->where('id',$id);
			$query = $ci->db->get('books');
			$book = $query->result_array();
			
			return $book[0]['name'];

		}
}//end if





/* End of file utility_helper.php */
/* Location: ./application/helpers/utility_helper.php */

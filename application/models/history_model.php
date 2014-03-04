<?php
	class History_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function getall($perpage, $offset)
		{
			
			$sql = "SELECT ap_product.product_id, ap_product.product_name, ap_product.product_description, ap_frequency.frequency_name, ap_department.department_name  
					FROM ap_product 
					LEFT JOIN ap_frequency ON(ap_product.frequency_id = ap_frequency.frequency_id)
					LEFT JOIN ap_department ON(ap_product.department_id = ap_department.department_id)
					ORDER BY ap_product.product_name
					";
					
			$sql = "SELECT members.member_code, CONCAT(members.title,' ',members.fname,' ',members.lname) as member_name,
					(YEAR(CURDATE())-YEAR(members.dob)) as age, provinces.name as province, 
					books.name as book, issues.name as issue, history.volume, sexual.name as sexual, sexual.description as sexual_descr, sexual.image as sexual_img   
					FROM history 
					LEFT JOIN members ON(members.id = history.member_id)
					LEFT JOIN sexual ON(sexual.id = history.sexual_id)
					LEFT JOIN provinces ON(provinces.code = members.province_id)
					LEFT JOIN books ON(books.id = history.book_id)
					LEFT JOIN issues ON(issues.id = history.issue_id)
					ORDER BY history.id DESC
					";
			
			
			
			if($offset)
			{
				$limit = " LIMIT $offset, $perpage";
			}
			else{
				
				$limit = " LIMIT $perpage";
			}
						
			
			$sql .= $limit;
			
			$query = $this->db->query($sql);
			
			return $query;
		}
		
	}	
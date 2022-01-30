<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent ::__construct();
	}
	public function get_menus($role_id)
	{
		$this->db->select('page');
		$this->db->from('roles');	
		$this->db->where('role_id', $role_id);
		$query= $this->db->get();
		$res= $query->result();
		
		$pages = array();
		$pages = explode(',', $res[0]->page);		
		$new = (array_filter($pages));	
		
		$result = $this->Admin_model->get_pages($new);		
		return $result;
	}
	
	public function get_pages($new)
	{			
		$this->db->select('*');
		$this->db->from('pages');	
		$this->db->where_in('page',$new);		
		$query1= $this->db->get();
		return $query1->result();
	}
	public function get_roles()
	{
		$this->db->select('*');
		$this->db->from('roles');		
		$query= $this->db->get();
		return $query->result();		
	}
	
	public function add_RoleData($data)
	{
		$result= $this->db->insert('roles',$data);
		return $result; 
	}
	public function getParentPage($pages)
	{
		$pages_array = explode(',',$pages);
		$final_pages = array();
		
		foreach ($pages_array as $row){
			$this->db->select('parent_id');
			$this->db->from('pages');	
			$this->db->where ('page',$row);		
			$parent_id=  $this->db->get()->row()->parent_id;
			if ($parent_id > 0){
				$this->db->select('page');
				$this->db->from('pages');	
				$this->db->where ('page_id',$parent_id);
				$parent_page = 	$this->db->get()->row()->page;
				if (!in_array($parent_page, $final_pages)){
					array_push($final_pages,$parent_page);			
					
				}
				if (!in_array($row, $final_pages)){
					array_push($final_pages,$row);
				}
			}else{
				if (!in_array($row, $final_pages)){
					array_push($final_pages,$row);
				}
			}
			
		}
		return implode(",",$final_pages); 
	}
	public function getRole($role_id)
	{
		$this->db->select('*');
		$this->db->from('roles');
		$this->db->where('role_id', $role_id);
		$query= $this->db->get();
		return $query->result();
		/* $res= $query->result();
		
		$all_pages =$this->Admin_model->getParentPage($res[0]->page);
		$pages = explode(',', $all_pages);
		array_push($res,$pages);
		print_r($res);
		die(); */
	}
	public function update_RoleData($role_id, $data)
	{
		$this->db->set($data);
		$this->db->where('role_id',$role_id);
		$this->db->update('roles');
	}
	public function Delete_Role($id)
	{
		$this->db->where('role_id', $id);
		$this->db->delete('roles');
		
	}
	public function get_staff()
	{
		$this->db->select('s.id, s.first_name, s.last_name, s.designation, s.landline, s.mobile_1, s.joining_date, r.role');
		$this->db->from('staffs s');
		$this->db->join('roles r', 's.roles = r.role_id');
		$query= $this->db->get();
		return $query->result();
	}	
	public function add_StaffData($data,$mobile)
	{
		$result= $this->db->insert('staffs',$data);
		$id=$this->db->insert_id();
		return $id;  
	}
	public function staff_exists($mobile)
	{
		$this->db->select('*'); 
	    $this->db->from('staffs');    
		$this->db->or_where('mobile_1', $mobile);
	    $query = $this->db->get();
	    if ($query->num_rows()){
			return true;
		}else{
			return false;
		}
	    /*$result = $query->result();
	    return $result;*/
	}
	public function Delete_Staff($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('staffs');
	}
	public function getStaff($id)
	{
		$this->db->select('*');
		$this->db->from('staffs');
		$this->db->where('id', $id);
		$query= $this->db->get();
		return $query->result();
	}
	public function update_StaffData($id,$data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('staffs');
	}
	public function check_name_values($f_name,$m_name,$l_name)
	{
		$this->db->select('*');
		$this->db->from('staffs');
		$query = $this->db->get();
		$result= $query->result(); 
		
		$name = array();
		$newname = $f_name." ".$m_name." ".$l_name;
		
		foreach($result as $row)
		{
			$name[] = $row->first_name." ".$row->middle_name." ".$row->last_name;
		}
		if(in_array($newname,$name)) 
		{
			return $newname;
		}
		else
		{
			return false;
		}
			
	}

}


?>
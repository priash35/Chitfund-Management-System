<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	
	public function test_function()
	{
		echo "In function";
	}
	public function audit_trail()
	{
		
		$this->load->model("Audit_model");
		$key = 'id';
		$cus_id = 1;
		$data=array("first_name"=>"Chetan", "middle_name"=>"Chetan", "last_name"=>"Joshi");
		$table = 'Customers';
		$diff = array();
		$diff = $this->Audit_model->get_update_fields($key,$cus_id,$data,$table);
		print_r($diff);
		die();
		$this->Audit_model->insert_audit_record("admin",$table,$diff);
	}
	
}

?>
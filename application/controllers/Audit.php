<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends CI_Controller {
	
	public function audit_trail($data,$key,$key_value,$table,$user_id)
	{		
		$this->load->model("Audit_model");		
		/*$key = 'id';
		$cus_id = 1;
		$data=array("first_name"=>"Chetan", "middle_name"=>"Chetan", "last_name"=>"ABCD");
		$table = 'Customers';*/
		$diff = array();
		$diff = $this->Audit_model->get_update_fields($key,$key_value,$data,$table);
		
		$this->Audit_model->insert_audit_record($user_id,$table,$diff,$key,$key_value);
	}
}

?>
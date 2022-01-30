<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
		
	public function __construct()
	{
		//parent::Controller();
		parent::__construct();
		/*if (!isset($_SESSION['user_logged'])) {
			
			$this->session->set_flashdata("error", "please login first view of page");
			redirect("login/index","refresh");
		}*/
		
		$this->load->library('parser');
		$this->load->model('Group_model');	
		//$this->load->model('Company_model');		
	}	
	
	public function parse_byelaw($id)
	{
		$group = $this->Group_model->get_single_groupdata($id);
		foreach($group as $data){
			$data = array(
	        'byelaw_date' => $data->byelaw_date,
	        'chit_amount' => $data->chit_amount,
	        'group_type' => $data->group_type,
	        'group_name' => $data->group_name,
	        'duration' => $data->group_duration,
	        'sub' => ($data->chit_amount/$data->group_duration)
			);
		}

		$this->parser->parse('templates/blog_template', $data);
		
	}
	
	
	
}

?>
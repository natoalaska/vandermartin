<?php

class Newsletter extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function archive() {
		$data['view'] = 'newsletter/archive';
		$this->load->view('includes/template', $data);
	}

}
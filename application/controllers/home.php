<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$data['view'] = 'home_view';
		$this->load->view('includes/template', $data);
	}

}
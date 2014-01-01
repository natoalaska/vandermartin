<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('migration');
	}
	
	function run($version = -1) {
		if($version == -1) {
			$version = $this->migration->get_version() + 1;
		}
		
		if(!$this->migration->version($version)) {
			show_error($this->migration->error_string());
		}
	}
	
	function rollback($version = -1) {
		if($version == -1) {
			$version = $this->migration->get_version() -1;
		}
		
		$err = $this->migration->version($version);
		$err_msg = $this->migration->error_string();
		if($err != 0 and $err_msg) {
			show_error($err_msg);
		}
	}

}
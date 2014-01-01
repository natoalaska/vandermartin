<?php

class Game extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	function crossme() {
		$this->load->view('games/crossme');
	}

}
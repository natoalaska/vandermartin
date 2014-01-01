<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basemodel extends DataMapper {

	public $ci;

	public function __construct() {
		parent::__construct();
		$this->ci =& get_instance();
	}

}
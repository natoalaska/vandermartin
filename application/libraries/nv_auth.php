<?php

class Nv_auth {

	public function hash($password, $salt = null) {
		$hash = hash('sha256', $password . $salt);
		return $hash;
	}
	
	public function salt() {
		mt_srand(microtime(true)*100000 + memory_get_usage(true));
		return md5(uniqid(mt_rand(), true));
	}

}
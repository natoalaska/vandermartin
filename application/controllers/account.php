<?php

class Account extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function settings() {
		$data['view'] = 'account/settings';
		if($this->session->flashdata('formError') != null) {
			$data['error'] = $this->session->flashdata('formError');
		} else if (validation_errors()) {
			$data['error'] = validation_errors();
		} else {
			$data['error'] = '';
		}
		$this->load->view('includes/template', $data);
	}
	
	public function changePass() {
		if ($this->form_validation->run('changePass')) {
			$oldPass = $this->input->post('oldPass');
			$newPass = $this->input->post('newPass1');
			$u = new User();
			$u->get();
			if($u->password === $this->nv_auth->hash($oldPass, $u->salt)) {
				$newPass = $this->nv_auth->hash($newPass, $u->salt);
				$u->update('password',$newPass);
				$this->session->set_flashdata('formError', 'Your password has been updated');
				$this->settings();
			} else {
				$this->session->set_flashdata('formError', 'Your old password does not match');
				$this->settings();
			}
		} else {
			$this->settings();
		}
	}

}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function index() {
		if($this->session->flashdata('loginError') != null) {
			$data['error'] = $this->session->flashdata('loginError');
		} else if (validation_errors()) {
			$data['error'] = validation_errors();
		} else {
			$data['error'] = '';
		}
		$this->load->view('forms/login', $data);
	}
	
	function login() {
		if ($this->form_validation->run('login')) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$u = new User();
			$u->where('email',$email);
			$u->get();
			if($u->password == $this->nv_auth->hash($password,$u->salt)) {
				$data = array(
					'isLogged'	=> true,
					'id'		=> $u->id,
					'user'		=> $u->fName
				);
				$this->session->set_userdata($data);
				redirect('home');
			} else {
				$this->session->set_flashdata('loginError','The email or password is incorrect.');
				$this->index();
			}
		} else {
			$this->index();
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}

}
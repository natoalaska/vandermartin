<?php

class Contact extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index($type = null) {
		$data['view'] = 'contact/index';
		if($type != null) {
			$data['type'] = $type;
		} else {
			$data['type'] = 'message';
		}
		if($this->session->flashdata('contactError') != null) {
			$data['error'] = $this->session->flashdata('contactError');
		} else if (validation_errors()) {
			$data['error'] = validation_errors();
		} else {
			$data['error'] = '';
		}
		$this->load->view('includes/template', $data);
	}
	
	public function send() {
		if ($this->form_validation->run('contact')) {
			$type = $this->input->post('type');
			$subject = $this->input->post('subject');
			$receiver = $this->input->post('receiver');
			$message = $this->input->post('message');
			$sender = $this->session->userdata('id');
			$c = new Message();
			$c->sender	= $sender;
			$c->receiver = $receiver;
			$c->type	= $type;
			$c->subject = $subject;
			$c->message	= $message;
			$c->sendDT	= date('Y-m-d h:i:s');
			$c->uid = md5(rand(1000, 999999999));
			$c->save();
			$this->session->set_flashdata('contactError','Your message was send successfully');
			$this->index();
		} else {
			$this->index($this->input->post('type'));
		}
	}

}
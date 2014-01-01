<?php

class Messages extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$data['messages'] = $this->getMessages(true);
		$data['view'] = 'messages/index';
		$this->load->view('includes/template', $data);
	}
	
	function getMessages($all = false) {
		$m = new Message();
		$m->where('receiver',$this->session->userdata('id'));
		$m->get();
		$message = array();
		if($all) {
			foreach($m as $key => $value) {
				$u = new User();
				$u->where('id', $value->sender);
				$u->get();
				$message['id'][] = $value->id;
				$message['senderName'][] = $u->fName . ' ' . $u->lName;
				$message['subject'][] = $value->subject;
				$message['message'][] = $value->message;
				$message['sender'][] = $value->sender;
				$message['sendDT'][] = new DateTime($value->sendDT);
				$message['read'][] = $value->read;
				$message['readDT'][] = new DateTime($value->readDT);
				$message['type'][] = $value->type;
				$message['uid'][] = $value->uid;
			}
		} else {
			$u = new User();
			$u->where('id', $m->sender);
			$u->get();
			$messages['id'] = $m->id;
			$message['senderName'] = $u->fName . ' ' . $u->lName;
			$message['subject'] = $m->subject;
			$message['message'] = $m->message;
			$message['sender'] = $m->sender;
			$message['sendDT'] = new DateTime($m->sendDT);
			$message['read'] = $m->read;
			$message['readDT'] = new DateTime($m->readDT);
			$message['type'] = $m->type;
			$message['uid'] = $m->uid;
		}
		return $message;
	}
	
	function read($message) {
		$m = new Message();
		$m->where('receiver', $this->session->userdata('id'));
		$m->where('uid', $message);
		$m->get();
		$m->read = 1;
		$m->readDT = date('Y-m-d h:i:s');
		$m->save();
		
		
		$data['message'] = $this->getMessages();;
		$data['view'] = 'messages/read';
		$this->load->view('includes/template', $data);
	}

}
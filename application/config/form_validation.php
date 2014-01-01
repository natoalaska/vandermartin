<?php

$config = array(
	'login' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|md5'
		)
	),
	'changePass' => array(
		array(
			'field'	=> 'oldPass',
			'label' => 'Old Password',
			'rules' => 'required|md5'
		),
		array(
			'field'	=> 'newPass1',
			'label' => 'New Password',
			'rules' => 'required|matches[newPass2]|md5'
		),
		array(
			'field'	=> 'newPass2',
			'label' => 'Confirmation Password',
			'rules' => 'requied|md5'
		)
	),
	'contact' => array(
		array(
			'field'	=> 'subject',
			'label'	=> 'Subject',
			'rules' => 'required'
		),
		array(
			'field'	=> 'message',
			'label'	=> 'Message',
			'rules' => 'required'
		)
	)
);
<?php

class Migration_User_tables extends CI_Migration {

	private $tables = array(
		'users' => array(
			'email'			=> array('type' => 'VARCHAR'	, 'constraint' => '50'						),
			'fName'			=> array('type' => 'VARCHAR'	, 'constraint' => '20'						),
			'lName'			=> array('type' => 'VARCHAR'	, 'constraint' => '20'						),
			'password'		=> array('type' => 'VARCHAR'	, 'constraint' => '64'						),
			'salt'			=> array('type' => 'VARCHAR'	, 'constraint' => '32'						),
			'registered'	=> array('type' => 'BOOLEAN'	, 						'default' => '0'	),
			'joined'		=> array('type' => 'DATETIME'												)
		),
		'messages' => array(
			'sender'		=> array('type' => 'INT'		, 'constraint' => '11'						),
			'receiver'		=> array('type' => 'INT'		, 'constraint' => '11'						),
			'type'			=> array('type' => 'VARCHAR'	, 'constraint' => '50'						),
			'subject'		=> array('type' => 'TEXT'													),
			'message'		=> array('type' => 'TEXT'													),
			'sendDT'		=> array('type' => 'DATETIME'												),
			'read'			=> array('type' => 'BOOLEAN'	, 						'default' => '0'	),
			'readDT'		=> array('type' => 'DATETIME'												),
			'uid'			=> array('type' => 'VARCHAR'	, 'constraint' => '32'						)
			'sendDel'		=> array('type' => 'BOOLEAN'	, 						'default' => '0'	)
			'recDel'		=> array('type' => 'BOOLEAN'	, 						'default' => '0'	)
		)
	);
	
	public function up() {
		foreach ($this->tables as $table => $fields) {
			echo "Creating table: $table. <br />";
			$this->dbforge->add_field('id');
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table($table);
		}
		return 'Created All User Tables (users and messages).';
	}
	
	public function down() {
		foreach ($this->tables as $table => $fields) {
			echo "Dropping Table: $table. <br />";
			$this->dbforge->drop_table($table);
		}
	}
	
}
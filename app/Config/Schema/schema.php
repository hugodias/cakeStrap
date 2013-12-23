<?php 

class AppSchema extends CakeSchema {

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource('default');
    	$db->cacheSources = false;
		return true;
	}

	public function after($event = array()) {
		
	}
	
	public $users = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'username' => array('type' => 'string', 'length' => 255),
		'password' => array('type' => 'string', 'length' => 255),
		'email' => array('type' => 'string', 'length' => 255),
		'name' => array('type' => 'string', 'length' => 255),
		'role' => array('type' => 'string', 'length' => 255),
		'hash_change_password' => array('type' => 'string', 'length' => 255),
		'created' => array('type' => 'datetime'),
		'modified' => array('type' => 'datetime'),
		'indexes' => array(
		
		'PRIMARY' => array('column' => 'id', 'unique' => 1)
		
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	
}

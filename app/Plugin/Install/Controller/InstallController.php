<?php

App::uses('Controller', 'Controller');
App::uses('File', 'Utility');
App::uses('ConnectionManager', 'Model');
App::uses('SchemaInstallShell', 'Install.Console/Command');

/**
 * Install Controller
 *
 */
class InstallController extends Controller {


	public $helpers = array('Form' => array('className' => 'CakeStrapForm'));

/**
 * Default configuration
 *
 * @var array
 * @access public
 */
public $defaultConfig = array(
	'name' => 'default',
	'datasource' => 'Database/Mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'root',
	'password' => 'root',
	'database' => 'cakestrap',
	'schema' => null,
	'prefix' => null,
	'encoding' => 'UTF8',
	'port' => null,
	);

public $result;

/**
 * If settings.json exists, app is already installed
 *
 * @return void
 */
	protected function _check() {
		if (Configure::read('Application.status')) {
			$this->Session->setFlash(__('Already Installed'),'flash_success');
			$this->redirect('/');
		}
	}

/**
 * Step 0: welcome
 *
 * A simple welcome message for the installer.
 *
 * @return void
 * @access public
 */
	public function index() {
		$this->_check();
		$this->set('title_for_layout', __('Installation: Welcome'));
	}

	
/**
 * Step 1: database
 *
 * 
 *
 * @return void
 * @access public
 */
	public function database() {
		$this->_check();
		$this->set('title_for_layout', __('Step 1: Database'));

		if (Configure::read('Application.status')) {
			$this->redirect(array('action' => 'adminuser'));
		}

		if (!empty($this->request->data)) {
			
			if (!$this->createDatabaseFile($this->request->data)) {
				$this->Session->setFlash($this->result,'flash_fail');
				return false;
			} 
			$this->Session->setFlash(__('File database.php created successfully.'),'flash_success');
			$this->redirect(array('action' => 'data'));
		}
	}

/**
 * Step 2: 
 *  
 *	Inserir as tabelas no sistema atraves do schema.php
 *
 * @return void
 * @access public
 */
	public function data() {
		$this->_check();
		$this->set('title_for_layout', __('Step 2: Build database'));

		$this->loadModel('Install.Install');
		$ds = $this->Install->getDataSource();
		$ds->cacheSources = false;
		$sources = $ds->listSources();
		if (!empty($sources)) {
			$this->Session->setFlash(__('Warning: Database "%s" is not empty.', $ds->config['database']),'flash_fail');
			$this->redirect(array('action'=>'database'));
		}

		if (isset($this->params['named']['run'])) {
			if ($this->setupDatabase()) {
				$this->Session->setFlash(__('Structure of the database successfully created.'),'flash_success');
				$this->redirect(array('action' => 'adminuser'));
			}
			$this->redirect(array('action' => 'database'));
		}
	}

/**
 * Step 3: 
 *
 *	Criar o usuario inicial do sistema
 */
	public function adminuser() {
		if (!is_file(APP . 'Config' . DS . 'database.php')) {
			$this->redirect('/');
		}

		if ($this->request->is('post')) {
			if (!$this->loadModel('User')) {
				$this->loadModel('User');
			}
			
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
				if ($this->User->save($this->request->data)) {
					$this->redirect(array('action' => 'config'));
				}
			}
		}
	}

/**
 * Step 4: config
 *
 * Criar o arquivo de configuracoes 
 *
 */
	public function config() {
		$this->_check();
		$this->set('title_for_layout', __('Step 4: Config'));

		if (!empty($this->request->data)) {
			if ($this->createConfigFile($this->request->data)) {
				$this->Session->setFlash(__('File config.php created successfully.'),'flash_success');
				$this->redirect(array('action' => 'finish'));
			} 
			
			$this->Session->setFlash(__('File database.php created successfully.'),'flash_fail');
			return false;
		}
	}

/**
 * Step 5: finish
 *
 * Copy settings.json file into place and create user obtained in step 3
 *
 * @return void
 * @access public
 */
	public function finish($data = array()) {
		$this->_check();
		$this->set('title_for_layout', __('Installation successful'));
		
		$this->setStatusConfigFile();
		if (!$this->loadModel('User')) {
			$this->loadModel('User');
		}
		$user = $this->User->find('first');
		$this->set('user',$user['User']);
	}

/**
 * Create database.php from default file
 *
 * @return bool true when successful
 */
	public function createDatabaseFile($data) {
		
		$config = $this->defaultConfig;

		foreach ($data['Install'] as $key => $value) {
			if (isset($data['Install'][$key])) {
				$config[$key] = $value;
			}
		}

		copy(APP . 'Config' . DS . 'database.php.install', APP . 'Config' . DS . 'database.php');
		$file = new File(APP . 'Config' . DS . 'database.php', true);
		$content = $file->read();

		foreach ($config as $configKey => $configValue) {
			$content = str_replace('{{' . $configKey . '}}', $configValue, $content);
		}

		if (!$file->write($content)) {
			$this->result = __('Could not write database.php file.');
			return false;
		}

		try {
			ConnectionManager::create('default', $config);
			$db = ConnectionManager::getDataSource('default');
		}
		catch (MissingConnectionException $e) {
			$this->result = __('Could not connect to database: ') . $e->getMessage();
			return false;
		}

		if (!$db->isConnected()) {
			$this->result = __('Could not connect to database.');
			return false;
		}
		return true;
	}

/**
 * Run Migrations and add data in table
 *
 * @return If migrations have succeeded
 */
	public function setupDatabase() {
		$SchemaInstall = new SchemaInstallShell();
		$SchemaInstall->startup();
		$SchemaInstall->instala();

		$ds = $this->Install->getDataSource();
		$ds->cacheSources = false;
		$sources = $ds->listSources();

		if (!empty($sources)) {
			return true;
		}
		return false;
	}
/**
 * Create config.php from default file
 *
 * @return bool true when successful
 */
	public function createConfigFile($data) {
		copy(APP . 'Config' . DS . 'config.php.install', APP . 'Config' . DS . 'config.php');
		$file = new File(APP . 'Config' . DS . 'config.php', true);
		$content = $file->read();
		$data = $data['Install'];
		foreach ($data as $key => $value) {
			$content = str_replace('{{' . $key . '}}', $value, $content);
		}		
		if (!$file->write($content)) {
			return false;
		}
		return true;
	}

	public function setStatusConfigFile($status = true) {
		
		$file = new File(APP . 'Config' . DS . 'config.php', true);
		$content = $file->read();
		$content = str_replace('false', $status, $content);
		
		if (!$file->write($content)) {
			return false;
		}
		return true;
	}

}

<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
  
  public $isMobile = false;
  public $isTablet = false;

  public $components = array('Auth','Session','Error','Cookie','MobileDetect');
  public $uses = array('User');
  public $helpers = array('CakeStrap' => array('className' => 'CakeStrapHtml'),
                          'Form' => array('className' => 'CakeStrapForm'));


  public function beforeFilter()
  {
    $this->Cookie->time = '30 Days';  // or '1 hour'
    $this->Cookie->key = 'AS()XA(S*D)AS8dA(Sd80A(SDA*SDAS%D4$AS#SD@ASDtyASGH)_AS0dAoIASNKAshgaFA$#S21d24a3s45dAS$3d#A@$SDASCHVASCa4s33%$ˆ$%$#s253$AS5#Â$%s645$#AS@%#AˆS6%A&*SÂ%S$';
    $this->Cookie->httpOnly = true;

    $this->Auth->authenticate = array('Form');

    $this->Auth->loginRedirect = array('controller'=>'pages','action'=>'index');
    $this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
    $this->Auth->authError = 'You are not allowed to see that.';

    # Login with Cookie
    if(!$this->Auth->loggedIn() && $this->Cookie->check('Auth.User'))
    {
      $cookie = $this->Cookie->read('Auth.User');

      $user = $this->User->find('first', array(
        'conditions' => array(
          'User.username' => $cookie['username'],
          'User.password' => $cookie['password']
          )
        )
      );

      # Manually login the user
      if( $this->Auth->login($user['User']) ){
        $this->redirect('/home');
      }

      # Redirect to home if is logged in
      if($this->Auth->loggedIn() && $this->params->controller == 'users' && $this->params->action == 'login')
        $this->redirect('/home');
      }

	  if( $this->params->params['controller'] == 'users' && $this->params->params['action'] == 'login' && AuthComponent::user('id'))
	  {
		  $this->redirect('/home');
	  }

	  if( $this->params->params['controller'] == 'users' && $this->params->params['action'] == 'login'){
		  $this->dbIsConnected();
	  }

    # To enable portuguese language as main
    # Configure::write('Config.language', 'por');
  }

  public function beforeRender() {
    
  /**
  * Verifica se a requisição é mobile, caso seja verifica se de celular ou tablet
  */
    if ($this->request->is('mobile')) {
        if (!$this->_isTablet()) {
            $this->isMobile = true;
        }
    }

  /**
   *  Se a requisição for mobile ou tablet e existir o(s) arquivo(s)
   *  da view e/ou layout para serem redenrizados
   */
    if (isset($this->isMobile) && $this->isMobile) {
      if (is_file(APP . 'View' . DS . 'Layouts' . DS . 'mobile' . DS . $this->layout . '.ctp')) {
        $this->layout = 'mobile/'. $this->layout;
      }
      if (is_file(APP . 'View' . DS . $this->name . DS . 'mobile' . DS . $this->action . '.ctp')) {
          $this->render('mobile/' . $this->action);
      } 
    }
    if (isset($this->isTablet) && $this->isTablet) {
      if (is_file(APP . 'View' . DS . 'Layouts' . DS . 'tablet' . DS . $this->layout . '.ctp')) {
          $this->layout = 'tablet/'. $this->layout;
      }
      if (is_file(APP . 'View' . DS . $this->name . DS . 'tablet' . DS . $this->action . '.ctp')) {
          $this->render('tablet/' . $this->action);
      } 
    }
    
    // Seta as variaveis para serem usadas na view
    $this->set(array(
      'base_url'  => Router::url('/',true),
      'is_tablet' => $this->isTablet,
      'is_mobile' => $this->isMobile));

    parent::beforeRender();

  }


  /**
  * Verifica se a requisição está vindo de um tablet
  * 
  */
  protected function _isTablet() 
  {
    
    if (!isset($this->MobileDetect)) {
      $this->MobileDetect = $this->Components->load('MobileDetect.MobileDetect');
    }
    $this->isTablet = $this->MobileDetect->detect('isTablet');
    return $this->isTablet;
  }


	/**
	 * Verifica uma vez se a conexao foi estabelecida
	 */
	protected function dbIsConnected()
	{
		App::uses('ConnectionManager', 'Model');
		if( !$this->Cookie->check('Verify.connected') ) {
			try {
				$db = ConnectionManager::getDataSource('default');
			}
			catch (MissingConnectionException $e) {
				$this->redirect('/install');
			}

			if (!$db->isConnected()) {
        $this->redirect('/install');
			}

			$this->Cookie->write('Verify.connected',true);
		}

	}
}



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
  public $components = array('Auth','Session','Error','Cookie');
  public $uses = array('User');

  public function beforeFilter()
  {
    $this->Cookie->time = '30 Days';  // or '1 hour'
    $this->Cookie->key = 'AS()XA(S*D)AS8dA(Sd80A(SDA*SDAS%D4$AS#SD@ASDtyASGH)_AS0dAoIASNKAshgaFA$#S21d24a3s45dAS$3d#A@$SDASCHVASCa4s33%$ˆ$%$#s253$AS5#Â$%s645$#AS@%#AˆS6%A&*SÂ%S$';
    $this->Cookie->httpOnly = true;

    $this->Auth->authenticate = array('Form');

    $this->Auth->loginRedirect = array('action' => 'index', 'controller' => 'pages');
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

    # To enable portuguese language as main
    # Configure::write('Config.language', 'por');
  }
}



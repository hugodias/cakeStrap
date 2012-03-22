<?php 
/**
* 
*/
class UsersController extends AppController
{
	
	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->allow('register');
	}

	public function home()
	{
		# This is a secret area
	}

	# Action to log the user in
	public function login() {

	    if ($this->request->is('post')) {

	        if ($this->Auth->login()) {

	            return $this->redirect( $this->Auth->redirect() );

	        } else {

	            $this->Session->setFlash(__('Username or password is incorrect'), 'flash_fail', array(), 'auth');

	        }
	    }
	}
	
	public function logout() {

	    $this->redirect($this->Auth->logout());

	}	

	# Registering the user
	public function register()
	{
		if( $this->request->data )
		{
			# Logging the user after register
		    if ( $this->User->save( $this->request->data ) ) 
		    {
		        $id = $this->User->id;

		        $this->request->data['User'] = array_merge($this->request->data["User"], array('id' => $id));

		        $this->Auth->login( $this->request->data['User'] );

		        $this->redirect('/users/home');
		    }			
		}
	
	}
}
?>
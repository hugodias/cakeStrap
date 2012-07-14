<?php 
class UsersController extends AppController
{
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register','logout');
	}

	public function home()
	{
    $this->User->recursive = 0;
    $this->set('users', $this->paginate());
	}

	public function login() 
	{
    if ($this->request->is('post')) 
    {
      if ($this->Auth->login()) 
      {
          $this->redirect($this->Auth->redirect());
      } 
      else 
      {
          $this->Session->setFlash(__('Invalid username or password, try again'),'flash_fail');
      }
    }
	}


	public function logout() 
	{
    $this->redirect($this->Auth->logout());
	}


  public function view($id = null) 
  {
    $this->User->id = $id;

    if (!$this->User->exists()) 
    {
      throw new NotFoundException(__('Invalid user'));
    }

    $this->set('user', $this->User->read(null, $id));
  }	


	public function register()
	{
    if ($this->request->is('post')) 
    {
      $this->User->create();

      if ($this->User->save($this->request->data)) 
      {
        $this->Session->setFlash(__('The user has been saved'),'flash_success');
        $this->redirect(array('controller' => 'pages','action' => 'home'));
      } 
      else 
      {   
        # Create a loop with validation errors
        $this->Error->set( $this->User->invalidFields() );
      }
    }
	}

  public function edit($id = null) 
  {
    $this->User->id = $id;

    if (!$this->User->exists()) 
    {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById( $id );
    $this->set('user',$user);

    if ($this->request->is('post') || $this->request->is('put')) 
    {
      if( empty($this->request->data['User']['password']) )
      {
        unset($this->request->data['User']['password']);
      }

      if ($this->User->save($this->request->data)) 
      {
          $this->Session->setFlash(__('The user has been saved'),'flash_success');
          $this->redirect(array('action' => 'home'));
      } 
      else 
      {
          $this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flash_fail');
      }
    } 
    else 
    {
      $this->request->data = $this->User->read(null, $id);
      unset($this->request->data['User']['password']);
    }
  }	

  public function delete($id = null) 
  {
    $this->User->id = $id;

    if (!$this->User->exists()) 
    {
      throw new NotFoundException(__('Invalid user'));
    }

    if ($this->User->delete()) 
    {
      $this->Session->setFlash(__('User deleted'),'flash_success');
      $this->redirect(array('action' => 'home'));
    }

    $this->Session->setFlash(__('User was not deleted'),'flash_fail');

    $this->redirect(array('action' => 'home'));
  }    
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: hugodias
 * Date: 14/10/14
 * Time: 14:40
 */

namespace App\Controller;

class UsersController extends AppController
{
    public function login()
    {
        $user = $this->Users->newEntity($this->request->data);

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(
                    __('Username or password is incorrect'),
                    'default',
                    [],
                    'auth'
                );
            }
        }

        $this->set('user', $user);
    }
} 
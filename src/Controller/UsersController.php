<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UserclassesTable;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event){
        $this->Auth->allow(['userid','register','logout']);
//        $this->Auth->allow('add');

        if ($this->RequestHandler->accepts('html')) {
            // Execute code only if client accepts an HTML (text/html)
            // response.
        } elseif ($this->RequestHandler->accepts('xml')) {
            // Execute XML-only code
        }
        if ($this->RequestHandler->accepts(['xml', 'rss', 'atom'])) {
            // Executes if the client accepts any of the above: XML, RSS
            // or Atom.
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bookmarks']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Account has been created.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Account was not created. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl('/users/'.$this->Auth->user('id')));
            }else{
            $this->Flash->error("Your username or password is incorrect");
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function userid($id = null){
        //Getting all passed parameters
        //$userclasses = $this->request->params['pass'];

        //Send user email
        $user = $this->Users->get($id);
        $this->set('user_email', $user['email']);
        $this->set('_serialize', ['user_email']);
        //send user id
        //Send user email
        $user = $this->Users->get($id);
        $this->set('user_id', $user['id']);
        $this->set('_serialize', ['user_id']);


//        debug($user);

        $userclasses = TableRegistry::get('Userclasses');

//        debug($userclasses);

        //Get by user id
        $userclass = $userclasses->get($id, [
            'contain' => ['Questions']
        ]);

//        debug($userclass);
        $userclasses = $userclasses->find()->where(['user_id' => $id]);

//        foreach($userclasses as $test){
//            debug($test);
//        }

        $this->set('userclasses', $userclasses);
        $this->set('_serialize', ['userclasses']);
    }


}

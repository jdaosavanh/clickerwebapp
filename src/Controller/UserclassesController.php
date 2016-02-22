<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Userclasses Controller
 *
 * @property \App\Model\Table\UserclassesTable $Userclasses
 */
class UserclassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userclasses = $this->paginate($this->Userclasses);

        $this->set(compact('userclasses'));
        $this->set('_serialize', ['userclasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Userclass id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userclass = $this->Userclasses->get($id, [
            'contain' => ['Users', 'Questions']
        ]);

        $this->set('userclass', $userclass);
        $this->set('_serialize', ['userclass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userclass = $this->Userclasses->newEntity();
        if ($this->request->is('post')) {
            $userclass = $this->Userclasses->patchEntity($userclass, $this->request->data);
            if ($this->Userclasses->save($userclass)) {
                $this->Flash->success(__('The userclass has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The userclass could not be saved. Please, try again.'));
            }
        }
        $users = $this->Userclasses->Users->find('list', ['limit' => 200]);
        $this->set(compact('userclass', 'users'));
        $this->set('_serialize', ['userclass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Userclass id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userclass = $this->Userclasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userclass = $this->Userclasses->patchEntity($userclass, $this->request->data);
            if ($this->Userclasses->save($userclass)) {
                $this->Flash->success(__('The userclass has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The userclass could not be saved. Please, try again.'));
            }
        }
        $users = $this->Userclasses->Users->find('list', ['limit' => 200]);
        $this->set(compact('userclass', 'users'));
        $this->set('_serialize', ['userclass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Userclass id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userclass = $this->Userclasses->get($id);
        if ($this->Userclasses->delete($userclass)) {
            $this->Flash->success(__('The userclass has been deleted.'));
        } else {
            $this->Flash->error(__('The userclass could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function classes($id = null){

            //Getting all passed parameters
            $userclasses = $this->request->params['pass'];

            //Get all classes that have this user id



            //get all classes
//        $classes = $this->Userclasses->find('userclasses',[
//            'classes'
//        ]);
//        // Pass into view
//        $this->set([
//            'classes' =>$classes,
//        ]);

    }

}

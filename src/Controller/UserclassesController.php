<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Userclasses Controller
 *
 * @property \App\Model\Table\UserclassesTable $Userclasses
 */
class UserclassesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['classquestions']);
    }
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
            $this->request->data['user_id'] = $this->Auth->user('id');
            $userclass = $this->Userclasses->patchEntity($userclass, $this->request->data);
            if ($this->Userclasses->save($userclass)) {
                $this->Flash->success(__('The userclass has been saved.'));
                return $this->redirect(['controller' => 'users','action' => $user = $this->Auth->user('id')]);
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

    public function questions($id = null)
    {

        //Getting all passed parameters
        $userclasses = $this->request->params['pass'];

        //Get all questions that have this user calss id
        $questions = TableRegistry::get('Questions');
//            debug($questions);

        $questions = $questions->find()->where(['userclass_id' => $id]);

        //get answers for questions
        $allanswers = TableRegistry::get('Answers');
        $answers = array();
        foreach ($questions as $question) {
                array_push($answers,$allanswers->find()->where(['question_id' => $question['id']]));
         }
//         debug($answers[0]);
//        foreach($answers[0] as $test){
//            debug($test);
//        }
//            foreach($questions as $question){
//                debug($question);
//             }
        $this->set('questions', $questions);
        $this->set('_serialize', ['questions']);

        $this->set('answers', $answers);
        $this->set('_serialize', ['answers']);

        $user = $this->Auth->user('id');
        $this->set('user_id', $user);
        $this->set('_serialize', ['user_id']);
//        Doesn't matter just save the fucken class in the add question method
        $class_id = $this->Userclasses->get($id);
        $this->set('class_id', $class_id['id']);
        $this->set('_serialize', ['class_id']);


    }

    public function classquestions($id = null)
    {

        //Getting all passed parameters
        $userclasses = $this->request->params['pass'];

        //Get all questions that have this user calss id
        $questions = TableRegistry::get('Questions');

        $questions = $questions->find()->where(['userclass_id' => $id]);

        //get answers for questions
        $allanswers = TableRegistry::get('Answers');
        $answers = array();
        foreach ($questions as $question) {
            array_push($answers,$allanswers->find()->where(['question_id' => $question['id']]));
        }
        $this->set('questions', $questions);
        $this->set('_serialize', ['questions']);

        $this->set('answers', $answers);
        $this->set('_serialize', ['answers']);

        $user = $this->Auth->user('id');
        $this->set('user_id', $user);
        $this->set('_serialize', ['user_id']);

//      Doesn't matter just save the fucken class in the add question method
        $class_id = $this->Userclasses->get($id);
        $this->set('class_id', $class_id['id']);
        $this->set('_serialize', ['class_id']);


    }

}

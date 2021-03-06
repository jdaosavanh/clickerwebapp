<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Answeredquestions Controller
 *
 * @property \App\Model\Table\AnsweredquestionsTable $Answeredquestions */
class AnsweredquestionsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add']);
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions']
        ];
        $answeredquestions = $this->paginate($this->Answeredquestions);

        $this->set(compact('answeredquestions'));
        $this->set('_serialize', ['answeredquestions']);
    }

    /**
     * View method
     *
     * @param string|null $id Answeredquestion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answeredquestion = $this->Answeredquestions->get($id, [
            'contain' => ['Questions']
        ]);

        $this->set('answeredquestion', $answeredquestion);
        $this->set('_serialize', ['answeredquestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $id2 = null)
    {
        $answeredquestion = $this->Answeredquestions->newEntity();
        if ($this->request->is('post') && !$this->request->is('ajax')) {
            $this->request->data['question_id'] = $id;
            $answeredquestion = $this->Answeredquestions->patchEntity($answeredquestion, $this->request->data);
            if ($this->Answeredquestions->save($answeredquestion)) {
                $this->Flash->success(__("You're answer has been save."));
                return $this->redirect(['controller' => 'userclasses','action' => 'classquestions',$id2]);
            } else {
                $this->Flash->error(__('The answeredquestion could not be saved. Please, try again.'));
            }
        }
        if($this->request->is('ajax')){
            $this->response->disableCache();
            $this->autoRender = false;

            $answeredquestion->student = $this->request->data('student');
            $answeredquestion->answertoquestion = $this->request->data('answertoquestion');
            $answeredquestion->question_id= $this->request->data('question_id');
            if ($this->Answeredquestions->save($answeredquestion)) {

            }


        }
        $questions = $this->Answeredquestions->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answeredquestion', 'questions'));
        $this->set('_serialize', ['answeredquestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answeredquestion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answeredquestion = $this->Answeredquestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answeredquestion = $this->Answeredquestions->patchEntity($answeredquestion, $this->request->data);
            if ($this->Answeredquestions->save($answeredquestion)) {
                $this->Flash->success(__('The answeredquestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The answeredquestion could not be saved. Please, try again.'));
            }
        }
        $questions = $this->Answeredquestions->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answeredquestion', 'questions'));
        $this->set('_serialize', ['answeredquestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answeredquestion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answeredquestion = $this->Answeredquestions->get($id);
        if ($this->Answeredquestions->delete($answeredquestion)) {
            $this->Flash->success(__('The answeredquestion has been deleted.'));
        } else {
            $this->Flash->error(__('The answeredquestion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function answers($id = null)
    {


        $answers = $this->Answeredquestions->find()->where(['question_id' =>$id]);

        $this->set('answers', $answers);
        $this->set('_serialize', ['answers']);


    }

}

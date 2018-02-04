<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cds Controller
 *
 * @property \App\Model\Table\CdsTable $Cds
 *
 * @method \App\Model\Entity\Cd[] paginate($object = null, array $settings = [])
 */
class CdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Compositor', 'Interpreter']
        ];
        $cds = $this->paginate($this->Cds);

        $this->set(compact('cds'));
        $this->set('_serialize', ['cds']);
    }

    /**
     * View method
     *
     * @param string|null $id Cd id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cd = $this->Cds->get($id, [
            'contain' => ['Compositor', 'Interpreter']
        ]);

        $this->set('cd', $cd);
        $this->set('_serialize', ['cd']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cd = $this->Cds->newEntity();
        if ($this->request->is('post')) {
            $cd = $this->Cds->patchEntity($cd, $this->request->getData());
            if ($this->Cds->save($cd)) {
                $this->Flash->success(__('The cd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cd could not be saved. Please, try again.'));
        }
        $compositor = $this->Cds->Compositor->find('list',[
			'valueField' => ['first_name','last_name'],
			'limit' => 200]);
        $interpreter = $this->Cds->Interpreter->find('list', [
			'valueField' => ['first_name','last_name'],
        	'limit' => 200]);
		$style = $this->Cds->Styles->find('list', [
			'limit' => 200]);
		$collection = $this->Cds->Collections->find('list', [
			'limit' => 200]);
        $this->set(compact('cd', 'compositor', 'interpreter', 'style', 'collection'));
        $this->set('_serialize', ['cd']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cd id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cd = $this->Cds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cd = $this->Cds->patchEntity($cd, $this->request->getData());
            if ($this->Cds->save($cd)) {
                $this->Flash->success(__('The cd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cd could not be saved. Please, try again.'));
        }
        $compositor = $this->Cds->Compositor->find('list', ['limit' => 200]);
        $interpreter = $this->Cds->Interpreter->find('list', ['limit' => 200]);
        $this->set(compact('cd', 'compositor', 'interpreter'));
        $this->set('_serialize', ['cd']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cd = $this->Cds->get($id);
        if ($this->Cds->delete($cd)) {
            $this->Flash->success(__('The cd has been deleted.'));
        } else {
            $this->Flash->error(__('The cd could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

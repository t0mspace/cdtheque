<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Styles Controller
 *
 * @property \App\Model\Table\StylesTable $Styles
 *
 * @method \App\Model\Entity\Style[] paginate($object = null, array $settings = [])
 */
class StylesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $styles = $this->paginate($this->Styles);

        $this->set(compact('styles'));
        $this->set('_serialize', ['styles']);
    }

    /**
     * View method
     *
     * @param string|null $id Style id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $style = $this->Styles->get($id, [
            'contain' => ['Cds']
        ]);

        $this->set('style', $style);
        $this->set('_serialize', ['style']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $style = $this->Styles->newEntity();
        if ($this->request->is('post')) {
            $style = $this->Styles->patchEntity($style, $this->request->getData());
            if ($this->Styles->save($style)) {
                $this->Flash->success(__('The style has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The style could not be saved. Please, try again.'));
        }
        $this->set(compact('style'));
        $this->set('_serialize', ['style']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Style id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $style = $this->Styles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $style = $this->Styles->patchEntity($style, $this->request->getData());
            if ($this->Styles->save($style)) {
                $this->Flash->success(__('The style has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The style could not be saved. Please, try again.'));
        }
        $this->set(compact('style'));
        $this->set('_serialize', ['style']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Style id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $style = $this->Styles->get($id);
        if ($this->Styles->delete($style)) {
            $this->Flash->success(__('The style has been deleted.'));
        } else {
            $this->Flash->error(__('The style could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

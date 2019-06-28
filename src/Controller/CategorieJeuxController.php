<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategorieJeux Controller
 *
 * @property \App\Model\Table\CategorieJeuxTable $CategorieJeux
 *
 * @method \App\Model\Entity\CategorieJeux[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategorieJeuxController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categorieJeux = $this->paginate($this->CategorieJeux);

        $this->set(compact('categorieJeux'));
    }

    /**
     * View method
     *
     * @param string|null $id Categorie Jeux id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorieJeux = $this->CategorieJeux->get($id, [
            'contain' => []
        ]);

        $this->set('categorieJeux', $categorieJeux);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categorieJeux = $this->CategorieJeux->newEntity();
        if ($this->request->is('post')) {
            $categorieJeux = $this->CategorieJeux->patchEntity($categorieJeux, $this->request->getData());
            if ($this->CategorieJeux->save($categorieJeux)) {
                $this->Flash->success(__('The categorie jeux has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorie jeux could not be saved. Please, try again.'));
        }
        $this->set(compact('categorieJeux'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorie Jeux id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categorieJeux = $this->CategorieJeux->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorieJeux = $this->CategorieJeux->patchEntity($categorieJeux, $this->request->getData());
            if ($this->CategorieJeux->save($categorieJeux)) {
                $this->Flash->success(__('The categorie jeux has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorie jeux could not be saved. Please, try again.'));
        }
        $this->set(compact('categorieJeux'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorie Jeux id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorieJeux = $this->CategorieJeux->get($id);
        if ($this->CategorieJeux->delete($categorieJeux)) {
            $this->Flash->success(__('The categorie jeux has been deleted.'));
        } else {
            $this->Flash->error(__('The categorie jeux could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

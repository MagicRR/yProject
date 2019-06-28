<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\I18n\Date;

/**
 * Jeux Controller
 *
 * @property \App\Model\Table\JeuxTable $Jeux
 *
 * @method \App\Model\Entity\Jeux[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JeuxController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->loadModel('CategorieJeux');
        $categories = $this->paginate($this->CategorieJeux);

        $arrayCategories = array();

        foreach($categories as $categorie)
            array_push($arrayCategories, $categorie['libelle']);

        $this->set('categories', $arrayCategories);

        $jeux = $this->Jeux->newEntity();
        if ($this->request->is('post')) {

            // Modification de la data reçue pour que la date passe en array
            $data = $this->request->getData();

            $date = explode("-", $this->request->getData('date_de_sortie'));
            $jour = substr($date[2], 0, 2);
            $arrayDate = array(
                'year' => $date[0],
                'month' => $date[1],
                'day' => $jour,
            );

            unset($data['categories']);
            $categoriePlus = $this->request->getData('categories');
            $categoriePlus++;
            $data['categorie']      = $categoriePlus;
            $data['date_de_sortie'] = $arrayDate;
            $jeux = $this->Jeux->patchEntity($jeux, $data);

            // Divers tests pour empêcher l'insertion à vide
            if(empty($jeux->titre))
            {
                $this->Flash->error(__('Veuillez rentrer un titre de jeu.'));
                return $this->redirect(['jeux' => 'index']);
            }
            if(empty($jeux->categorie))
            {
                $this->Flash->error(__('Veuillez rentrer une catégorie de jeu.'));
                return $this->redirect(['jeux' => 'index']);
            }

            if(!empty($jeux->titre) && !empty($jeux->categorie))
            {
                $this->Jeux->save($jeux);
                $this->Flash->success(__('Le jeu a été enregistré.'));
                return $this->redirect(['jeux' => 'index']);
            }

            $this->Flash->error(__('Erreur de sauvegarde du jeu.'));
        }
        $this->set(compact('jeux'));

        // Jointure de l'espace !
        $tousLesJeux = $this->Jeux
                ->find()
                ->select(['jeux.id','jeux.titre','jeux.date_de_sortie','jeux.categorie','cj.libelle','cj.id'])
                ->where(['jeux.id !=' => 0])
                ->join([
                'table' => 'categorie_jeux',
                'alias' => 'cj',
                'type' => 'LEFT',
                'conditions' => 'cj.id = jeux.categorie',
                ])
                ->all();


        foreach ($tousLesJeux as $unJeu) {
            $dateTemp = new Date($unJeu['jeux']['date_de_sortie']);
            $unJeu['jeux']['date_de_sortie'] = $dateTemp->format('d / m / Y');
        }
        $this->set(compact('tousLesJeux'));

        $this->viewBuilder()->setLayout('neonDefault');
    }

    /**
     * View method
     *
     * @param string|null $id Jeux id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jeux = $this->Jeux->get($id, [
            'contain' => []
        ]);

        $this->set('jeux', $jeux);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jeux id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jeux = $this->Jeux->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jeux = $this->Jeux->patchEntity($jeux, $this->request->getData());
            if ($this->Jeux->save($jeux)) {
                $this->Flash->success(__('The jeux has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jeux could not be saved. Please, try again.'));
        }
        $this->set(compact('jeux'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Jeux id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jeux = $this->Jeux->get($id);
        if ($this->Jeux->delete($jeux)) {
            $this->Flash->success(__('The jeux has been deleted.'));
        } else {
            $this->Flash->error(__('The jeux could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

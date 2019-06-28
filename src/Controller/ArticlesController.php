<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\I18n\Time;
use Cake\Event\Event;

class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

    }

    // public function beforeFilter(Event $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Auth->deny(); // deny all actions
    // }

    public function index()
    {
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }

    public function view($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        if($this->Auth->identify())
        {
            $article = $this->Articles->newEntity();
            if ($this->request->is('post')) {

                $article = $this->Articles->patchEntity($article, $this->request->getData());

                // Hardcoding the user_id is temporary, and will be removed later
                // when we build authentication out.

                $article->user_id = 1;
                $article->published = 1;
                $article->slug = $article->title;
                $article->created = Time::now();
                $article->modified =  Time::now();


                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Votre article a été sauvegardé.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Impossible d\'ajouter votre article.'));
            }
            $this->set('article', $article);
        }
        else
        {
            $this->Flash->error(__('Connectez vous !'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function edit($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Votre article a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour l\'article.'));
        }

        $this->set('article', $article);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('L\'article {0} a été supprimé.', $article->title));
            return $this->redirect(['action' => 'index']);
        }
    }

}

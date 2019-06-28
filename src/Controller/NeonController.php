<?php
// src/Controller/NeonController.php

namespace App\Controller;
use Cake\I18n\Time;
use Cake\Event\Event;

class NeonController extends AppController
{
    public function index()
    {
        // $this->viewBuilder()->autoLayout(false);
        $this->viewBuilder()->setLayout('neonDefault');
    }

}

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jeux $jeux
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Jeux'), ['action' => 'edit', $jeux->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Jeux'), ['action' => 'delete', $jeux->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jeux->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jeux'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jeux'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jeux view large-9 medium-8 columns content">
    <h3><?= h($jeux->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($jeux->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($jeux->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorie') ?></th>
            <td><?= $this->Number->format($jeux->categorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date De Sortie') ?></th>
            <td><?= h($jeux->date_de_sortie) ?></td>
        </tr>
    </table>
</div>

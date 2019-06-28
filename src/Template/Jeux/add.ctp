<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jeux $jeux
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Jeux'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jeux form large-9 medium-8 columns content">
    <?= $this->Form->create($jeux) ?>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('categorie');
            echo $this->Form->control('date_de_sortie', ['empty' => true]);
        ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

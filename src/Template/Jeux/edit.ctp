<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jeux $jeux
 */
?>
<div class="container">
    <?= $this->Form->create($jeux, [
                        'type' => 'file'
                        ])
     ?>
    <fieldset>
        <legend><?= __('Edit Jeux') ?></legend>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('description');
            echo $this->Form->control('categorie');
            echo $this->Form->control('date_de_sortie', ['empty' => true]);
            echo $this->Form->control('url_jaquette', [
                'type' => 'file',
                'label' => false,
                'class' => 'form-control'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <br/>
    <br/>
    <br/>

    <div class="row">
        <div class="text-center">
            <?php echo "<img src='/upload/jeux/".$jeux['titre']."/".$jeux['url_jaquette']."'>"; ?>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace( 'description' );
</script>

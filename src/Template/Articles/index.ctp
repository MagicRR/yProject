<!-- Fichier : src/Template/Articles/index.ctp -->
<h1>Articles</h1>
<?= $this->Html->link('Ajouter un article', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Titre</th>
        <th>Créé le</th>
        <th>Modifier</th>
    </tr>

    <!-- C'est ici que nous bouclons sur notre objet Query $articles pour afficher les informations de chaque article -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?php
            $laDate = new DateTime($article->created->format(DATE_RFC850));
            echo $laDate->format("d - m - Y, H:i:s");
            ?>
        </td>
        <td>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $article->slug]) ?>
            -----
            <?= $this->Form->postLink(
                'Supprimer',
                ['action' => 'delete', $article->slug],
                ['confirm' => 'Êtes-vous sûr ?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

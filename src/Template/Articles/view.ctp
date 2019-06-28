<!-- Fichier : src/Template/Articles/view.ctp -->

<h1><?php echo $article->title; ?></h1>
<p><?= h($article->body) ?></p>
<?php

$laDate = new DateTime($article->created->format(DATE_RFC850));
echo $laDate->format("d - m - Y, H:i:s");
?>
<p><?= $this->Html->link('Modifier', ['action' => 'edit', $article->slug]) ?></p>

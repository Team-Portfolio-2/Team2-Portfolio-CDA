<?php
foreach ($tags as $tag) : ?>
    <article>
        <h2><?= $tag->getName() ?></h2>
        <span><?= $tag->getCompany() ?></span>
        <p><?= nl2br($tag->getDescription()) ?></p>
        <a href="<?= sprintf('/tag/%d/show', $tag->getId()) ?>">Voir le détail du projet</a>
    </article>
<?php
endforeach;
?>
<?php
foreach ($eductions as $education) : ?>
    <article>
        <h2><?= $education->getName() ?></h2>
        <span><?= $education->getCompany() ?></span>
        <p><?= nl2br($education->getDescription()) ?></p>
        <a href="<?= sprintf('/education/%d/show', $education->getId()) ?>">Voir le détail du projet</a>
    </article>
<?php
endforeach;
?>
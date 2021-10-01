<?php
foreach ($tasks as $task) : ?>
    <article>
        <h2><?= $task->getName() ?></h2>
        <span><?= $task->getCompany() ?></span>
        <p><?= nl2br($task->getDescription()) ?></p>
        <a href="<?= sprintf('/project/%d/show', $task->getId()) ?>">Voir le détail du projet</a>
    </article>
<?php
endforeach;
?>
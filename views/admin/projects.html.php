<?php



foreach ($projects as $project) : ?>
    <article>
        <h2><?= $project->getName() ?></h2>
        <span><?= $project->getCompany() ?></span>
        <p><?= nl2br($project->getDescription()) ?></p>
        <a href="<?= sprintf('/project/%d/show', $project->getId()) ?>">Voir le détail du projet</a>
    </article>
<?php

endforeach;
?>

<!-- 
getId 
getName;
getCompany;
getLogoCompany;
getDescription;
getWebsite;
getStart;
getEnd; 
-->
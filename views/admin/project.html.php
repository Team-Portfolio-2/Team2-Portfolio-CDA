

<article>
    <h2><?= $project->getTitle() ?></h2>
    <span><?= $project->getCreatedAt() ?></span>
    <p><?= nl2br($project->getContent()) ?></p>
    <a href="<?= sprintf('/admin/project/%d/edit', $project->getId()) ?>">Editer l'article</a>
    <a href="<?= sprintf('/admin/project/%d/delete', $article->getId()) ?>">Supprimer l'article</a>
</article>


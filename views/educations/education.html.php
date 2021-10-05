<?php

foreach ($educations as $education) : ?>
    <article>
        <h2><?= $education->getTitle() ?></h2>
        <span><?= $education->getSchool() ?></span>
        <span><?= $education->getYear() ?></span>
        <p><?= nl2br($education->getDescription()) ?></p>
    </article>
<?php

endforeach;
?>
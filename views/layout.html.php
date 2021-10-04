<!--
    mon corps html, head, body
    header, nav, footer
    
    Afficher le contenu (index.html.php)
-->
<?php
require TEMPLATES . DIRECTORY_SEPARATOR . "header.html.php";
?>
   
<?= $content; ?>

<?php
require TEMPLATES . DIRECTORY_SEPARATOR . "footer.html.php";
?>

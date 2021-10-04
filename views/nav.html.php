<nav>
    <a href="/">Accueil</a>
    <a href="/projects">Projets</a>
    <a href="/educations">Educations</a>
    <a href="/contact">Contact</a>
    <?php if (isset($_SESSION['admin'])) {
        echo '(', "Connecté en tant qu'admin : ", $_SESSION['admin']['first_name'], ' ',  $_SESSION['admin']['last_name'], " ", "<a href='/logout'>Log Out</a>", ')';
    } ?>
</nav>
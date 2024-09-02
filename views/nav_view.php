<?php
ob_start();
?>
<!-- Contenu de la page -->
<a href="index.php"></a>

<header>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="index.php"><img src="././public/image/Nav_Logo.png" alt="Apprendre le dessin en ligne avec SKRITO"></a>
        </div>
        <ul class="navbar-buttons">
            <a href="index.php?action=logIn" class="button-connexion">Inscription</a>
            <a href="index.php?action=auth" class="button-auth">connexion</a>
        </ul>
    </nav>
</header>
</body>

<?php
$content = ob_get_clean();
require('Template_view.php');
?>
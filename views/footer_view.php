<?php
ob_start();
?>

<footer class="SkritoFooter">
    <a href="index.php" class="footer-logo">
        <img src="./public/image/Footer_Logo.png" alt="Apprendre le dessin en ligne avec SKRITO">
    </a>
    <div class="footerMainBox">
        <div class="Box" id="firstBox">
            <h3 class="footerBoxTitle">Information de Contact</h3>
            <a href="index.php?action=contact">Mes coordonnées</a>
        </div>
        <div class="Box" id="secondBox">
            <h3 class="footerBoxTitle">Liens Utiles</h3>
            <a href="index.php?action=usefulLinksConfidential">Politiques de confidentialité</a>
            <a href="index.php?action=usefulLinksTerms">Conditions d'utilisation</a>
        </div>
        <div class="Box" id="thirdBox">
            <h3 class="footerBoxTitle">A propos de SKRITO</h3>
            <a href="index.php?action=aboutSite">Présentation du site</a>
            <a href="index.php?action=wireframe">Carte du site</a>
        </div>
    </div>
    <div class="LastBox">
        <p class="author">PAUNER Even Greta Arles 2024</p>
        <p class="confidentialityAbout">Ce site/web est créé dans le cadre d'un projet de stage et n'est pas une entreprise enregistrée. Les informations présentées ici sont à titre informatif.</p>
    </div>
</footer>

<?php
$content = ob_get_clean();
require('Template_view.php');
?>
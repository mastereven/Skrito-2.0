<?php
ob_start();
?>

<!-- Contenu de la page -->

<body id="landingPage">
        <div class="landingMainContainers">
                <div class="LandingInsideMainContainer">
                        <div class="textSection">
                                <h1 class="titleContainers">
                                        <span class="blueText">Bienvenue</span> sur <span class="redText">SKRITO</span>
                                </h1>
                                <p class="textContainers">
                                        Découvre ici des tutoriels variés et enrichis tes compétences.<br>
                                        Deviens un <span class="blueText">SKRITTER</span> et partage tes talents gratuitement, grâce à un outil de création unique.
                                </p>
                                <div class="buttonSection">
                                        <button id="authentificationButton">S'INSCRIRE</button>
                                        <button id="connexionButton">J'ai déjà un compte</button>
                                </div>
                        </div>

                </div>
                <div class="LandingInsideSecondContainer">

                        <div class="secondSection">
                                <img src="public/image/landing_page_secondDivBox_background.png" alt="Apprendre le dessin en ligne">
                                <div class="onlytexttitle">
                                        <h1 class="titleSecondContainers">
                                                <span class="blueText">Rejoins </span><span class="redText">nous !</span>
                                        </h1>
                                        <p class="textSecondContainers">
                                                Grâce à <span class="RedText">l'outil de création de tutoriels </span>
                                                <span class="blueText">SKRITO</span>, tu<br> peux <span class="blueText">mettre en ligne tes projets </span>et permettre aux <br>autres utilisateurs <span class="RedText">d'adopter ton style.</span>
                                        </p>
                                </div>

                        </div>
                </div>
        </div>
</body>

<?php
$content = ob_get_clean();
require('Template_view.php');
?>
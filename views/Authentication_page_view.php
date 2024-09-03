<?php
ob_start();
?>

<main class="formAuthSkritter">
    <div class="logoContainer">
        <img src="public/image/Footer_logo.png" alt="Apprendre le dessin en ligne avec SKRITO">
        <h1>Inscription</h1>
        <a href="index.php?action=logIn">J'ai déjà un compte</a>
    </div>
    <form action="index.php?action=newSkritter" method="POST" class="formAuth">
        <label for="nom">Nom :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="firstName" name="firstName" required><br><br>

        <label for="mail">Email :</label>
        <input type="mail" id="mail" name="mail" required><br><br>

        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Vérification du mot de passe :</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>
</main>





<?php
$content = ob_get_clean();
require('Template_view.php');
?>
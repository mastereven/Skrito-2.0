<?php

ob_start();
$mail = $mail ?? '';
$password = $password ?? '';
$errorsHandling = $errorsHandling ?? [];
?>

<main class="container">
    <div class="logoContainer">
        <a href="index.php?action=Landing">
            <img src="public/image/Conn_logo.png" alt="Skrito plateforme communautaire de dessin" class="logo">
        </a>
        <h1 id="connTitle">Connexion</h1>
        <a href="index.php?action=register">Je n'ai pas encore de compte</a>
    </div>
    <form action="index.php?action=logInSend" method="POST" class="conForm">

        <!-- Email -->
        <div class="connInput">
            <label for="mail" class="<?= Validator::getErrorClass('mail', $errorsHandling) ?>">
                Email :
                <?= Validator::displayError('mail', $errorsHandling) ?>
            </label>
            <input type="email" name="mail" id="mail" class="<?= Validator::getErrorClass('mail', $errorsHandling) ?>" value="<?= htmlspecialchars($mail) ?>" required>
        </div>

        <!-- Password -->
        <div class="connInput">
            <label for="password" class="<?= Validator::getErrorClass('password', $errorsHandling) ?>">
                Mot de passe :
                <?= Validator::displayError('password', $errorsHandling) ?>
            </label>
            <div class="password-container-fa-eye">
                <input type="password" name="password" id="password" class="<?= Validator::getErrorClass('password', $errorsHandling) ?>" value="<?= htmlspecialchars($password) ?>" required>
                <button type="button" class="toggle-visibility" onclick="togglePasswordVisibility()">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>

        <button type="submit">Se connecter</button>
    </form>
</main>
<?php
$content = ob_get_clean();
require('Template_view.php');
?>
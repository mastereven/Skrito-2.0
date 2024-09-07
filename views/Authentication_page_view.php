<?php

ob_start();
$first_name = $first_name ?? '';
$last_name = $last_name ?? '';
$mail = $mail ?? '';
$password = $password ?? '';
$pseudo = $pseudo ?? '';
$confirm_password = $confirm_password ?? '';
$errorsHandling = $errorsHandling ?? [];
?>

<main class="formAuthSkritter">
    <div class="logoContainer">
        <a href="index.php?action=Landing">
            <img src="public/image/Conn_logo.png" alt="Skrito plateforme communautaire de dessin" class="logo">
        </a>
        <h1>Inscription</h1>
        <a href="index.php?action=logIn">J'ai déjà un compte</a>
    </div>
    <form action="index.php?action=registerSend" method="POST" class="formAuth">

        <!-- Last Name -->
        <label for="last_name" class="<?= Validator::getErrorClass('last_name', $errorsHandling) ?>">
            Nom :
            <?= Validator::displayError('last_name', $errorsHandling) ?>
        </label>
        <input type="text" name="last_name" id="last_name" class="<?= Validator::getErrorClass('last_name', $errorsHandling) ?>" value="<?= htmlspecialchars($last_name) ?>" required><br><br>

        <!-- First Name -->
        <label for="first_name" class="<?= Validator::getErrorClass('first_name', $errorsHandling) ?>">
            Prénom :
            <?= Validator::displayError('first_name', $errorsHandling) ?>
        </label>
        <input type="text" name="first_name" id="first_name" class="<?= Validator::getErrorClass('first_name', $errorsHandling) ?>" value="<?= htmlspecialchars($first_name) ?>" required><br><br>

        <!-- Mail -->
        <label for="mail" class="<?= Validator::getErrorClass('mail', $errorsHandling) ?>">
            Email :
            <?= Validator::displayError('mail', $errorsHandling) ?>
        </label>
        <input type="email" name="mail" id="mail" class="<?= Validator::getErrorClass('mail', $errorsHandling) ?>" value="<?= htmlspecialchars($mail) ?>" required><br><br>

        <!-- Pseudo -->
        <label for="pseudo" class="<?= Validator::getErrorClass('pseudo', $errorsHandling) ?>">
            Pseudo :
            <?= Validator::displayError('pseudo', $errorsHandling) ?>
        </label>
        <input type="text" name="pseudo" id="pseudo" class="<?= Validator::getErrorClass('pseudo', $errorsHandling) ?>" value="<?= htmlspecialchars($pseudo) ?>" required><br><br>

        <!-- Password -->
        <div class="password-container">
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

        <!-- Confirm Password -->
        <div class="password-container">
            <label for="confirm_password" class="<?= Validator::getErrorClass('confirm_password', $errorsHandling) ?>">
                Confirmer le mot de passe :
                <?= Validator::displayError('confirm_password', $errorsHandling) ?>
            </label>
            <div class="password-container-fa-eye">
                <input type="password" name="confirm_password" id="confirm_password" class="<?= Validator::getErrorClass('confirm_password', $errorsHandling) ?>" value="<?= htmlspecialchars($confirm_password) ?>" required>
                <button type="button" class="toggle-visibility" onclick="toggleConfirmPasswordVisibility()">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div><br><br>
        <input type="submit" value="S'inscrire">
    </form>
</main>
<?php
$content = ob_get_clean();
require('Template_view.php');
?>
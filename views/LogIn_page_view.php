<?php
ob_start();
?>
<div class="container">
    <a href="index.php?action=Landing">
        <img src="public/image/Conn_logo.png" alt="Skrito plateforme communautaire de dessin" class="logo">
    </a>
    <h1 id="connTitle">Rebonjour Skritter !</h1>

    <div class="conForm">
        <p>
            <a href="index.php?action=register">Je n'ai pas de compte</a>
        </p>
        <form action="index.php?action=logInSend" method="post" class="conFormArea">
            <div class="connInput">
                <label for="email">Mail :</label>
                <input type="email" id="email" name="email" required autocomplete="email">
            </div>
            <div class="connInput">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require('Template_view.php');
?>
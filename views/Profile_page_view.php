<?php

ob_start();
?>

<main class="formAuthSkritter">
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-image">
                <img src="https://via.placeholder.com/100" alt="Photo de profil">
                <a href="#" class="edit-profile">modifier image de profil</a>
            </div>
            <h1 class="username">Skritter</h1>
            <p class="user-info">Nom</p>
            <p class="user-info">Prénom</p>
            <p class="user-email"><a href="mailto:useremail@skrito.test">useremail@skrito.test</a></p>
            <button class="edit-info-btn">Modifier mes informations</button>
            <button class="publish-tuto-btn">Publier un tuto</button>
        </div>
    </div>
</main>
<?php
$content = ob_get_clean();
require('Template_view.php');
?>
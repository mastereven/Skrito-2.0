<?php
ob_start();
?>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php?action=Landing"><img src="././public/image/Nav_Logo.png" alt="Apprendre le dessin en ligne avec SKRITO"></a>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Rechercher" />
            <button type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="nav-links">
            <a href="#" class="publish-btn">Publier</a>
            <div class="profile">
                <img src="path_to_profile_icon" alt="Profil">
                <a href="#">Profil</a>
            </div>
        </div>
    </nav>
</header>

<?php
$content = ob_get_clean();
require('Template_view.php');
?>
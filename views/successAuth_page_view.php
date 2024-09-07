<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification Réussie</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="message">
            <h1>Authentification réussie !</h1>
            <p>Vos données sont en transit. Vous allez être redirigé vers la page de connexion.</p>
            <div class="loading-container">
                <div class="loading-bar"></div>
            </div>
            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>

<?php
$content = ob_get_clean();
require('Template_view.php');
?>
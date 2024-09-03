<?php

function skrittersAuthInPage($errorMessage = '')
{
    $title = 'SKRITO - Inscription';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public/css/formatPage.css', 'public/css/formAuthStyle.css'];
    $jsFiles = [];

    require_once 'views/Authentication_page_view.php';
}

function skritoGetPost()
{
    require_once 'models/Skrito_db_Model.php';
    require_once 'models/Skritter_models.php';

    // Récupération des données propres
    $cleanData = skritoGetCleanPost();
    var_dump($cleanData); // Debug : Affiche les données nettoyées

    try {
        skritoInsertPost($cleanData);
        skritoSuccessRedirect();
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        var_dump($errorMessage); // Debug : Affiche le message d'erreur si une exception est levée lors de l'insertion
        skrittersAuthInPage($errorMessage);
    }

    try {
        skritoVerifMail($cleanData['email']);
        var_dump($cleanData['email']); // Debug : Affiche l'email utilisé pour la vérification
        var_dump($result); // Debug : Affiche le résultat de la vérification de l'email (variable $result doit être définie dans skritoVerifEmail)
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        var_dump($errorMessage); // Debug : Affiche le message d'erreur si une exception est levée lors de la vérification de l'email
        skrittersAuthInPage($errorMessage);
    }
}


function skritoSuccessRedirect()
{
    header('Location: index.php?action=successSkritter');
    exit();
}

function skritoSuccessPage()
{
    $title = 'SKRITO - Inscription réussie';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public/css/formatPage.css', 'public/css/AuthStyle.css'];
    $jsFiles = [];

    require_once 'views/success_page_view.php';
}

function skrittersLogInPage()
{
    $title = 'SKRITO - Connexion';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public/css/formatPage.css', 'public/css/formConnStyle.css'];
    $jsFiles = [];

    require_once 'views/LogIn_page_view.php';
}

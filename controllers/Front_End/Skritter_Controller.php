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

    $cleanData = skritoGetCleanPost();

    try {
        skritoInsertPost($cleanData);
        skritoSuccessRedirect();
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        skrittersAuthInPage($errorMessage);
    }
}

function skritoSuccessRedirect()
{
    header('Location: success_page.php');
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

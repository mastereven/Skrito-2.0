<?php
function skrittersLogInPage()
{
    // function to display the login page
    $title = 'SKRITO - Connexion';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public\css\formatPage.css', 'public\css\formConnStyle.css'];
    $jsFiles = [''];
    require_once 'views/LogIn_page_view.php';
}

function skrittersAuthInPage()
{ // function to display the authentication page
    $title = 'SKRITO - Inscription';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public\css\formatPage.css', 'public\css\formAuthStyle.css'];
    $jsFiles = [''];
    require_once 'views/Authentication_page_view.php';
}

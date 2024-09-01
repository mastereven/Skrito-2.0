<?php
function skritoLanding()
{ // function to display the landing page
    $title = 'SKRITO';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public\css\formatPage.css', 'public\css\landingStyle.css'];
    $jsFiles = ['script.js', 'functions.js'];
    require_once 'views/Landing_page_view.php';
}
function skrittersLogInPage()
{
    // function to display the login page
    $title = 'SKRITO - Connexion';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public\css\formatPage.css', 'public\css\landingStyle.css'];
    $jsFiles = ['script.js', 'functions.js'];
    require_once 'views/LogIn_page_view.php';
}

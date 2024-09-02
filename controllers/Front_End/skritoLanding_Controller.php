<?php
function skritoLanding()
{ // function to display the landing page
    $title = 'SKRITO';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public\css\formatPage.css', 'public\css\navStyle.css', 'public\css\landingStyle.css', 'public\css\footerStyle.css'];
    $jsFiles = [''];
    require_once 'views/nav_view.php';
    require_once 'views/Landing_page_view.php';
    require_once 'views/footer_view.php';
}

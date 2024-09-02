<?php

require_once 'models/Front_End/Skritter_model.php';


function skrittersAuthInPage()
{ // function to display the authentication page
    skrittersAuth();
    $title = 'SKRITO - Inscription';
    $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
    $cssFiles = ['public\css\formatPage.css', 'public\css\formAuthStyle.css'];
    $jsFiles = [''];
    require_once 'views/Authentication_page_view.php';
}

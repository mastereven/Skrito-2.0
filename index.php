<?php

require_once 'controllers/Front_End/skritoLanding_Controller.php';
require_once 'controllers/Front_End/Skritter_Controller.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'auth') {
        // function to display the authentication page
        skrittersAuthInPage();
    } elseif ($_GET['action'] === 'successSkritter') {
        skritoSuccessPage();
    } elseif ($_GET['action'] === 'logIn') {
        // function to display the login page
        skrittersLogInPage();
    } elseif ($_GET['action'] === 'newSkritter') {
        // function to get and insert the post data
        skritoGetPost();
    } else {
        skritoLanding();
    }
}

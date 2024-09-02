<?php

// Ensure the required file is included
require_once 'controllers/Front_End/skritoLanding_Controller.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'logIn') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            skrittersLogIn();
        } else {
            skrittersLogInPage();
        }
    }
} else {
    // Call skritoLanding() if 'action' parameter is not set
    if (function_exists('skritoLanding')) {
        skritoLanding();
    } else {
        // Handle the case where skritoLanding() is not defined
        echo "Error: skritoLanding function is not defined.";
    }
}

<?php

require_once 'controllers/Front_End/skritoLanding_Controller.php';
require_once 'controllers/Front_End/Skritter_Controller.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'auth') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['action']) && $_POST['action'] === 'newSkritter') {
                skritoGetPost();
            } else {
                skrittersAuthInPage();
            }
        } else {
            skrittersAuthInPage();
        }
    } elseif ($_GET['action'] === 'success') {
        skritoSuccessPage();
    } else {
        skritoLanding();
    }
} else {
    skritoLanding();
}

<?php
require_once 'controllers/Front_End/skritter_Controller.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'logIn') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            skrittersLogIn();
        } else {
            skrittersLogInPage();
        }
    }
} else {
    skritoLanding();
}

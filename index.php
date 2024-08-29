<?php
require_once'controller/Front_End/Controller_skrito.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'logIn') {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            skrittersLogIn();
        }else {
            skrittersLogInPage();
        }
    }
}else {
    skritoLanding();
}

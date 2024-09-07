<?php

//association de chaque action à une méthode spécifique d'un contrôleur pour la maintenabilité et facilité.



$routes = [
    'Landing' => ['Skritter_Controller', 'skritoLanding'], //display th landing page
    'register' => ['Skritter_Controller', 'showRegisterForm'], // display the registration form
    'logIn' => ['Skritter_Controller', 'showLoginForm'], // display the login form
    'searchTuto' => ['TutoController', 'searchTuto'], // display the search tutorial page
    'createTuto' => ['TutoController', 'createTuto'], // display the tutorial creation page
    'profile' => ['Skritter_Controller', 'profile'], // display the user's profile
    'modifyUser' => ['Skritter_Controller', 'modifyUser'], // display the  modify user's informations pages
    'modifyAvatar' => ['Skritter_Controller', 'modifyAvatar'], // display the modify user's avatar


    // form send

    'newProfileSend' => ['Skritter_Controller', 'newProfileSend'], // get and insert the post data for modifying the user's information
    'newAvatar' => ['Skritter_Controller', 'newAvatar'], // get and insert the post data for modifying the user's avatar
    'registerSend' => ['Skritter_Controller', 'registerSend'], // get and insert the post data for registration
    'logInSend' => ['Skritter_Controller', 'logInSend'], // get and insert the post data for login

    //validation from controller

    'newSkritterOk' => ['Skritter_Controller', 'newSkritterOk'], // display the waiting page

    // error

    'showRegisterFormError' => ['Skritter_Controller', 'showRegisterFormError'], // display the registration form with errors

];

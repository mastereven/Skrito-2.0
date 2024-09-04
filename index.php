<?php

require 'routes/routes.php';
require 'router.php';
require 'controllers/Skritter_Controller.php';
require 'controllers/Tutorial_Controller.php';

new Skritter_Controller();

$router = new Router($routes);

$router->handleRequest();

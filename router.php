<?php

class Router

{
    private $routes = []; // Tableau pour stocker les routes

    // Méthode pour charger les routes depuis un fichier
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    // Méthode pour gérer les requêtes
    public function handleRequest()
    {

        // Récupère l'action depuis l'URL, ou utilise une action par défaut
        $action = $_GET['action'] ?? 'Landing'; // 'landing' est l'action par défaut

        // Vérifie si l'action est définie dans les routes
        if (isset($this->routes[$action])) {
            $controllerName = $this->routes[$action][0];
            $methodName = $this->routes[$action][1];

            // Vérifie si la classe du contrôleur et la méthode existent
            if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                $controller = new $controllerName(); // Crée une instance du contrôleur
                $controller->$methodName(); // Appelle la méthode du contrôleur associé
            } else {
                echo "Erreur : La méthode '$methodName' n'existe pas dans le contrôleur '$controllerName'.";
            }
        } else {
            echo "Erreur : L'action '$action' n'est pas reconnue.";
        }
    }
}

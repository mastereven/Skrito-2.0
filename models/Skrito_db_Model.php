<?php
class Skrito_db_Model

{
    protected $pdo; // Changer private en protected

    public function __construct()
    {
        // Détails de connexion à la base de données
        $dsn = 'mysql:host=localhost;dbname=skrito_db;charset=utf8';
        $username = 'root';
        $password = '';

        try {
            // Création de l'objet PDO pour la connexion à la base de données
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            die('Connection failed: ' . $e->getMessage());
        }
    }
}

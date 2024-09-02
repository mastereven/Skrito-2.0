<?php

function dbConnect()
{
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = new PDO('mysql:host=' . $servername . ';dbname=skrito_db;charset=utf8', $username, $password);

        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

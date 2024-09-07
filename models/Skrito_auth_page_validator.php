<?php

class Validator
{
    // Retourne une classe d'erreur si l'erreur existe pour le champ donné
    public static function getErrorClass($field, $errorClasses)
    {
        return !empty($errorClasses[$field]) ? 'error' : '';
    }

    // Affiche un message d'erreur si l'erreur existe pour le champ donné
    public static function displayError($field, $errorClasses)
    {
        if (!empty($errorClasses[$field])) {
            return '<span class="error">' . htmlspecialchars($errorClasses[$field]) . '</span>';
        }
        return '';  // Retourne une chaîne vide s'il n'y a pas d'erreur
    }
}

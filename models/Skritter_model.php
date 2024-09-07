<?php
require_once 'models/Skrito_db_Model.php';

class Skritter_Model extends Skrito_db_Model
{
    public function SkritoSanitize($first_name, $last_name, $mail, $password, $pseudo, $confirm_password)
    {
        // Sanitization of the data
        $cleanData = [];
        $cleanData['first_name'] = htmlspecialchars($first_name, ENT_QUOTES, 'UTF-8');
        $cleanData['last_name'] = htmlspecialchars($last_name, ENT_QUOTES, 'UTF-8');
        $cleanData['mail'] = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
        $cleanData['password'] = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
        $cleanData['pseudo'] = htmlspecialchars($pseudo, ENT_QUOTES, 'UTF-8');
        $cleanData['confirm_password'] = htmlspecialchars($confirm_password, ENT_QUOTES, 'UTF-8');
        return $cleanData;
    }


    public function isEmailExists($email)
    {
        // Vérifie que $email est bien une chaîne de caractères
        if (!is_string($email)) {
            throw new InvalidArgumentException('L\'argument doit être une chaîne de caractères.');
        }

        // Préparer la requête pour vérifier si l'email existe déjà dans la base de données
        $query = $this->pdo->prepare("SELECT COUNT(*) FROM skritter WHERE mail = ?");
        $query->execute([$email]);
        $count = $query->fetchColumn();
        return $count > 0;
    }


    public function SkritoValidator($cleanData)
    {
        $errormessage = [];
        $isValid = true;

        // Validation de la correspondance des mots de passe
        if ($cleanData['password'] !== $cleanData['confirm_password']) {
            $errormessage[] = 'Les mots de passe ne correspondent pas.';
            $isValid = false;
        }

        // Vérifie si l'email existe déjà
        if ($this->isEmailExists($cleanData['mail'])) {
            $errormessage[] = 'Cet email est déjà utilisé.';
            $isValid = false;
        }

        // Validation du pseudo
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $cleanData['pseudo'])) {
            $errormessage[] = 'Pseudo invalide.';
            $isValid = false;
        }

        // Validation de l'email
        if (!filter_var($cleanData['mail'], FILTER_VALIDATE_EMAIL)) {
            $errormessage[] = 'Email invalide.';
            $isValid = false;
        }

        // Validation du mot de passe
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $cleanData['password'])) {
            $errormessage[] = 'Mot de passe invalide. Il doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et avoir une longueur minimale de 8 caractères.';
            $isValid = false;
        }

        // Validation du prénom avec des lettres et des accents
        if (!preg_match('/^[\p{L}\'-]+$/u', $cleanData['first_name'])) {
            $errormessage[] = 'Prénom invalide.';
            $isValid = false;
        }

        // Validation du nom avec des lettres et des accents
        if (!preg_match('/^[\p{L}\'-]+$/u', $cleanData['last_name'])) {
            $errormessage[] = 'Nom invalide.';
            $isValid = false;
        }

        // Validation de la longueur des champs
        if (strlen($cleanData['pseudo']) > 20) {
            $errormessage[] = 'Pseudo trop long.';
            $isValid = false;
        }
        if (strlen($cleanData['first_name']) > 20) {
            $errormessage[] = 'Prénom trop long.';
            $isValid = false;
        }
        if (strlen($cleanData['last_name']) > 20) {
            $errormessage[] = 'Nom trop long.';
            $isValid = false;
        }
        if (strlen($cleanData['mail']) > 50) {
            $errormessage[] = 'Email trop long.';
            $isValid = false;
        }

        return ['isValid' => $isValid, 'errors' => $errormessage, 'validData' => $cleanData];
    }

    public function skritoErrorHandling($errors)
    {
        $errorClasses = [
            'first_name' => '',
            'last_name' => '',
            'mail' => '',
            'pseudo' => '',
            'password' => '',
            'confirm_password' => ''
        ];

        foreach ($errors as $error) {
            if (strpos($error, 'Prénom invalide.') !== false) {
                $errorClasses['first_name'] = 'erreur prénom invalide';
            }
            if (strpos($error, 'Nom invalide.') !== false) {
                $errorClasses['last_name'] = 'erreur nom invalide';
            }
            if (strpos($error, 'Email invalide.') !== false) {
                $errorClasses['mail'] = 'erreur adresse mail au mauvais format';
            }
            if (strpos($error, 'Pseudo invalide.') !== false) {
                $errorClasses['pseudo'] = 'erreur pseudo invalide';
            }
            if (strpos($error, 'Mot de passe invalide.') !== false) {
                $errorClasses['password'] = 'erreur de passe invalide. Il doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et avoir une longueur minimale de 8 caractères.';
            }
            if (strpos($error, 'Les mots de passe ne correspondent pas.') !== false) {
                $errorClasses['confirm_password'] = 'erreur les mots de passe doivent être identiques';
            }
            if (strpos($error, 'Pseudo trop long.') !== false) {
                $errorClasses['pseudo'] = 'erreur pseudo trop long';
            }
            if (strpos($error, 'Prénom trop long.') !== false) {
                $errorClasses['first_name'] = 'erreur prénom trop long';
            }
            if (strpos($error, 'Nom trop long.') !== false) {
                $errorClasses['last_name'] = 'erreur nom trop long';
            }
            if (strpos($error, 'Email trop long.') !== false) {
                $errorClasses['mail'] = 'erreur adresse mail trop longue';
            }
        }

        return $errorClasses;
    }

    public function SkritoInsert($cleanData)
    {
        try {
            // Préparation de la requête d'insertion
            $sql = "INSERT INTO skritter (pseudo, first_name, last_name, mail, password_hash) VALUES (:pseudo, :first_name, :last_name, :mail, :password)";

            // Hachage du mot de passe avant de l'enregistrer dans la base de données
            $hashed_password = password_hash($cleanData['password'], PASSWORD_BCRYPT);

            // Préparation de la requête
            $stmt = $this->pdo->prepare($sql);

            // Liaison des paramètres avec les données nettoyées
            $stmt->bindParam(':pseudo', $cleanData['pseudo'], PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $cleanData['first_name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $cleanData['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(':mail', $cleanData['mail'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

            // Exécution de la requête
            $stmt->execute();

            return true; // Retourne true si l'insertion est réussie
        } catch (PDOException $e) {
            // Gestion des erreurs d'exécution de la requête
            die('Erreur lors de l\'insertion des données : ' . $e->getMessage());
        }
    }


    //Connexion

    public function authenticateUser($email, $password)
    {
        $query = $this->pdo->prepare("SELECT password_hash FROM skritter WHERE mail = ?");
        $query->execute([$email]);
        $storedHash = $query->fetchColumn();

        if ($storedHash && password_verify($password, $storedHash)) {
            // Authentification réussie, démarrer la session
            session_start();
            $_SESSION['user_email'] = $email;
            return true;
        }

        return false;
    }
}

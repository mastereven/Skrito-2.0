<?php
require_once 'models/Skrito_Db_model.php';
function skritoGetCleanPost()
{
    $pseudo = isset($_POST["pseudo"]) ? filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $firstName = isset($_POST["firstName"]) ? filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $name = isset($_POST["name"]) ? filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $email = isset($_POST["email"]) ? filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $passwordHash = isset($_POST["password"]) ? password_hash(filter_input(INPUT_POST, "password"), PASSWORD_DEFAULT) : '';
    $passwordverif = isset($_POST["confirm_password"]) && password_verify(filter_input(INPUT_POST, "confirm_password"), $passwordHash) ? true : false;

    $cleanData = [
        'pseudo' => $pseudo,
        'name' => $name,
        'firstName' => $firstName,
        'email' => $email,
        'passwordHash' => $passwordHash,
        'passwordverif' => $passwordverif
    ];
    return $cleanData;
}
function skritoVerifEmail($email)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT email FROM users WHERE email = :email');
    $req->execute(array(
        'email' => $email
    ));
    $result = $req->fetch();
    return $result ? true : false;
}

function skritoInsertPost($cleanData)
{
    if (!$cleanData['passwordverif']) {
        throw new Exception('Les mots de passe ne correspondent pas.');
    }

    if (skritoVerifEmail($cleanData['email'])) {
        throw new Exception('Cet email est déjà utilisé. Veuillez vous <a href="index.php?action=logIn">connecter</a>.');
    }

    $db = dbConnect();
    $req = $db->prepare('INSERT INTO users(name, firstName, email, passwordHash) VALUES(:name, :firstName, :email, :passwordHash)');
    $req->execute(array(
        'name' => $cleanData['name'],
        'firstName' => $cleanData['firstName'],
        'email' => $cleanData['email'],
        'passwordHash' => $cleanData['passwordHash']
    ));
    return $req;
}

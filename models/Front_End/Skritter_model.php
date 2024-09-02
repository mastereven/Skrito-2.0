<?php


function dbConnect(): PDO
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "skrito_db";

    $dsn = "mysql:host=$servername;dbname=$dbName;charset=utf8";
    $db = new PDO($dsn, $username, $password);

    return $db;
}



function authSkritter()
{
    $prenom = $_POST["prenom"] ?? '';
    $nom = $_POST["nom"] ?? '';
    $email = $_POST["mail"] ?? '';
    $password = password_hash($_POST["password"] ?? '', PASSWORD_DEFAULT);
    $passwordverif = isset($_POST["passwordverif"]) && password_verify($_POST["passwordverif"], $password);

    $db = dbConnect();
    $q = $db->prepare("SELECT mail FROM skritter WHERE mail=:email");
    $q->bindParam(':email', $email);
    $q->execute();
    $Verifemail = $q->fetch(PDO::FETCH_ASSOC);
    $AuthErrormode = '';

    if (empty($prenom) || empty($nom) || empty($email) || empty($password)) {
        $AuthErrormode = '4';
        return $AuthErrormode;
    } elseif (empty($email)) {
        $AuthErrormode = '1';
        return $AuthErrormode;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $AuthErrormode = '2';
        return $AuthErrormode;
    } elseif (!$passwordverif && (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $AuthErrormode = '13';
        return $AuthErrormode;
    } elseif (!$passwordverif) {
        $AuthErrormode = '3';
        return $AuthErrormode;
    }

    if ($Verifemail) {
        echo '<p>Mail déjà utilisé, veuillez vous <a href="index.php?action=login">connecter</a></p>';
    } elseif ($prenom && $nom && filter_var($email, FILTER_VALIDATE_EMAIL) && $password && $passwordverif) {
        $avatar = './assets/css/img/no_Avatar.png';
        $insertSkritter = 'INSERT INTO skritter (prenom, nom, mail, password,avatar) VALUES (:prenom, :nom, :mail, :password, :avatar)';
        $stmt = $db->prepare($insertSkritter);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':mail', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->execute();
        header('Location: index.php?action=success');
    }
}










































// function LoginSkritters()
// {
//     $email = $_POST["email"] ?? '';
//     $password = $_POST["password"] ?? '';

//     $db = dbConnect();

//     $getmail = "SELECT * FROM skritter WHERE mail=:mail;";
//     $query = $db->prepare($getmail);
//     $query->bindParam(":mail", $email);
//     $query->execute();
//     $verifUser = $query->fetch(PDO::FETCH_ASSOC);

//     if (!$verifUser) {
//         $logInErrormode = '4';
//         return $logInErrormode;
//     } elseif ((!password_verify($password, $verifUser['password'])) && (empty($email) || ($email != $verifUser['mail']))) {
//         $logInErrormode = '3';
//         return $logInErrormode;
//     } elseif (!password_verify($password, $verifUser['password'])) {
//         $logInErrormode = '1';
//         return $logInErrormode;
//     } elseif (empty($email) || ($email != $verifUser['mail'])) {
//         $logInErrormode = '2';
//         return $logInErrormode;
//     } else {
//         $_SESSION['userId'] = $verifUser['ID'];
//         $_SESSION['name'] = $verifUser['prenom'];
//         $_SESSION['lastname'] = $verifUser['nom'];
//         $_SESSION['mail'] = $verifUser['mail'];
//         $_SESSION['avatarPath'] = $verifUser['avatar'];

//         header("Location: index.php?action=logged");
//     }
// }



// function skritoAuthError($AuthErrormode)
// {
//     if (!empty($AuthErrormode)) {
//         header("Location: index.php?error=$AuthErrormode");
//     }
// }



// function skritoLogInError($logInErrormode)
// {
//     if (!empty($logInErrormode)) {
//         header("Location: index.php?error=$logInErrormode");
//     }
// }

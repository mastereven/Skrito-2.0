<?php
require_once 'models/Skritter_model.php';
require_once 'models/Skrito_auth_page_validator.php';

/**
 * Class Skritter_Controller
 *
 * Contrôleur principal de l'application Skrito, gère les interactions entre les modèles et les vues.
 */
class Skritter_Controller
{
    /**
     * @var Skritter_Model Instance du modèle Skritter
     */
    private $Skritter_model;

    /**
     * Skritter_Controller constructor.
     * Initialise le modèle.
     */
    public function __construct()
    {
        $this->Skritter_model = new Skritter_Model();
    }

    /**
     * Traite les données du formulaire d'inscription.
     */
    public function registerSend()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'] ?? '';
            $last_name = $_POST['last_name'] ?? '';
            $mail = $_POST['mail'] ?? '';
            $password = $_POST['password'] ?? '';
            $pseudo = $_POST['pseudo'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            $cleanData = $this->Skritter_model->SkritoSanitize($first_name, $last_name, $mail, $password, $pseudo, $confirm_password);
            $validationData = $this->Skritter_model->SkritoValidator($cleanData);

            if ($this->Skritter_model->isEmailExists($cleanData['mail'])) {
                $validationData['errors']['mail'] = 'Mail déjà utilisé, veuillez vous connecter.';
            }

            if (!empty($validationData['errors'])) {
                $errorsHandling = $this->Skritter_model->SkritoErrorHandling($validationData['errors']);
                $title = "SKRITO - Inscription";
                $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
                $cssFiles = ['public/css/formatPage.css', 'public/css/authStyle.css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'];
                $jsFiles = ['public/js/password_toggler_script.js'];
                require_once 'views/Authentication_page_view.php';
            } else {
                $this->Skritter_model->SkritoInsert($cleanData);
                header('Location: index.php?action=newSkritterOk');
            }
        }
    }

    /**
     * Traite les données du formulaire de connexion.
     */
    public function logInSend()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'] ?? '';
            $password = $_POST['password'] ?? '';

            $cleanData = $this->Skritter_model->SkritoSanitize('', '', $mail, $password, '', '');
            $validationData = $this->Skritter_model->SkritoValidator($cleanData);

            if (!$validationData['isValid']) {
                $errorsHandling = $this->Skritter_model->SkritoErrorHandling($validationData['errors']);
                $title = "SKRITO - Connexion";
                $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
                $cssFiles = ['public/css/formatPage.css', 'public/css/conStyle.css'];
                $jsFiles = [['public/js/password_toggler_script.js']];
                require_once 'views/LogIn_page_view.php';
            } else {
                if ($this->Skritter_model->authenticateUser($cleanData['mail'], $cleanData['password'])) {
                    header('Location: index.php?action=profile');
                    exit();
                }
            }
        }
    }
    /**
     * Affiche la page d'accueil.
     */
    public function skritoLanding()
    {
        $title = 'SKRITO';
        $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
        $cssFiles = ['public/css/formatPage.css', 'public/css/navStyle.css', 'public/css/landingStyle.css', 'public/css/footerStyle.css'];
        $jsFiles = [];
        require_once 'views/nav_view.php';
        require_once 'views/Landing_page_view.php';
        require_once 'views/footer_view.php';
    }

    /**
     * Affiche la page de test.
     */
    public function skritoTestPage()
    {
        $title = "SKRITO - Test";
        $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
        $cssFiles = ['public/css/formatPage.css'];
        $jsFiles = [];
        require_once 'views/test.php';
    }

    /**
     * Affiche le formulaire d'inscription.
     */
    public function showRegisterForm()
    {
        $title = "SKRITO - Inscription";
        $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
        $cssFiles = ['public/css/formatPage.css', 'public/css/authStyle.css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'];
        $jsFiles = ['public/js/password_toggler_script.js'];
        require_once 'views/Authentication_page_view.php';
    }

    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        $title = "SKRITO - Connexion";
        $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
        $cssFiles = ['public/css/formatPage.css', 'public/css/conStyle.css'];
        $jsFiles = [];
        require_once 'views/LogIn_page_view.php';
    }

    /**
     * Affiche la page de profil utilisateur.
     */
    public function profile()
    {
        $title = "SKRITO - Profil";
        $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
        $cssFiles = ['public/css/formatPage.css', 'public/css/navLoggedStyle.css', 'public/css/profileStyle.css', 'public/css/footerStyle.css'];
        $jsFiles = [];
        require_once 'views/nav_logged_view.php';
        require_once 'views/Profile_page_view.php';
        require_once 'views/footer_view.php';
    }

    /**
     * Affiche la page de modification des informations utilisateur.
     */
    public function modifyUser()
    {
        echo "Affichage de la page de modification des informations utilisateur.";
    }

    /**
     * Affiche la page de modification de l'avatar utilisateur.
     */
    public function modifyAvatar()
    {
        echo "Affichage de la page de modification de l'avatar utilisateur.";
    }

    /**
     * Traite les données de modification du profil utilisateur.
     */
    public function newProfileSend()
    {
        echo "Traitement des données de modification du profil utilisateur.";
    }

    /**
     * Traite les données de modification de l'avatar utilisateur.
     */
    public function newAvatar()
    {
        echo "Traitement des données de modification de l'avatar utilisateur.";
    }

    /**
     * Affiche la page de confirmation d'inscription réussie.
     */
    public function newSkritterOk()
    {
        $title = "SKRITO - Inscription réussie";
        $policeFiles = ['https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap'];
        $cssFiles = ['public/css/formatPage.css', 'public/css/authSuccessStyle.css'];
        $jsFiles = ['public/js/success_waiter_script.js'];
        require_once 'views/successAuth_page_view.php';
    }
}

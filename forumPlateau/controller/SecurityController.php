<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Controller\HomeController;
use Model\Entities\User;
use Model\Managers\MessageManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;


class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {

        return [
            "view" => VIEW_DIR . "/security/login.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error')
            ]
        ];
    }

    public function loginForm()
    {

        return [
            "view" => VIEW_DIR . "/security/login.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error')
            ]
        ];
    }

    public function login()
    {
        $username = filter_input(INPUT_POST, 'usernameInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'passwordInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($username && $password){
            $userManager = new UserManager();

            $user = $userManager->getUserByUsername($username);
            if($user){
                if(password_verify($password, $user->getPassword())){
                    Session::setUser($user);
                    Session::addFlash('success', 'Vous êtes bien connecté !');
                    $this->redirectTo('forum', 'home');
                }else{
                    Session::addFlash('error', 'Mauvais mot de passe !');
                    $this->redirectTo('forum', 'loginForm');
                }
            }else{
                Session::addFlash('error', 'Mauvais mot de passe ou pseudonyme !');
                $this->redirectTo('forum', 'loginForm');
            }
        }
        
    }

    public function disconnect(){
        unset($_SESSION['user']);
        Session::addFlash('success', 'Vous êtes bien déconnecté !');
        $this->redirectTo('forum', 'home');
    }

    public function registerForm()
    {

        return [
            "view" => VIEW_DIR . "/security/register.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error')
            ]
        ];
    }

    /**
     * This function registers a user by filtering and validating input, hashing the password,
     * creating a new user object, and adding the user to the database.
     * 
     * @return mixed Either the result of the `index()` method of the `HomeController` class if the
     * registration is successful, or the result of the `registerForm()` method if the registration
     * fails or if any of the input values are invalid.
     */
    public function register()
    {

        /* The code is using the `filter_input` function to retrieve and sanitize user input from
            the `POST` request. */
        $username = filter_input(INPUT_POST, 'usernameInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'emailInput', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'passwordInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($username && $email && $password) {

            /* Generating a hash of the user's password using the bcrypt algorithm. 
                This is a one-way hashing function that is commonly used for password hashing in PHP. 
                The `password_hash()` function takes the user's password as the first parameter and 
                the algorithm to use as the second parameter. In this case, the algorithm used is `PASSWORD_BCRYPT`. 
                The resulting hash is then stored in the variable `passwordHash` for being stored it in the database for 
                password verification. */
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $data = ['username' => $username, 'email' => $email, 'password' => $passwordHash, 'role' => json_encode(["ROLE_USER"])];
            $userManager = new UserManager();
            // $user = new User();

            $userManager->add($data);

            /* The code is creating a new session object using the `Session` class. Then, it
            sets the user object to the session using the `setUser()` method. After that, it
            adds a flash message to the session with the key 'success' and the message 'Vous
            êtes désormais inscrit et connecté ! Félicitation !'. Finally, it creates a new
            instance of the `HomeController` class and calls its `index()` method, which
            returns the result. */
            
            // $session->setUser($user);
            Session::addFlash('success', 'Vous êtes désormais inscrit et connecté ! Félicitation !');

            $this->redirectTo('forum', 'home');

        } else {
            return $this->registerForm();
            Session::addFlash('error', 'Impossible de vous eenregistrer, veuillez réessayer !');
        }
    }

    public function profile(){
        $user = Session::getUser();
        $topicManager = new TopicManager();
        $messageManager = new MessageManager();

        // var_dump($user);

        $userManager = new UserManager();

        $users = $userManager->findAll();

        $topicCount = $topicManager->countAllByUserId($user->getId());
        $messageCount = $messageManager->countAllByUserId($user->getId());


        return [
            "view" => VIEW_DIR . "/profile/profile.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error'),
                "user" => $user,
                "topicCount" => $topicCount,
                "messageCount" => $messageCount,
                "users" => $users
            ]
        ];
    }

    /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
}

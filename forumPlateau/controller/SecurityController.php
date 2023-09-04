<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Controller\HomeController;
use Model\Entities\User;
use Model\Managers\UserManager;


class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {

        return [
            "view" => VIEW_DIR . "/security/login.php",
            "data" => []
        ];
    }

    public function login()
    {

        return [
            "view" => VIEW_DIR . "/security/login.php",
            "data" => []
        ];
    }

    public function registerForm()
    {

        return [
            "view" => VIEW_DIR . "/security/register.php",
            "data" => []
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
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $data = ['username' => $username, 'email' => $email, 'password' => $passwordHash];
            $userManager = new UserManager();
            // $user = new User($data);

            $userManager->add($data);


            /* The code is creating a new session object using the `Session` class. Then, it
            sets the user object to the session using the `setUser()` method. After that, it
            adds a flash message to the session with the key 'success' and the message 'Vous
            êtes désormais inscrit et connecté ! Félicitation !'. Finally, it creates a new
            instance of the `HomeController` class and calls its `index()` method, which
            returns the result. */
            $session = new Session();
            // $session->setUser($user);
            $session->addFlash('success', 'Vous êtes désormais inscrit et connecté ! Félicitation !');
            $this->redirectTo('forum', 'home');

        } else {

            return $this->registerForm();
        }
    }

    /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
}

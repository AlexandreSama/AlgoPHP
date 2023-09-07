<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\MessageManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;


class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {

        $user = Session::getUser();

            return [
                "view" => VIEW_DIR."forum/404.php",
                "data" => [
                    "user" => $user,
                ]
            ];
    }

    /**
     * The loginForm function returns the view and data needed to render a login form, including
     * success and error messages and the current user.
     * 
     * @return array An array is being returned with two elements: "view" and "data".
     */
    public function loginForm()
    {
        $user = Session::getUser();

        return [
            "view" => VIEW_DIR . "/security/login.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error'),
                "user" => $user
            ]
        ];
    }

    /**
     * The login function filters and sanitizes the username and password inputs, checks if the user
     * exists and if the password is correct, sets the user session and redirects to the home page of
     * the forum if successful, otherwise displays error messages and redirects to the login form.
     */
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
                Session::addFlash('error', 'Mauvais pseudonyme !');
                $this->redirectTo('forum', 'loginForm');
            }
        }
        
    }

    /**
     * The disconnect function in PHP unsets the user session, adds a success flash message, and
     * redirects the user to the home page of the forum.
     */
    public function disconnect(){
        unset($_SESSION['user']);
        Session::addFlash('success', 'Vous êtes bien déconnecté !');
        $this->redirectTo('forum', 'home');
    }

    /**
     * The function returns the view and data needed for a registration form, including success and
     * error messages and the current user.
     * 
     * @return array An array is being returned. The array has two elements: "view" and "data". The "view"
     * element contains the path to the register.php view file. The "data" element is an associative
     * array that contains the following keys: "successMessage", "errorMessage", and "user". The values
     * for these keys are retrieved from the Session class using the getFlash method and the getUser
     * method
     */
    public function registerForm()
    {
        $user = Session::getUser();

        return [
            "view" => VIEW_DIR . "/security/register.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error'),
                "user" => $user
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
        $tmpName = $_FILES['avatarInput']['tmp_name'];

        if ($username && $email && $password && $tmpName) {

            $uniqueName = uniqid('', true);
            $nameFile = $uniqueName . "." . $_FILES['avatarInput']['name'];
            move_uploaded_file($tmpName, '././public/uploads/' . $nameFile);

            /* Generating a hash of the user's password using the bcrypt algorithm. 
                This is a one-way hashing function that is commonly used for password hashing in PHP. 
                The `password_hash()` function takes the user's password as the first parameter and 
                the algorithm to use as the second parameter. In this case, the algorithm used is `PASSWORD_BCRYPT`. 
                The resulting hash is then stored in the variable `passwordHash` for being stored it in the database for 
                password verification. */
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $data = ['username' => $username, 'email' => $email, 'password' => $passwordHash, 'role' => json_encode(["ROLE_USER"]), 'profilePicture' => $nameFile];
            $userManager = new UserManager();

            $userManager->add($data);

            /* The code is creating a new session object using the `Session` class. Then, it
            sets the user object to the session using the `setUser()` method. After that, it
            adds a flash message to the session with the key 'success' and the message 'Vous
            êtes désormais inscrit et connecté ! Félicitation !'. Finally, it creates a new
            instance of the `HomeController` class and calls its `index()` method, which
            returns the result. */
            
            Session::addFlash('success', 'Vous êtes désormais inscrit et connecté ! Félicitation !');

            $this->redirectTo('forum', 'home');

        } else {
            return $this->registerForm();
            Session::addFlash('error', 'Impossible de vous eenregistrer, veuillez réessayer !');
        }
    }

    /**
     * The profile function retrieves user information, topic and message counts, and a list of all
     * users for the profile page.
     * 
     * @return array An array is being returned with two keys: "view" and "data". The value of the "view" key
     * is the path to a PHP file that will be used to render the profile view. The value of the "data"
     * key is an array containing various data that will be passed to the view, including a success
     * message, an error message, the current user, the count of topics
     */
    public function profile(){
        $user = Session::getUser();
        $topicManager = new TopicManager();
        $messageManager = new MessageManager();

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

    /**
     * The function "showProfile" retrieves user information, topic count, and message count for a given
     * user ID and returns it along with success and error messages.
     * 
     * @param id The parameter "id" is the identifier of the user whose profile is being requested to be
     * shown.
     * 
     * @return array An array is being returned. The array has two keys: "view" and "data". The value of the
     * "view" key is the directory path to the file "showProfile.php". The value of the "data" key is an
     * array containing various data such as success and error messages, user information, topic count,
     * message count, and profile viewer information.
     */
    public function showProfile($id){

        $user = Session::getUser();
        $topicManager = new TopicManager();
        $messageManager = new MessageManager();


        $userManager = new UserManager();

        $profileViewer = $userManager->findOneById($id);

        $topicCount = $topicManager->countAllByUserId($id);
        $messageCount = $messageManager->countAllByUserId($id);

        return [
            "view" => VIEW_DIR . "/profile/showProfile.php",
            "data" => [
                "successMessage" => Session::getFlash('success'),
                "errorMessage" => Session::getFlash('error'),
                "user" => $user,
                "topicCount" => $topicCount,
                "messageCount" => $messageCount,
                "profileViewer" => $profileViewer
            ]
        ];
    }

    /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
}

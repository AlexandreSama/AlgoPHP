<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
use Model\Entities\Message;
use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    
    class HomeController extends AbstractController implements ControllerInterface{

        /**
         * The index function returns an array with a view path and data containing categories, topics,
         * and messages.
         * 
         * @return array an array is being returned with two keys: "view" and "data". The value of the "view"
         * key is the path to the "home.php" view file. The value of the "data" key is an array
         * containing three keys: "categories", "topics", and "messages". The value of the "categories"
         * key is the result of calling the "findAll" method on
         */
        public function index(){

            $categoryManager = new CategoryManager();
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."home.php",
                "data" => [
                    "categories" => $categoryManager->findAll(),
                    "topics" => $topicManager,
                    "messages" => $messageManager
                ]
            ];
        }



        /**
         * The function "listUsers" retrieves a list of users from the database and returns the view
         * and data needed to display the list.
         * 
         * @return array an array with two elements. The first element is a string representing the path to a
         * view file, and the second element is an array containing the users data.
         */
        public function listUsers(){

            $userManager = new UserManager();
            $users = $userManager->findAll(['inscriptionDate', 'DESC']);

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "users" => $users
                ]
            ];
        }
            

        public function forumRules(){
            
            return [
                "view" => VIEW_DIR."rules.php"
            ];
        }

        /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
    }

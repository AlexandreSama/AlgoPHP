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

<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\AimerManager;
use Model\Managers\CategoryManager;
use Model\Managers\MessageManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface
{

    /**
     * The index function returns an array with a view path and data containing categories, topics,
     * and messages.
     * 
     * @return array an array is being returned with two keys: "view" and "data". The value of the "view"
     * key is the path to the "home.php" view file. The value of the "data" key is an array
     * containing three keys: "categories", "topics", and "messages". The value of the "categories"
     * key is the result of calling the "findAll" method on
     */
    public function index()
    {
        return [
            "view" => VIEW_DIR . "404.php"
        ];
    }

    public function ajax()
    {

        //We get all the value in the inputs from the form and filter it.
        $search = $_GET['search'];
        $type = $_GET['type'];
        
        switch ($type) {
            case 'category':

                $categoryManager = new CategoryManager();
                $topicManager = new TopicManager();
                $messageManager = new MessageManager();

                $categories = $categoryManager->findOneByName($search);

                $result = [
                    "data" => [
                        "categories" => $categories,
                        "topics" => $topicManager,
                        "messages" => $messageManager,
                    ]
                ];
                // include(VIEW_DIR . 'home.php');

                break;
            case 'topic':

                $topicManager = new TopicManager();
                $aimerManager = new AimerManager();
                $userManager = new UserManager();
                $messageManager = new MessageManager();

                $topics = $topicManager->findOneByName($search);

                return [
                    "view" => VIEW_DIR . "forum/listTopics.php",
                    "data" => [
                        "aimerManager" => $aimerManager,
                        "topics" => $topics,
                        "userManager" => $userManager,
                        "message" => $messageManager,
                    ]
                ];

                break;
            default:
                Session::addFlash('error', 'Veuillez choisir un type !');
                $this->redirectTo('forum', 'home');
                break;
        }
    }
}

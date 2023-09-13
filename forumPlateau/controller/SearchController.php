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

class SearchController extends AbstractController implements ControllerInterface
{

    
    /**
     * The index function takes user input for search and type, and based on the type, retrieves and
     * returns data related to categories or topics.
     * 
     * @return array An array with two keys: "view" and "data". The value of the "view" key is the path to a
     * view file, and the value of the "data" key is an array containing various data that will be
     * passed to the view.
     */
    public function index()
    {

        $search = filter_input(INPUT_POST, 'searchInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $type = filter_input(INPUT_POST, 'typeInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        switch ($type) {
            case 'category':

                $categoryManager = new CategoryManager();
                $topicManager = new TopicManager();
                $messageManager = new MessageManager();
                $user = Session::getUser();
                $categories = $categoryManager->findOneByName($search);

                return [
                    "view" => VIEW_DIR . "home.php",
                    "data" => [
                        "categories" => $categories,
                        "topics" => $topicManager,
                        "messages" => $messageManager,
                        "successMessage" => Session::getFlash('success'),
                        "errorMessage" => Session::getFlash('error'),
                        "user" => $user
                    ]
                ];

                break;
            case 'topic':

                $topicManager = new TopicManager();
                $aimerManager = new AimerManager();
                $userManager = new UserManager();
                $messageManager = new MessageManager();

                $user = Session::getUser();

                $topics = $topicManager->findOneByName($search);

                return [
                    "view" => VIEW_DIR . "forum/listTopics.php",
                    "data" => [
                        "aimerManager" => $aimerManager,
                        "topics" => $topics,
                        "userManager" => $userManager,
                        "message" => $messageManager,
                        "user" => $user,
                        "successMessage" => Session::getFlash('success'),
                        "errorMessage" => Session::getFlash('error')
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

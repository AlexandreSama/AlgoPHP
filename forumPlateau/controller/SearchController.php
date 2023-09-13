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
     * This PHP function searches for a category by name and redirects to the list of topics in that
     * category if found, otherwise it displays an error message and redirects to the forum home page.
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
                Session::addFlash('error', 'Aucune catégorie trouvé a ce nom !');
                $this->redirectTo('forum', 'home');
            break;
        }
    }
}

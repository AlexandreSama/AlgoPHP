<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategoryManager;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
use Model\Managers\UserManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

            $topicManager = new TopicManager();
            // $topics = $topicManager->findAll();
            // var_dump($topics);
            return [
                // "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll()
                ]
            ];
        
        }

        public function listTopics($categoryId){
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();
            $userManager = new UserManager();
            $messageManager = new MessageManager();
            $category = $categoryManager->findOneById($categoryId);
            $topics = $topicManager->getTopicByCategoryId($categoryId);
            

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topics,
                    "categoryName" => $category,
                    "user" => $userManager,
                    "message" => $messageManager
                ]
            ];
        }

        public function showTopic($topicId){

            $topicManager = new TopicManager();
            $messageManager = new MessageManager();
            $userManager = new UserManager();
            $messages = $messageManager->getTopicByIdAscendant($topicId);
            $topic = $topicManager->findOneById($topicId);
            return [
                "view" => VIEW_DIR."forum/topic.php",
                "data" => [
                    "topic" => $topic,
                    "userManager" => $userManager,
                    "messages" => $messages
                ]
            ];
        }

    }

<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Entities\Message;
    use Model\Entities\Topic;
    use Model\Managers\CategoryManager;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\UserManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

            $topicManager = new TopicManager();
            return [
                // "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll()
                ]
            ];
        
        }

        public function home(){

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
         * The function "listTopics" retrieves a list of topics belonging to a specific category in a
         * forum and returns the data needed to display them in a view.
         * 
         * @param categoryId The categoryId parameter is the ID of the category for which you want to
         * list the topics.
         * 
         * @return array an array is being returned with two keys: "view" and "data". The value of "view" is
         * the path to a PHP file that will be used to display the topics. The value of "data" is an
         * array containing the topics, the category name, the user manager, and the message manager.
         */
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

        /**
         * The function "showTopic" retrieves a topic and its associated messages from the database and
         * returns them along with the necessary view and data for rendering the topic page.
         * 
         * @param topicId The topicId parameter is the unique identifier of the topic that you want to
         * display. It is used to retrieve the topic and its associated messages from the database.
         * 
         * @return array an array is being returned. The array has two elements: "view" and "data". The value
         * of "view" is the path to a PHP file that will be used to render the view. The value of
         * "data" is an array containing the topic, userManager, and messages.
         */
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

        public function addCategoryForm(){
            return [
                "view" => VIEW_DIR."forum/addCategory.php"
            ];
        }

        /**
         * The function adds a category to the database and redirects to the home page if successful,
         * otherwise it displays the add category form again.
         * 
         * @return mixed The result of calling the `index()` method on a `HomeController` object if the
         * `` is a string. Otherwise, it is returning the result of calling the
         * `addCategoryForm()` method on the current object.
         */
        public function addCategory(){
            $categoryName = filter_input(INPUT_POST, 'categoryNameInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($categoryName){

                $categoryManager = new CategoryManager();
                $data = ['categoryName' => $categoryName];
                $result = $categoryManager->add(["categoryName" => $categoryName]);
                
                $this->redirectTo('forum', 'home');
                // if(is_string($result)){

                    // $homeController = new HomeController();
                    // return $homeController->index();


                // }else{

                //     return $this->addCategoryForm();
                // }
            }else{

                return $this->addCategoryForm();

            }
        }

        /**
         * The function returns a view and data for adding a topic in a forum, including a list of
         * categories.
         * 
         * @return array An array is being returned with two elements: "view" and "data".
         */
        public function addTopicForm(){
            $categoryManager = new CategoryManager();
            return [
                "view" => VIEW_DIR."forum/addTopic.php",
                "data" => [
                    "categories" => $categoryManager->findAll()
                ]
            ];
        }

        /**
         * The function adds a new topic to a forum with the provided topic name, message text, and
         * category ID.
         * 
         * @return If the variables $topicName, $messageText and $categoryId are all set and valid,
         * the function will add a new topic and message to the database and then redirect the user to
         * the forum home page. If any of the variables are not set or not valid, the function will
         * return the addTopicForm.
         */
        public function addTopic(){
            $topicName = filter_input(INPUT_POST, 'categoryNameInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $messageText = filter_input(INPUT_POST, 'messageInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $categoryId = filter_input(INPUT_POST, 'categoryInput', FILTER_VALIDATE_INT);

            if($topicName && $messageText && $categoryId){
                $topicManager = new TopicManager();
                $messageManager = new MessageManager();

                $topicData = ['title' => $topicName, 'user_id' => 9, 'category_id' => $categoryId];
                $topicId = $topicManager->add($topicData);

                $messageData = ['messageText' => $messageText, 'user_id' => 9, 'topic_id' => $topicId];
                $messageManager->add($messageData);

                $this->redirectTo('forum', 'home');
            }else{
                return $this->addTopicForm();
            }
        }

        /**
         * The function `addMessage()` adds a message to a topic in a forum if the topic ID and message
         * content are valid, otherwise it shows the topic page.
         * 
         * @return void the `$topicId` and `$messageContent` are both valid, the function will call the
         * `add()` method of the `$messageMananger` object and pass in the `$messageData` array.
         */
        public function addMessage(){
            $topicId = filter_input(INPUT_POST, 'topicId', FILTER_VALIDATE_INT);
            $messageContent = filter_input(INPUT_POST, 'messageContent', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($topicId && $messageContent){
                $messageManager = new MessageManager();
                $messageData = ['messageText' => $messageContent, 'user_id' => 2, 'topic_id' => $topicId];

                $test = $messageManager->add($messageData);

            }else{
                return $this->showTopic($topicId);

            }
        }

    }

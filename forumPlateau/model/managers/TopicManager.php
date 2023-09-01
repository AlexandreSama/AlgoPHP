<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;


    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }


        /**
         * The function retrieves a topic by its category ID from the database.
         * 
         * @param id The parameter "id" is the category ID that is used to filter the topics. It is
         * passed to the function as an argument when calling the function.
         * 
         * @return categories the result of the SQL query, which is an array of topic records that have a
         * category_id matching the provided .
         */
        public function getTopicByCategoryId($id){
            $sql = 'SELECT *
            FROM topic t
            WHERE t.category_id = :id';
            return DAO::select($sql, ['id' => $id], true);
        }

        /**
         * The function retrieves a user and topic based on their respective IDs.
         * 
         * @param idUser The id of the user you want to retrieve.
         * @param idTopic The idTopic parameter is the unique identifier of a topic. It is used to
         * filter the results and retrieve the user associated with a specific topic.
         * 
         * @return user The result of the SQL query, which is an array of user and topic data.
         */
        // public function getLastMessage($idUser, $idTopic){
        //     $sql = 'SELECT *
        //     FROM user u, topic t
        //     WHERE u.id_user = :iduser AND t.id_topic = :idtopic';
        //     return DAO::select($sql, ['iduser' => $idUser, 'idtopic' => $idTopic], true);
        // }


    }
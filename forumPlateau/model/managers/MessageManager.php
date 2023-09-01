<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;


    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        /**
         * The function retrieves a topic by its ID from the database.
         * 
         * @param id The parameter "id" is the topic ID that is used to filter the messages in the
         * database. It is passed as a parameter to the SQL query to retrieve all the messages that
         * belong to a specific topic.
         * 
         * @return topic The result of the SQL query, which is an array of message records that have a
         * topic_id matching the provided .
         */
        public function getTopicById($id){
            $sql = 'SELECT *
            FROM message m
            WHERE m.topic_id = :id
            ORDER BY m.creationDate DESC
            LIMIT 1';
            return DAO::select($sql, ['id' => $id], true);
        }

        public function getLastMessageFromTopicId($id){
            $sql = 'SELECT *
            FROM user u, message m, topic t
            WHERE m.topic_id = :idtopic AND u.id_user = m.user_id
            ORDER BY m.creationDate DESC
            LIMIT 1';
            return DAO::select($sql, ['idtopic' => $id], true);
        }


    }
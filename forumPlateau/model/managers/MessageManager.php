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

        /**
         * The function retrieves messages related to a specific topic, ordered by their creation date
         * in ascending order.
         * 
         * @param id The parameter "id" is the ID of the topic for which you want to retrieve the
         * messages.
         * 
         * @return array The result of the SQL query, which is an array of message objects that belong to the
         * specified topic ID, ordered by their creation date in ascending order.
         */
        public function getTopicByIdAscendant($id){
            $sql = 'SELECT *
            FROM message m
            WHERE m.topic_id = :id
            ORDER BY m.creationDate ASC';
            return DAO::select($sql, ['id' => $id], true);
        }

        /**
         * The function retrieves the last message from a specific topic ID in a database.
         * 
         * @param string $id The parameter "id" is the topic ID. It is used to filter the messages and retrieve
         * the last message from the specified topic.
         * 
         * @return array The last message from a specific topic ID.
         */
        public function getLastMessageFromTopicId($id){
            $sql = 'SELECT *
            FROM user u, message m, topic t
            WHERE m.topic_id = :idtopic AND u.id_user = m.user_id
            ORDER BY m.creationDate DESC
            LIMIT 1';
            return DAO::select($sql, ['idtopic' => $id], true);
        }

        public function countAllByUserId($id){
            $sql = 'SELECT COUNT(*) AS count
            FROM message m
            WHERE m.user_id = :id';
            return DAO::select($sql, ['id' => $id], false);
        }


    }
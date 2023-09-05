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

        public function countAllByUserId($id){
            $sql = 'SELECT COUNT(*) AS count
            FROM topic t
            WHERE t.user_id = :id';
            return DAO::select($sql, ['id' => $id], false);
        }


    }
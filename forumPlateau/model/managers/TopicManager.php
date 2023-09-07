<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
    }



    /**
     * The function retrieves a topic by its category ID from the database.
     * 
     * @param String $id The parameter "id" is a string representing the category ID.
     * 
     * @return Array The result of the SQL query, which is an array of topic records that have a
     * category_id matching the provided .
     */
    public function getTopicByCategoryId($id)
    {
        $sql = 'SELECT *
            FROM topic t
            WHERE t.category_id = :id';
        return DAO::select($sql, ['id' => $id], true);
    }

    /**
     * The function counts the number of topics associated with a specific user ID.
     * 
     * @param String $id The parameter "id" is the user ID that is used to filter the topics. The function
     * counts the number of topics that are associated with a specific user ID.
     * 
     * @return Array The count of all topics associated with a specific user ID.
     */
    public function countAllByUserId($id)
    {
        $sql = 'SELECT COUNT(*) AS count
            FROM topic t
            WHERE t.user_id = :id';
        return DAO::select($sql, ['id' => $id], false);
    }
}

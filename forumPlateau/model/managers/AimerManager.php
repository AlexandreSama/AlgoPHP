<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class AimerManager extends Manager
{

    protected $className = "Model\Entities\Aimer";
    protected $tableName = "aimer";


    public function __construct()
    {
        parent::connect();
    }


    /**
     * The function adds a like to a topic by inserting the topic ID and user ID into the "aimer"
     * table.
     * 
     * @param String $topicId The topicId parameter is the ID of the topic that the user wants to add a like
     * to.
     * @param String $userId The userId parameter represents the ID of the user who is adding a like to a
     * topic.
     * 
     * @return Boolean The result of the `DAO::insert()` method, which is a boolean value indicating whether
     * the insertion was successful or not.
     */
    public function addLike($topicId, $userId){
        $topic = intval($topicId);
        $user = intval($userId);
        $sql = 'INSERT INTO aimer
        (topic_id, user_id) VALUES
        (:topicid, :userid)';

        return $this->getOneOrNullResult(
            DAO::insert($sql, ['topicid' => $topic, 'userid' => $user]),
            $this->className
        );
    }

    /**
     * The function retrieves the number of likes for a given topic ID from the "aimer" table.
     * 
     * @param String $id The parameter "id" is the topic id for which you want to retrieve the number of likes.
     * 
     * @return Array The number of likes for a specific topic ID.
     */
    public function getLikesByTopicId($id){
        $sql = 'SELECT COUNT(*) AS likes
        FROM aimer a
        WHERE a.topic_id = :id';

        return DAO::select($sql, ['id' => $id], false);
    }

    /**
     * The function checks if a user has liked a specific topic.
     * 
     * @param String $idTopic The parameter `idTopic` is the ID of the topic that you want to check if a user
     * has liked.
     * 
     * @return Array The user_id of the users who have liked the topic with the given idTopic.
     */
    public function checkUserLike($idTopic){
        $sql = 'SELECT user_id
        FROM aimer a
        WHERE a.topic_id = :id';

        return DAO::select($sql, ['id' => $idTopic], false);
    }

}
<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class MessageManager extends Manager
{

    protected $className = "Model\Entities\Message";
    protected $tableName = "message";


    public function __construct()
    {
        parent::connect();
    }

    /**
     * The function retrieves a topic by its ID from the database.
     * 
     * @param string $id The parameter "id" is the topic ID that is used to filter the messages in the
     * database. It is passed as a parameter to the SQL query to retrieve all the messages that
     * belong to a specific topic.
     * 
     * @return topic The result of the SQL query, which is an array of message records that have a
     * topic_id matching the provided .
     */
    public function getMessageByTopicId($id)
    {
        $sql = 'SELECT *
            FROM message m
            WHERE m.topic_id = :id
            ORDER BY m.creationDate DESC
            LIMIT 1';
        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    /**
     * The function retrieves messages related to a specific topic, ordered by their creation date
     * in ascending order.
     * 
     * @param string $id The parameter "id" is the ID of the topic for which you want to retrieve the
     * messages.
     * 
     * @return array The result of the SQL query, which is an array of message objects that belong to the
     * specified topic ID, ordered by their creation date in ascending order.
     */
    public function getMessageByTopicIdAscendant($id)
    {
        $sql = 'SELECT *
            FROM message m
            WHERE m.topic_id = :id
            ORDER BY m.creationDate ASC';
        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    /**
     * The function retrieves the last message from a specific topic ID in a database.
     * 
     * @param string $id The parameter "id" is the topic ID. It is used to filter the messages and retrieve
     * the last message from the specified topic.
     * 
     * @return array The last message from a specific topic ID.
     */
    public function getLastMessageFromTopicId($id)
    {
        $sql = 'SELECT *
            FROM user u, message m, topic t
            WHERE m.topic_id = :idtopic AND u.id_user = m.user_id
            ORDER BY m.creationDate DESC
            LIMIT 1';
        return $this->getMultipleResults(
            DAO::select($sql, ['idtopic' => $id]),
            $this->className
        );
    }

    /**
     * The function counts the number of messages associated with a specific user ID.
     * 
     * @param string $id The parameter "id" is the user ID that is used to filter the messages. The
     * function counts the number of messages that belong to a specific user.
     * 
     * @return array the count of all messages associated with a specific user ID.
     */
    public function countAllByUserId($id)
    {
        $sql = 'SELECT COUNT(*) AS count
            FROM message m
            WHERE m.user_id = :id';
        return DAO::select($sql, ['id' => $id], false);
    }

    public function getTopicById($topicId)
    {
        $sql = 'SELECT *
        FROM topic t
        INNER JOIN message m ON t.id_topic = m.topic_id
        WHERE t.id_topic = :id';
        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $topicId], false),
            $this->className
        );
    }
}

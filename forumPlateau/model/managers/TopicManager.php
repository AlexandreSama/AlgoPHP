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
     * @param string $id The parameter "id" is a string representing the category ID.
     * 
     * @return array The result of the SQL query, which is an array of topic records that have a
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
     * @param string $id The parameter "id" is the user ID that is used to filter the topics. The function
     * counts the number of topics that are associated with a specific user ID.
     * 
     * @return array The count of all topics associated with a specific user ID.
     */
    public function countAllByUserId($id)
    {
        $sql = 'SELECT COUNT(*) AS count
            FROM topic t
            WHERE t.user_id = :id';
        return DAO::select($sql, ['id' => $id], false);
    }

    /**
     * The lockTopic function updates the closed field of a topic in the database to 1, indicating that
     * the topic is locked.
     * 
     * @param string $id The parameter "id" is the identifier of the topic that needs to be locked.
     * 
     * @return boolean the result of the DAO::update() method.
     */
    public function lockTopic($id){
        $sql = 'UPDATE topic t
        SET closed = 1
        WHERE t.id_topic = :id';
        return DAO::update($sql, ['id' => $id], false);
    }

    /**
     * The function unlocks a topic by updating the 'closed' field to 0 in the database.
     * 
     * @param string $id The parameter "id" is the ID of the topic that needs to be unlocked.
     * 
     * @return boolean the result of the DAO::update() method.
     */
    public function unlockTopic($id){
        $sql = 'UPDATE topic t
        SET closed = 0
        WHERE t.id_topic = :id';
        return DAO::update($sql, ['id' => $id], false);
    }

    /**
     * The function adds a like to a topic by a user in a database table.
     * 
     * @param Topic $topic The topic parameter represents the topic that the user wants to add a like to. It
     * could be an object or a value that identifies the topic.
     * @param User $user The user parameter represents the user who is adding a like to a topic. It could be an
     * instance of a User class or simply the user's ID.
     * 
     * @return boolean The result of the DAO::insert() method, which is typically a boolean value indicating
     * whether the insertion was successful or not.
     */
    public function addLike($topic, $user){

        $sql = 'INSERT INTO aimer
        (topic_id, user_id) VALUES
        (:idtopic, :iduser)';

        $topic->addFavoris($user);
        $user->addFavoris($topic);

        return DAO::insert($sql, ['idtopic' => $topic->getId(), 'iduser' => $user->getId()]);
    }

    /**
     * The function removes a like from a topic for a specific user.
     * 
     * @param Topic $topic The "topic" parameter represents the topic object from which the like is being
     * removed.
     * @param User $user The  parameter is an object representing a user. It likely has properties such
     * as id, name, email, etc., and methods to retrieve and manipulate user data.
     * 
     * @return boolean The result of the `DAO::delete()` method, which is likely a boolean value indicating
     * whether the deletion was successful or not.
     */
    public function removeLike($topic, $user){

        $sql = 'DELETE FROM aimer
        WHERE topic_id = :idtopic AND user_id = :iduser';
        $likes = $user->getFavoris();
        $likesTopic = $topic->getFavoris();
        foreach ($likes as $key => $value) {
            if($value->getId() == $topic->getId()){
                unset($likes[$key]);
            }
        }
        foreach ($likesTopic as $key => $value) {
            if($value->getId() == $user->getId()){
                unset($likesTopic[$key]);
            }
        }
        return DAO::delete($sql, ['idtopic' => $topic->getId(), 'iduser' => $user->getId()]);
    }
}

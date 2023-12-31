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
     * The function retrieves topics based on a given category ID.
     * 
     * @param id The parameter "id" is the category ID that is used to filter the topics. It is passed
     * to the function as an argument when calling the function.
     * 
     * @return multiple results of topics that have a category ID matching the provided ID.
     */
    public function getTopicByCategoryId($id)
    {
        $sql = 'SELECT *
            FROM topic t
            WHERE t.category_id = :id';
        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
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
    public function lockTopic($id)
    {
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
    public function unlockTopic($id)
    {
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
    public function addLike($topic, $user)
    {

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
    public function removeLike($topic, $user)
    {

        $sql = 'DELETE FROM aimer
        WHERE topic_id = :idtopic AND user_id = :iduser';
        $likes = $user->getFavoris();
        $likesTopic = $topic->getFavoris();
        foreach ($likes as $key => $value) {
            if ($value->getId() == $topic->getId()) {
                unset($likes[$key]);
            }
        }
        foreach ($likesTopic as $key => $value) {
            if ($value->getId() == $user->getId()) {
                unset($likesTopic[$key]);
            }
        }
        return DAO::delete($sql, ['idtopic' => $topic->getId(), 'iduser' => $user->getId()]);
    }

    /**
     * The function findOneByName searches for a topic in the database based on its name and returns
     * the result.
     * 
     * @param topicName The parameter `topicName` is a string that represents the name of the topic you
     * want to find.
     * 
     * @return the result of the `getMultipleResults` method, which is the result of the SQL query
     * executed in the `DAO::select` method.
     */
    public function findOneByName($topicName)
    {
        $nameTopic = ucfirst($topicName);
        $sql = 'SELECT *
        FROM topic t
        WHERE t.title LIKE "%' . $nameTopic . '%"';
        return $this->getMultipleResults(
            DAO::select($sql, ['nameTopic' => $nameTopic]),
            $this->className
        );
    }

    /**
     * The function updates the user_id field to null for all topics associated with a specific user
     * when their account is deleted.
     * 
     * @param string userId The userId parameter is the ID of the user whose account is being deleted.
     * 
     * @return object the result of the `getOneOrNullResult` method, which is the result of the SQL query.
     */
    public function updateTopicsOnDeleteAccount($userId){
        $sql = 'UPDATE topic t
        SET t.user_id = null
        WHERE t.user_id = :userid';
        return $this->getOneOrNullResult(
            DAO::select($sql, ['userid' => $userId], false),
            $this->className
        );
    }

    /**
     * The function `sendDiscordPayload` sends a JSON payload to a specified URL using cURL in PHP.
     * 
     * @param string title The `title` of the payload, which will be displayed as the title of the message in
     * Discord.
     * @param string username The `username` parameter is a string that represents the name of the user who
     * is sending the Discord payload.
     * @param string message The `message` parameter is a string that represents the content of the message
     * you want to send to Discord. It can be any text or information that you want to include in the
     * message.
     * 
     * @return string The output of the cURL request, which is stored in the variable .
     */
    public function sendDiscordPayloadOnCreatedTopic(string $title, string $username, string $message)
    {

        $url = 'https://kashirbot.kashir.fr/api/newTopic';

        $data = array(
            "title" => $title,
            "from" => $username,
            "message" => $message
        );

        $json_data = json_encode($data);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        return $server_output;
    }

    /**
     * The function sends a POST request to a Discord webhook with a JSON payload containing the title
     * and username of a deleted topic.
     * 
     * @param string title The title of the deleted topic.
     * @param string username The username parameter is a string that represents the name of the user
     * who deleted the topic.
     * 
     * @return string The response from the server after sending the Discord payload.
     */
    public function sendDiscordPayloadOnDeletedTopic(string $title, string $username)
    {

        $url = 'https://kashirbot.kashir.fr/api/deletedTopic';

        $data = array(
            "title" => $title,
            "by" => $username
        );

        $json_data = json_encode($data);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        return $server_output;
    }
}

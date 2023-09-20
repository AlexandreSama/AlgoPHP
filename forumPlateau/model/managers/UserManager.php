<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class UserManager extends Manager
{

    protected $className = "Model\Entities\User";
    protected $tableName = "user";


    public function __construct()
    {
        parent::connect();
    }

    /**
     * The function retrieves a user's information based on their ID.
     * 
     * @param string $id The parameter "id" is the identifier of the user for which you want to retrieve
     * the information.
     * 
     * @return array The result of the SQL query, which is an array of user records that match the given
     * id.
     */
    public function getUsersByMessages($id)
    {
        $sql = 'SELECT *
            FROM user u
            WHERE u.id_user = :id';
        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    /**
     * The function retrieves a user from the database based on their username.
     * 
     * @param string $username The parameter "username" is the username of the user you want to retrieve
     * from the database.
     * 
     * @return mixed the result of the query, which is either a single user object or null.
     */
    public function getUserByUsername($username)
    {
        $sql = 'SELECT *
            FROM user u
            WHERE u.username = :username';
        return $this->getOneOrNullResult(
            DAO::select($sql, ['username' => $username], false),
            $this->className
        );
    }

    /**
     * The function updates the role of a user in the database.
     * 
     * @param string $role The role parameter is the new role that you want to assign to the user. It can be a
     * string or an array, depending on how you want to store the role information in your database.
     * @param string $id The `id` parameter is the unique identifier of the user whose role needs to be
     * changed. It is used to identify the specific user in the database.
     * 
     * @return bool the result of the DAO::update() method.
     */
    public function changeRole($role, $id)
    {
        $sql = 'UPDATE user u
        SET role = :role
        WHERE u.id_user = :id';
        return DAO::update($sql, ['id' => $id, 'role' => json_encode($role)], false);
    }

    /**
     * The banUser function updates the isBanned field of a user in the database to 1, indicating that
     * the user is banned.
     * 
     * @param string $id The id parameter is the unique identifier of the user that needs to be banned.
     * 
     * @return bool The result of the update operation, which is a boolean value indicating whether the
     * update was successful or not.
     */
    public function banUser($id){
        $sql = 'UPDATE user u
        SET isBanned = 1
        WHERE u.id_user = :id';
        return DAO::update($sql, ['id' => $id], false);
    }

    /**
     * The unbanUser function updates the isBanned field of a user in the database to 0, effectively
     * unbanning the user.
     * 
     * @param string $id The id parameter is the unique identifier of the user that needs to be unbanned.
     * 
     * @return bool The result of the update query.
     */
    public function unbanUser($id){
        $sql = 'UPDATE user u
        SET isBanned = 0
        WHERE u.id_user = :id';
        return DAO::update($sql, ['id' => $id], false);
    }

    /**
     * The function updates the password of a user in the database.
     * 
     * @param password The new password that you want to update for the user.
     * @param id The id parameter represents the user's unique identifier in the database. It is used
     * to identify the specific user whose password needs to be updated.
     * 
     * @return boolean result of the DAO::update() method.
     */
    public function updatePassword($password, $id){
        $sql = 'UPDATE user u
        SET password = :pass
        WHERE u.id_user = :id';
        return DAO::update($sql, ['id' => $id, 'pass' => $password], false);
    }

    /**
     * The function sends a POST request to a Discord webhook URL with a JSON payload containing the
     * username parameter.
     * 
     * @param username The username parameter is the username of the user that is being created. It is
     * used to send the username information to the Discord API endpoint for user creation.
     * 
     * @return the server output, which is the response received from the API endpoint after sending
     * the Discord payload.
     */
    public function sendDiscordPayloadOnUserCreate($username){
        $url = 'https://kashirbot.kashir.fr/api/userCreate';

        $data = array(
            "username" => $username
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
     * The function sends a POST request to a Discord webhook URL with a JSON payload containing the
     * username of a deleted user.
     * 
     * @param username The username parameter is the username of the user that has been deleted. It is
     * used to identify the user in the Discord payload that will be sent to the specified URL.
     * 
     * @return the server output from the cURL request.
     */
    public function sendDiscordPayloadOnUserDelete($username){
        $url = 'https://kashirbot.kashir.fr/api/userDelete';

        $data = array(
            "username" => $username
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
     * The function sends a POST request to a Discord webhook URL with the username and the username of
     * the person who banned them as payload data.
     * 
     * @param username The username of the user who is being banned.
     * @param usernameBy The parameter "usernameBy" represents the username of the person who performed
     * the ban action.
     * 
     * @return the response from the server after sending the Discord payload on user ban.
     */
    public function sendDiscordPayloadOnUserBan($username, $usernameBy){
        $url = 'https://kashirbot.kashir.fr/api/userBan';

        $data = array(
            "username" => $username,
            "by" => $usernameBy
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
     * The function sends a Discord payload to a specified URL when a user is unbanned, providing the
     * username and the username of the person who performed the unban.
     * 
     * @param username The username of the user who was unbanned.
     * @param usernameBy The parameter "usernameBy" represents the username of the person who performed
     * the unban action.
     * 
     * @return the response from the server after sending the Discord payload on user unban.
     */
    public function sendDiscordPayloadOnUserUnban($username, $usernameBy){
        $url = 'https://kashirbot.kashir.fr/api/userUnban';

        $data = array(
            "username" => $username,
            "by" => $usernameBy
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

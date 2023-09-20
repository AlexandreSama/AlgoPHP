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
}

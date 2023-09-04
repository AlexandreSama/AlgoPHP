<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;


    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        /**
         * The function retrieves a user's information based on their ID.
         * 
         * @param id The parameter "id" is the identifier of the user for which you want to retrieve
         * the information.
         * 
         * @return array The result of the SQL query, which is an array of user records that match the given
         * id.
         */
        public function getUsersByMessages($id){
            $sql = 'SELECT *
            FROM user u
            WHERE u.id_user = :id';
            return DAO::select($sql, ['id' => $id], true);
        }


    }
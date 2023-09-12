<?php

namespace App;

/**
 * Classe d'accès aux données de la BDD, abstraite
 * 
 * @property static $bdd l'instance de PDO que la classe stockera lorsque connect() sera appelé
 *
 * @method static connect() connexion à la BDD
 * @method static insert() requètes d'insertion dans la BDD
 * @method static select() requètes de sélection
 */
abstract class DAO
{

    private static $host   = 'mysql:host=127.0.0.1;port=3306';
    private static $dbname = 'forumalex';
    private static $dbuser = 'root';
    private static $dbpass = '';

    private static $bdd;

    /**
     * cette méthode permet de créer l'unique instance de PDO de l'application
     */
    public static function connect()
    {

        self::$bdd = new \PDO(
            self::$host . ';dbname=' . self::$dbname,
            self::$dbuser,
            self::$dbpass,
            array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            )
        );
    }

    /**
     * The function inserts data into a database table and returns the ID of the newly inserted record.
     * 
     * @param string $sql The  parameter is a string that represents the SQL query that you want to
     * execute. It can be any valid SQL statement, such as an INSERT, UPDATE, or DELETE statement.
     * @param array $param The parameter is an optional parameter that allows you to pass an array of
     * values to be used as parameters in the prepared statement. These values will be bound to the
     * corresponding placeholders in the SQL query. If no  is provided, the execute() method will
     * be called without any parameters.
     * 
     * @return int the ID of the record that was just added to the database.
     */
    public static function insert($sql, $param = null)
    {
        try {
            $stmt = self::$bdd->prepare($sql);
            $stmt->execute($param);
            //on renvoie l'id de l'enregistrement qui vient d'être ajouté en base, 
            //pour s'en servir aussitôt dans le controleur
            return self::$bdd->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * The function "update" executes a SQL query with parameters and returns the execution status.
     * 
     * @param string $sql The  parameter is a string that represents the SQL query that you want to
     * execute. It can be any valid SQL statement, such as SELECT, INSERT, UPDATE, or DELETE.
     * @param array $params The  parameter is an array that contains the values to be bound to the
     * prepared statement placeholders in the SQL query. These values will be used to replace the
     * placeholders in the query before it is executed.
     * 
     * @return boolean the result of the execute() method, which is a boolean value indicating whether the SQL
     * statement was successfully executed or not.
     */
    public static function update($sql, $params)
    {
        try {
            $stmt = self::$bdd->prepare($sql);

            //on renvoie l'état du statement après exécution (true ou false)
            return $stmt->execute($params);
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * The function deletes data from a database using a prepared SQL statement and returns the
     * execution status.
     * 
     * @param string $sql The  parameter is a string that represents the SQL query to be executed. It can
     * be any valid SQL statement, such as SELECT, INSERT, UPDATE, or DELETE.
     * @param array $params The  parameter is an array that contains the values to be bound to the
     * placeholders in the SQL statement. These values will be used to replace the placeholders in the
     * prepared statement before it is executed.
     * 
     * @return boolean the result of the execute() method, which is either true or false depending on the
     * success of the statement execution.
     */
    public static function delete($sql, $params)
    {
        try {
            $stmt = self::$bdd->prepare($sql);

            //on renvoie l'état du statement après exécution (true ou false)
            return $stmt->execute($params);
        } catch (\Exception $e) {
            echo $sql;
            echo $e->getMessage();
            die();
        }
    }

    /**
     * Cette méthode permet les requêtes de type SELECT
     * 
     * @param string $sql la chaine de caractère contenant la requête elle-même
     * @param mixed $params=null les paramètres de la requête
     * @param bool $multiple=true vrai si le résultat est composé de plusieurs enregistrements (défaut), false si un seul résultat doit être récupéré
     * 
     * @return array|null les enregistrements en FETCH_ASSOC ou null si aucun résultat
     */
    public static function select($sql, $params = null, bool $multiple = true): ?array
    {
        try {
            $stmt = self::$bdd->prepare($sql);
            $stmt->execute($params);

            $results = ($multiple) ? $stmt->fetchAll() : $stmt->fetch();

            $stmt->closeCursor();
            return ($results == false) ? null : $results;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}

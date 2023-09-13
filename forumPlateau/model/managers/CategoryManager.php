<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class CategoryManager extends Manager
{

    protected $className = "Model\Entities\Category";
    protected $tableName = "category";


    public function __construct()
    {
        parent::connect();
    }

    /**
     * The function findOneByName retrieves a category from the database based on its name.
     * 
     * @param string $categoryName The parameter "categoryName" is a string that represents the name of the
     * category you want to find.
     * 
     * @return array the result of the SQL query, which is a single row from the "category" table that
     * matches the given category name.
     */
    public function findOneByName($categoryName)
    {
        $nameCategory = ucfirst($categoryName);
        $sql = 'SELECT *
        FROM category c
        WHERE c.categoryName LIKE "%' . $nameCategory . '%"';

        return $this->getMultipleResults(
            DAO::select($sql, ['categoryName' => $nameCategory], true),
            $this->className
        );
    }
}

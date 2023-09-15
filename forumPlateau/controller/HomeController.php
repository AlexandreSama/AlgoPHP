<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface
{

    /**
     * The index function returns an array with a view path and data containing categories, topics,
     * and messages.
     * 
     * @return array an array is being returned with two keys: "view" and "data". The value of the "view"
     * key is the path to the "home.php" view file. The value of the "data" key is an array
     * containing three keys: "categories", "topics", and "messages". The value of the "categories"
     * key is the result of calling the "findAll" method on
     */
    public function index()
    {
        return [
            "view" => VIEW_DIR . "404.php"
        ];
    }

}

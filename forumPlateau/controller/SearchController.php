<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;

class SearchController extends AbstractController implements ControllerInterface
{

    /**
     * This PHP function searches for a category by name and redirects to the list of topics in that
     * category if found, otherwise it displays an error message and redirects to the forum home page.
     */
    public function index()
    {

        $search = filter_input(INPUT_POST, 'searchInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $categoryManager = new CategoryManager();

        $category = $categoryManager->findOneByName($search);

        if($category != null){
            $this->redirectTo('forum', 'listTopics', $category['id_category']);
        }else{
            Session::addFlash('error', 'Aucune catégorie trouvé a ce nom !');
            $this->redirectTo('forum', 'home');
        }
    }
    
}

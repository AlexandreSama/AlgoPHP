<?php

namespace App;

abstract class AbstractController
{

    public function index()
    {
    }

    /**
     * The function redirects the user to a specified controller, action, and ID in a PHP application.
     * 
     * @param string $ctrl The "ctrl" parameter represents the controller name or the page to redirect to. It
     * is optional and defaults to null.
     * @param string $action The "action" parameter is used to specify the action or method that needs to be
     * executed in the controller. It is typically used in the context of a web application to
     * determine which functionality or operation needs to be performed.
     * @param string $id The "id" parameter is used to specify a specific identifier or key for a resource. It
     * is commonly used in URLs to identify a specific item or record in a database.
     */
    public function redirectTo($ctrl = null, $action = null, $id = null)
    {

        if ($ctrl != "home") {
            $url = $ctrl ? "?ctrl=" . $ctrl : "";
            $url .= $action ? "&action=" . $action : "";
            $url .= $id ? "&id=" . $id : "";
        } else $url = "/";
        header("Location: $url");
        die();
    }

    /**
     * The restrictTo function checks if the user has a specific role and redirects them to the login
     * page if they don't.
     * 
     * @param string $role The role parameter is the role that the user must have in order to access the
     * restricted functionality.
     * 
     * @return void Nothing is being returned.
     */
    public function restrictTo($role)
    {

        if (!Session::getUser() || !Session::getUser()->hasRole($role)) {
            $this->redirectTo("security", "login");
        }
        return;
    }
}

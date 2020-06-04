<?php


namespace framework;


class Router
{


    public $controller;

    public $action;

    public function getRoute()
    {

        $controller = "Site";
        $action = "index";

        // @TODO: modules later
        if (isset($_GET['r'])) {

            $elements = explode('/' , $_GET['r']);
            $controller = $elements[0];
            $action = $elements[1];
        }


        // route rules a route generation
        // a aj iny format a ci aj povoluje
        $this->controller = $controller;
        $this->action = $action;

        return [$controller, $action];
    }


}

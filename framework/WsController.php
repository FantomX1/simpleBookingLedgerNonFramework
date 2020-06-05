<?php


namespace framework;


class WsController
{


    public function __construct()
    {
        $_POST = json_decode($_POST,true);
    }

}

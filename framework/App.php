<?php


namespace framework;


class App
{

    public static $app;
    public $di;



    public function __construct($config)
    {
        $config = $config + $this->defaultServices();


        $this->di = new Di($config);

        static::$app = $this;

    }



    public function run()
    {

        $route = App::$app->di->Router->getRoute();
        $controller = '\controllers\\'.$route[0]."Controller";
        $controller = new $controller();
//        call_user_func(
//            [$controller, "action".$route[1]]
//        );
        return $controller->{"action".$route[1]}();




    }


    private function defaultServices()
    {


        return [
            'Router'=>[
                'class' => Router::class,
            ],
        ];

    }

}

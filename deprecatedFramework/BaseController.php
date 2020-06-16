<?php


namespace deprecatedFramework;


/**
 * Class BaseController
 * @package framework
 */
class BaseController
{


    /**
     * @param $template
     * @param $params
     */
    public function render($template, $params)
    {


        $renderer = new Template($this);

        $renderer->render($template, $params);

    }

}

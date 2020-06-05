<?php


namespace controllers;


use framework\BaseController;

/**
 * Class SiteController
 * @package controllers
 */
class SiteController extends BaseController
{


    /**
     *
     */
    public function actionIndex()
    {


        $this->render(
            "detail",
            [
                'loanId' => '12345',
            ]
        )
        ;
    }

}

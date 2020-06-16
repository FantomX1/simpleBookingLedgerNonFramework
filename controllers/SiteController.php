<?php


namespace controllers;


use  \fantomx1\PhanconX1\BaseController;

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

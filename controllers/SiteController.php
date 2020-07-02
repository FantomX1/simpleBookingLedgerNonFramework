<?php


namespace controllers;


use \fantomx1\PhanconX1\BaseController;
use fantomx1\PhanconX1\Template;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;

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


    /**
     *
     */
    public function actionCreate()
    {

        //$formFactory = Forms::createFormFactory();

        $formFactory = Forms::createFormFactoryBuilder()
            ->addExtension(new HttpFoundationExtension())
            ->getFormFactory();

        $form = $formFactory->createBuilder(FormType::class)
            ->add('client', TextType::class)
            //->add('dueDate', DateType::class)
                ->add('initialAmount', TextType::class)
            ->getForm();



        $twig = $this->di->get('twig');
//        var_dump($twig->render('new.html.twig', [
//            'form' => $form->createView(),
//        ]));



        $request = Request::createFromGlobals();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
//
//            $user = new \Account();
//            $user->setName($newUsername);
//
//            $entityManager->persist($user);
//            $entityManager->flush();


            var_dump($data);
            die();

            // ... perform some action, such as saving the data to the database

//            $response = new RedirectResponse('/task/success');
//            $response->prepare($request);
//
//            return $response->send();
        }





        $path = str_replace(
            ".php",
            '',
            Template::locateTemplate('new.html.twig', $this, true)
        );

        // use symfony forms , echo
        // relative way, to avoid ambiguousity
        // $result =  $twig->render('site/new.html.twig', [
        //$result =  $twig->render('new.html.twig', [

        $result =  $twig->render($path, [
            'form' => $form->createView(),
        ]);

        // wrap the twig result to the layout
        $this->render(
            '',
            [],
            $result
        )
        ;

    }


    public function actionCreateNonTwig()
    {

        $this->render(
            "create",
            [
                'form' => '123'
            ]
        );
    }

}

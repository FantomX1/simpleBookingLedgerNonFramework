<?php


namespace controllers;


use \fantomx1\PhanconX1\BaseController;
use fantomx1\PhanconX1\Template;
use models\entity\Account;
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


        $request = Request::createFromGlobals();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
//


            $account = new Account();
            $account->setInitialAmount($data['initialAmount']);
            $account->setClientName($data['client']);
            $account->setCreatedTs(new \DateTime("now"));

            $this->di->get('entityManager')->persist($account);
            $this->di->get('entityManager')->flush();

            header('Location: ?r=site/index');


//            var_dump($data);
//            die();

        }

        $twig = $this->di->get('twig');

        $path = Template::locateTemplate('new.html.twig', $this, true);
        $path = str_replace(".php", '', $path);

        $result =  $twig->render(
            $path,
            [
                'form' => $form->createView(),
            ]
        );

        // wrap the twig result to the layout
        $this->render(
            '',
            [],
            $result
        );
    }


    public function actionCreateDraftTodo()
    {
        // @TODO: response, request, routing
        // ... perform some action, such as saving the data to the database

//            $response = new RedirectResponse('/task/success');
//            $response->prepare($request);
//
//            return $response->send();
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

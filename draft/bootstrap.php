<?php


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv())->load(__DIR__.'/.env');

// Symfony dependency injection IOC container
//$containerBuilder = new ContainerBuilder();
$containerBuilder = new \fantomx1\PhanconX1\SymfonyContainerBuilderAdapter();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$result = $loader->load('services.yaml');
# to have env vars parsed
$containerBuilder->compile(true);

// load laravel dataaccess layer , database manager, from symfony DI, lazy loading by default
$dbManager = $containerBuilder->get('manager');


//print_r($containerBuilder->get('manager'));

// $results = Manager::select(Manager::raw('select * from users'));

##-------------------------------------

$entityManager = $containerBuilder->get('entityManager');

// workaround for Doctrine enum type
$conn = $entityManager->getConnection();
$conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');


use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\Forms;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\FactoryRuntimeLoader;


use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
//use Symfony\Component\Form\Forms;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;

// creates a Session object from the HttpFoundation component
$session = new Session();

$csrfGenerator = new UriSafeTokenGenerator();
$csrfStorage = new SessionTokenStorage($session);
$csrfManager = new CsrfTokenManager($csrfGenerator, $csrfStorage);

$formFactory = Forms::createFormFactoryBuilder()
    // ...
    ->addExtension(new CsrfExtension($csrfManager))
    ->getFormFactory();


// the Twig file that holds all the default markup for rendering forms
// this file comes with TwigBridge
$defaultFormTheme = 'form_div_layout.html.twig';

$vendorDirectory = realpath(__DIR__.'/../vendor');
// the path to TwigBridge library so Twig can locate the
// form_div_layout.html.twig file
$appVariableReflection = new \ReflectionClass('\Symfony\Bridge\Twig\AppVariable');
$vendorTwigBridgeDirectory = dirname($appVariableReflection->getFileName());
// the path to your other templates
$viewsDirectory = realpath(__DIR__.'/views');

$twig = new Environment(new FilesystemLoader([
    $viewsDirectory,
    $vendorTwigBridgeDirectory.'/Resources/views/Form',
]));
$formEngine = new TwigRendererEngine([$defaultFormTheme], $twig);
$twig->addRuntimeLoader(new FactoryRuntimeLoader([
    FormRenderer::class => function () use ($formEngine, $csrfManager) {
        return new FormRenderer($formEngine, $csrfManager);
    },
]));

// ... (see the previous CSRF Protection section for more information)

// adds the FormExtension to Twig
$twig->addExtension(new FormExtension());

use Symfony\Bridge\Twig\Extension\TranslationExtension;
//use Symfony\Component\Form\Forms;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;

// creates the Translator
$translator = new Translator('en');
// somehow load some translations into it
//$translator->addLoader('xlf', new XliffFileLoader());
//$translator->addResource(
//    'xlf',
//    __DIR__.'/path/to/translations/messages.en.xlf',
//    'en'
//);

// adds the TranslationExtension (it gives us trans filter)
$twig->addExtension(new TranslationExtension($translator));

$formFactory = Forms::createFormFactoryBuilder()
    // ...
    ->getFormFactory();

// creates a form factory
$formFactory = Forms::createFormFactoryBuilder()
    // ...
    ->getFormFactory();


//$containerBuilder->register('adas',$ads);
$containerBuilder->set('twig' , $twig);

// require not require once is not supposed to be called encapsulated inside something else
#require "doctrineBootstrap.php";



########################################################################################################################################

//// Routing.
//$page = 'home';
//if (isset($_GET['p'])) {
//    $page = $_GET['p'];
//}
//
//
//$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
////$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
//
//
//
//$twig = new Twig_Environment($loader, array(
//    'cache' => __DIR__ . '/cache',
//    //'cache' => FALSE,
//    'debug' => TRUE
//));
//$twig->addExtension(new MyExtension());
//$twig->addExtension(new Twig_Extensions_Extension_Text());
//$twig->addGlobal('current_page', $page);
//
//switch ($page) {
//    case 'home':
//        $values = array(
//            'seo' => array(
//                'title' => 'Home page',
//            ),
//            'person' => array(
//                'name' => 'Romain'
//            )
//        );
//        echo $twig->render('home.twig', $values);
//        break;
//    case 'contact':
//        $values = array(
//            'contact' => array(
//                'name' => 'Romain',
//                'email' => 'moro.romain@gmail.com'
//            )
//        );
//        echo $twig->render('contact.twig', $values);
//        break;
//    case 'presentation':
//        echo $twig->render('presentation.twig');
//        break;
//    case 'company':
//        echo $twig->render('company.twig');
//        break;
//    default:
//        header('HTTP/1.0 404 Not Found');
//        echo $twig->render('404.twig');
//        break;
//}

<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 10/04/2017
 * Time: 15:20
 */
use TRIFin\Plugins\AuthPlugin;
use Zend\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;
use TRIFin\ServiceContainer;
use TRIFin\Application;
use TRIFin\Plugins\RouterPlugin;
use TRIFin\Plugins\ViewPlugin;
use TRIFin\Plugins\DbPlugin;

require_once __DIR__.'/../vendor/autoload.php';

/* Container */
$serviceContainer = new ServiceContainer();
/* aplicação */
$app = new Application($serviceContainer);
$app->plugin(new RouterPlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());


//$app->get('/{name}', function (ServerRequestInterface $request) use ($app){
//    $view = $app->service('view.render');
//    return $view->render('test.html.twig',['name' => $request->getAttribute('name')]);
//} );


$app->get('/home/{name}', function (ServerRequestInterface $request){
    $response = new Response();
    $response->getBody()->write("response com emiter do diactores");
    return $response;
} );


require_once __DIR__.'/../src/controllers/category-costs.php';
require_once __DIR__.'/../src/controllers/users.php';
require_once __DIR__.'/../src/controllers/auth.php';



$app->start();

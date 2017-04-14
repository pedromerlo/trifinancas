<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 19:14
 */

Declare(strict_types=1);
namespace TRIFin\Plugins;


use Aura\Router\RouterContainer;


use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use TRIFin\ServiceContainerInterface;
use Zend\Diactoros\ServerRequestFactory;

/**
 * Class RouterPlugin
 * @package TRIFin\Plugins
 */
class RouterPlugin implements PluginInterface
{

    /**
     * @param ServiceContainerInterface $container
     * @return mixed
     */
    public function register(ServiceContainerInterface $container)
    {
        $routerConteiner = new RouterContainer();
        /* Registrar as rotas da aplicação */
        $map=$routerConteiner->getMap();
        /* Identificar qual a rota que está sendo acessada */
        $matcher = $routerConteiner->getMatcher();
        /* Gera links com base nas rotas registradas */
        $generator = $routerConteiner->getGenerator();
        $request = $this->getRequest();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class,$request);
        $container->addLazy('route', function (ContainerInterface $container){
            $matcher= $container->get('routing.matcher');
            $request = $container->get(RequestInterface::class);
            return $matcher->match($request);

        });


    }

    /**
     * @return RequestInterface
     */
    protected function getRequest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER,$_GET, $_POST, $_COOKIE, $_FILES
        );

    }
}
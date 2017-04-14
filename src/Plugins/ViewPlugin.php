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
use TRIFin\View\ViewRender;
use Zend\Diactoros\ServerRequestFactory;

/**
 * Class RouterPlugin
 * @package TRIFin\Plugins
 */
class ViewPlugin implements PluginInterface
{

    /**
     * @param ServiceContainerInterface $container
     * @return mixed
     */
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container){
            $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../templates');
            $twig  = new \Twig_Environment($loader);

            //Sobrescrer o twig para gerar a função de geração de rotas
            $generator = $container->get('routing.generator');
            $twig->addFunction(new \Twig_SimpleFunction('route',
                function (string $name, array $params=[]) use($generator){
                   return $generator->generate($name, $params);
            }));

            return $twig;
        });

        $container->addLazy('view.renderer', function (ContainerInterface $container){
            $twigEnviroment =  $container->get('twig');
            return new ViewRender($twigEnviroment);
        });
    }


}
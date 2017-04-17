<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 19:14
 */

Declare(strict_types=1);
namespace TRIFin\Plugins;


use Interop\Container\ContainerInterface;
use TRIFin\ServiceContainerInterface;
use TRIFin\Auth\Auth;

/**
 * Class RouterPlugin
 * @package TRIFin\Plugins
 */
class AuthPlugin implements PluginInterface
{

    /**
     * @param ServiceContainerInterface $container
     * @return mixed
     */
    public function register(ServiceContainerInterface $container)
    {
       $container->addLazy('auth', function (ContainerInterface $container){
           return new Auth();
       });

    }


}
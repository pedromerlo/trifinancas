<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 18:58
 */

namespace TRIFin\Plugins;


use TRIFin\ServiceContainerInterface;

/**
 * Interface PluginInterface
 * @package TRIFin\Plugins
 */
interface PluginInterface
{
    /**
     * @param ServiceContainerInterface $container
     * @return mixed
     */
    public function register(ServiceContainerInterface $container);
}
<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 18:35
 */

namespace TRIFin;


use Xtreamwayz\Pimple\Container;

class ServiceContainer implements ServiceContainerInterface
{
    private $container;

    /**
     * ServiceContainer constructor.
     * @param $container
     */
    public function __construct()
    {
        $this->container = new Container();
    }

    /**
     * Adiciona o serviço
     * @param string $name - nome do serviço
     * @param $servico - o serviço
     * @return mixed
     */
    public function add(string $name, $servico)
    {
        $this->container[$name]= $servico;
    }

    /**
     * Adiciona um serviço
     * @param string $name
     * @param callable $callable
     * @return mixed
     */
    public function addLazy(string $name, callable $callable)
    {
        $this->container[$name] = $this->container->factory($callable);
    }

    /**
     * Recupera um serviço
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        return $this->container->get($name);
    }

    /**
     * Verifica existencia do serviço
     * @param string $name
     * @return mixed
     */
    public function has(string $name)
    {
        return $this->container->has($name);
    }
}
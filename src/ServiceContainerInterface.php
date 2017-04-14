<?php

declare(strict_types=1);
namespace TRIFin;

/**
 * Interface ServiceContainerInterface
 * @package TRIFin
 * Interface para Container de serviços
 */
interface ServiceContainerInterface
{
    /**
     * Adiciona o serviço
     * @param string $name - nome do serviço
     * @param $servico - o serviço
     * @return mixed
     */
    public function add(string $name, $servico);

    /**
     * Adiciona um serviço
     * @param string $name
     * @param callable $callable
     * @return mixed
     */
    public function addLazy(string $name , callable $callable);

    /**
     * Recupera um serviço
     * @param string $name
     * @return mixed
     */
    public function get(string $name);

    /**
     * Verifica existencia do serviço
     * @param string $name
     * @return mixed
     */
    public function has(string $name);

}
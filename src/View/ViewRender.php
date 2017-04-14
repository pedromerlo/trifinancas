<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 10/04/2017
 * Time: 19:12
 */

namespace TRIFin\View;


use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ViewRender implements ViewRenderInterface
{

    /**
     * @var \Twig_Environment
     */
    private $twigEnviroment;
    /**
     * ViewRender constructor.
     */
    public function __construct(\Twig_Environment $twigEviroment)
    {
        $this->twigEnviroment = $twigEviroment;
    }

    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnviroment->render($template , $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }
}
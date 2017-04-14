<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 18:46
 */
declare(strict_types=1);
namespace TRIFin;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TRIFin\Plugins\PluginInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\Response\SapiEmitter;

class Application
{
    private $serviceContainer;

    /**
     * Application constructor.
     * @param $serviceContainer
     */
    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;

    }

    /**
     * @param $name
     * @return mixed
     */
    public function service($name){

        return $this->serviceContainer->get($name);
    }

    /**
     * @param string $name
     * @param $service
     */
    public function addService(string  $name, $service):void {
        if(is_callable($service)){
            $this->serviceContainer->addLazy($name, $service);
        }else{
            $this->serviceContainer->add($name, $service);
        }
    }

    /**
     * @param PluginInterface $plugin
     */
    public function plugin(PluginInterface $plugin):void {
        $plugin->register($this->serviceContainer);

    }

    /**
     * @param $path
     * @param $action
     * @param null $name
     * @return Application
     */
    public function post($path, $action, $name = null):Application
    {
        $routing = $this->service('routing');

        $routing->post($name, $path, $action);

        return $this;
    }

    public function get($path, $action, $name = null):Application
    {
        $routing = $this->service('routing');

        $routing->get($name, $path, $action);

        return $this;
    }

    public function redirect($path){
        return new RedirectResponse($path);
    }

    public function route(string $name, array $params =[]){
        //Sobrescrer o twig para gerar a função de geração de rotas
        $generator = $this->service('routing.generator');
        $path = $generator->generate($name , $params);
        return $this->redirect($path);
    }

    public function start(){
        $route = $this->service('route');

        /** @var ServerRequestInterface $request */
        $request = $this->service(RequestInterface::class);


        /* Pagina Inexistente */
        if(!$route){
            echo "Page not found";
            exit;
        }

        foreach ($route->attributes as $key =>$value){
            $request = $request->withAttribute($key, $value);
        }

        $callable = $route->handler;
        $response =  $callable($request);
        $this->emitResponse($response);
    }

    protected function emitResponse(ResponseInterface $response)
    {
        $emitter = new SapiEmitter();
        $emitter->emit($response);

    }
}
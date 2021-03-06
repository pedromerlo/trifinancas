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
use TRIFin\Models\BillPay;
use TRIFin\Models\BillRecive;
use TRIFin\Models\CategoryCost;
use TRIFin\Models\User;
use TRIFin\Repository\RepositoyFactory;
use TRIFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class RouterPlugin
 * @package TRIFin\Plugins
 */
class DbPlugin implements PluginInterface
{

    /**
     * @param ServiceContainerInterface $container
     * @return mixed
     */
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__.'/../../config/db.php';
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();
        $container->add('repository.factory', new RepositoyFactory());
        $container->addLazy('category-costs.repository',function (ContainerInterface $container ){
            return $container->get('repository.factory')->factory(CategoryCost::class);
        });
        $container->addLazy('bill-recives.repository',function (ContainerInterface $container ){
            return $container->get('repository.factory')->factory(BillRecive::class);
        });
        $container->addLazy('bill-pays.repository',function (ContainerInterface $container ){
            return $container->get('repository.factory')->factory(BillPay::class);
        });
        $container->addLazy('user.repository',function (ContainerInterface $container ){
            return $container->get('repository.factory')->factory(User::class);
        });


    }


}
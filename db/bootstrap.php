<?php


/* Container */
use TRIFin\Application;
use TRIFin\Plugins\AuthPlugin;
use TRIFin\Plugins\DbPlugin;
use TRIFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
/* aplicação */
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;
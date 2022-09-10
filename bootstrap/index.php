<?php
    // https://github.com/slimphp/Slim/blob/4.x/README.md
    use DI\Container;
    use Slim\Factory\AppFactory;
    require __DIR__ . '/../vendor/autoload.php';

    $container = new Container;
    $settings = require __DIR__ . '/../app/settings.php';
    $settings($container);
    AppFactory::setContainer($container);
    $app = AppFactory::create();
    $middleware = require __DIR__ . '/../app/middleware.php';
    $middleware($app);

    // Add Routing Middleware
    $app->addRoutingMiddleware();

    $routes = require __DIR__ . '/../app/routes.php';
    $routes($app);

    // Run app
    $app->run();

?>

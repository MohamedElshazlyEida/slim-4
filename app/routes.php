<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Jenssegers\Blade\Blade;
return function (App $app)
    {
        function view(Response $response, $template, $with = [])
        {
            $cache = __DIR__ . '/../cache';
            $view = __DIR__ . '/../resources/views';
            $blade = (new Blade($view, $cache))->make($template, $with);
            $response->getBody()->write($blade->render());
            return $response;
        }
        $app->get('/home', function (Request $request, Response $response, $parameters)
        {
            return view($response, 'auth.home');
        });
        $app->get('/', function (Request $request, Response $response, $parameters)
        {
            $response->getBody()->write('Hello World');
            return $response;
        });
    }
?>

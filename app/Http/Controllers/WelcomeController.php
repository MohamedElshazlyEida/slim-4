<?php
namespace App\Http\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WelcomeController
{
    public function index(Request $request, Response $response)
    {
        $response->getBody()->write('Hello from welcome controller ');
        return $response;
    }
    public function show(Request $request, Response $response, $name)
    {
        $response->getBody()->write("Hello from welcome controller {$name}");
        return $response;
    }
}

?>

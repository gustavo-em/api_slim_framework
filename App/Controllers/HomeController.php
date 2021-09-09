<?php

namespace App\Controllers;

use App\DAO\LojasDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeController
{
    public function pagina_login(Request $request, Response $response, array $args): Response
    {
        
        $view = new \Slim\Views\PhpRenderer('App/Views/');
        $view->setLayout("template/header.php");
        $response = $view->render($response, 'home/home.php', [

        ]);
        return $response;
    }
}
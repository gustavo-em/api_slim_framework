<?php

namespace App\Controllers;

use App\DAO\LojasDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
//use Psr\Http\Message\StreamInterface;

final class ProdutoController
{
    public function getProducts(Request $request, Response $response, array $args): Response  
    {
        
        $lojaDAO = new LojasDAO();
        $lojas = $lojaDAO->teste();

        $a = $request->getHeaders();

        $outro = $request->getCookieParams();

        $outro_request = $request->getParsedBody();

        $view = new \Slim\Views\PhpRenderer('App/Views/');
        $view->setLayout("template/header.php");
        $response = $view->render($response, 'index.php', [
            'lojas'=>$lojas,
            'a'=>$a,
            'request'=>$outro_request
        ]);

        return $response;
    }


    public function getProdutos(Request $request, Response $response, array $args): Response  
    {
        $response->getBody()->write(json_encode(['n'=>'gus']));
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response;
    }
    public function insertProdutos(Request $request, Response $response, array $args): Response  
    {
        return $response;
    }
    public function updateProdutos(Request $request, Response $response, array $args): Response  
    {
        return $response;
    }
    public function deleteProdutos(Request $request, Response $response, array $args): Response  
    {
        return $response;
    }

}

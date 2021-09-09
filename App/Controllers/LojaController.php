<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\DAO\LojasDAO;

use App\Models\LojasModel;

//use App\Model\LojaModel;

final class LojaController
{
    public function getLojas(Request $request, Response $response, array $args)
    {

        $lojasDAO = new LojasDAO();
        $lojas = $lojasDAO->getAllLojas();

        $get = $request->getQueryParams();



        $response->getBody()->write(json_encode($get));
        
        $response = $response->withHeader('Content-Type', 'application/json');

        return $response;
    }

    public function insertLojas(Request $request, Response $response, array $args)
    {
        //Pegando dados
        $data = $request->getParsedBody();

        //Objeto DAO
        $lojaDAO = new LojasDAO();

        //Objeto Loja
        $lojaModel = new LojasModel();

        //Validação dados
        /* if(!isset($data['nome']) || !$data['telefone']){
            $response = $response->getBody()->write(json_encode(['msg'=>'Nome ou telefone invalido']));
            return $response;
        }
        //Setando valores
        $lojaModel->setNome($data['nome']);
        $lojaModel->setTelefone($data['telefone']);
        
        $lojaDAO->insertLoja($lojaModel); */

        //$response = $response->getBody()->write(json_encode(['msg'=>'Loja inserida com sucesso']));

        $view = new \Slim\Views\PhpRenderer('App/Views/');
        $view->setLayout('template/header.php');
        $response = $view->render($response, '/loja/index.php');
        
        return $response;
    }

    public function updateLojas(Request $request, Response $response, array $args)
    {
        return $response;
    }

    public function deleteLojas(Request $request, Response $response, array $args)
    {
        return $response;   
    }

}
<?php

use App\Controllers\HomeController;
use App\Controllers\ProdutoController;
use App\Controllers\LojaController;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use function src\slimConfiguration;

$app = new \Slim\App(slimConfiguration());

$container = $app->getContainer();

$container['pdo'] = function($c){
    $host = getenv('MYSQL_HOST');
    $port = getenv('MYSQL_PORT');
    $user = getenv('MYSQL_USER');
    $pass = getenv('MYSQL_PASSWORD');
    $db_name = getenv('MYSQL_DBNAME');

    $dsn = "mysql:host={$host};dbname={$db_name};port={$port}";

    $pdoo = new \PDO($dsn, $user, $pass);
    $pdoo->setAttribute(
        \PDO::ATTR_ERRMODE,
        \PDO::ERRMODE_EXCEPTION
    );
    return $pdoo;
};

$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('App/Views/');
};

// ---Rotas



$middleAuth = function(Request $request, Response $response, $next){
    session_start();

    //var_dump($_SESSION);

    $dados = $request->getQueryParams();
    //var_dump($dados);

    if(isset($dados['a'])){
        if($dados['a'] == 'z')
        $_SESSION['login'] = 'z';
    }
    //$_SESSION['login'] = 'A';
    if(!isset($_SESSION['login'])){
        header("location: http://localhost:9000/home");
        $view = new \Slim\Views\PhpRenderer('App/Views/');
        $view->setLayout("template/header.php");
        $response = $view->render($response, 'template/login.php', []);
    } else {
        $response = $next($request, $response); 
    }

    return $response;
};

$app->group('', function() use($app){
    $app->get('/p', ProdutoController::class.':getProducts');
 
    $app->get('/t', function(Request $request, Response $response, array $args){
        $response = $this->view->render($response, 'index.html', []);
        return $response;
    });
    $app->get('/home', HomeController::class.':pagina_login');




    $app->get('/loja/', LojaController::class.':getLojas');
    $app->post('/loja', LojaController::class.':insertLojas');
    $app->put('/loja', LojaController::class.':updateLojas');
    $app->delete('/loja', LojaController::class.':deleteLojas');
    
    $app->get('/produto', ProdutoController::class.':getProdutos');
    $app->post('/produto', ProdutoController::class.':insertProdutos');
    $app->put('/produto', ProdutoController::class.':updateProdutos');
    $app->delete('/produto', ProdutoController::class.':deleteProdutos');
    
})->add($middleAuth);


// ---

$app->run();
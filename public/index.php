<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


use dao\Connexion;
use dao\ProduitDao;
use Entite\Produit;

require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();
$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);


$app->get('/api/products', function (Request $request, Response $response, $args) {
    $connexion = new Connexion();
    $dao = new ProduitDao();
    
    
    $data = $dao->findAll();
    $body = json_encode($data);
    $response->getBody()->write($body);

return $response;
});

$app->get('/api/{id:[0-9]+}', function (Request $request, Response $response, $args) {

    $connexion = new Connexion();
    $dao = new ProduitDao();
    
    
    $data = $dao->findById($args['id']);
    $body = json_encode($data);
    $response->getBody()->write($body);

return $response;
});

$app->post('/api/add', function (Request $request, Response $response, $args) {

    $connexion = new Connexion();
    
    $produitDao = new ProduitDao();
    $produit = new Produit();
    $data = $request->getParsedBody();
  
    

    $produit->setNom($data['nom']);
$produit->setDescription($data['description']);
$produit->setPrix($data['prix']);
$produit->setDate_creation(date('Y-m-d') );
  $result = $produitDao->create($produit);

    
    $body = json_encode(date('Y-m-d'));
    $response->getBody()->write($body);

return $response;
});

$app->run();
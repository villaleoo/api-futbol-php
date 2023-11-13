<?php 
require_once './router/Router.php';
require_once './app/controllers/TeamApiController.php';
require_once './app/controllers/LeagueApiController.php';

/*LINEA AGREGADA PARA QUE SEA POSIBLE CONSUMIR LA API DESDE CUALQUIER DISPOSITIVO*/
/*QUITAR ESTA LINEA NO INFLUYE EN EL FUNCIONAMIENTO DE POSTMAN */
header("Access-Control-Allow-Origin: *");

$router= new Router();

                /* resource(recurso), metodo http, controlador, metodoDelControlador*/
$router->addRoute('clubes','GET','TeamApiController','getAllResources');
$router->addRoute('clubes','POST','TeamApiController','addResource');
$router->addRoute('clubes/:id','GET','TeamApiController','getResource');
$router->addRoute('clubes/:id','PUT','TeamApiController','updateResource');
$router->addRoute('clubes/:id', 'DELETE', 'TeamApiController','deleteResource');
$router->addRoute('ligas','GET', 'LeagueApiController', 'getAllResources');
$router->addRoute('ligas/:id','GET','LeagueApiController','getResource');
$router->addRoute('ligas/:id/:subr','GET','LeagueApiController','getResource');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>
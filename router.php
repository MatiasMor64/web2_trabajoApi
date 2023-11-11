<?php
    require_once 'libs/router.php';
    require_once 'app/controller/Productos.Api.Controller.php';

    $router = new Router();
    //                 endpoint     verbo      controller                metodo
    $router->addRoute('Productos',     'GET',    'ProductosApiController', 'get'           );
    $router->addRoute('Productos',     'POST',   'ProductosApiController', 'create'        );
    $router->addRoute('Productos/:ID', 'GET',    'ProductosApiController', 'get'           );
    $router->addRoute('Productos/:ID', 'DELETE', 'ProductosApiController', 'eraseproductos');
    $router->addRoute('Productos/Orden/:ORDER',  'GET',    'ProductosApiController', 'ObtenerOrdenado');

    $router ->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

        


?>
<?php
    require_once 'libs/router.php';
    require_once 'app/controller/Productos.Api.Controller.php';

    $router = new Router();
    //                 endpoint     verbo      controller                metodo
    $router->addRoute('tareas',     'GET',    'ProductosApiController', 'get'           );
    $router->addRoute('tareas',     'POST',   'ProductosApiController', 'create'        );
    $router->addRoute('tareas/:ID', 'GET',    'ProductosApiController', 'get'           );
    $router->addRoute('tareas/:ID', 'DELETE', 'ProductosApiController', 'eraseproductos');


    $router ->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

        


?>
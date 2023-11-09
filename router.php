<?php
    require_once 'libs/router.php';
    require_once 'app/controller/Task.Api.Controller.php';

    $router = new Router();
    //                 endpoint     verbo      controller          metodo
    $router->addRoute('tareas',     'GET',    'TaskApiController', 'get');
    $router->addRoute('tareas/:ID', 'GET',    'TaskApiController', 'get');
    $router->addRoute('tareas/:ID', 'DELETE', 'TaskApiController', 'borrar_productos');


    $router ->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

        


?>
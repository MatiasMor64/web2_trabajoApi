<?php
    require_once 'libs/router.php';
    require_once 'app/controller/Productos.Api.Controller.php';

    $router = new Router();
    //                 endpoint                  verbo      controller                metodo
    $router->addRoute('Productos',                 'GET',    'ProductosApiController', 'get'            );
    $router->addRoute('Productos/:ID',             'GET',    'ProductosApiController', 'get'            );
    $router->addRoute('Productos/Orden/:ORDER',    'GET',    'ProductosApiController', 'ObtenerOrdenado');
    $router->addRoute('Productos',                 'POST',   'ProductosApiController', 'create'         );
    $router->addRoute('Productos/:ID',             'DELETE', 'ProductosApiController', 'eraseproductos' );
    $router->addRoute('Productos/:ID',             'PUT',    'ProductosApiController', 'modify'         );
    $router->addRoute('Productos/:ID/:subrecurso', 'GET',    'ProductosApiController', 'get'            );
    $router->addRoute('Categorias/:ID',            'GET',    'ProductosApiController', 'getbycat'       );
    $router->addRoute('Categorias',                'GET',    'ProductosApiController', 'getbycat'       );

    
    $router ->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

        
/*Objeto de ejemplo para postear productos:
    {
    "Producto": "manta invisible",
    "Imagen": "https://media.biobiochile.cl/wp-content/uploads/2019/06/img_cfaneca_20170118-121945_imagenes_md_otras_fuentes_170118_harry_potter_capa_invisibilidad-kwc-u413464598686fod-980x554mundodeportivo-web.jpg",
    "Precio": 10000,
    "Categoria": "Harry Potter",
    "Descripcion": "esta descripcion no es invisible, a diferencia de la manta"
    } 
*/

?>
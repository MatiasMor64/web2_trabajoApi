<?php
    require_once 'app/controller/api.controller.php';
    require_once 'app/model/apiModel.php';
    require_once 'app/view/apiView.php';
    class ProductosApiController extends controller{
        private $model;

        public function __construct(){
            parent::__construct();
            $this->model = new apiModel();
        }

        function get($params = []){
            if(empty($params)){                   
                $productos = $this->model->getAll();
                $this -> view ->response($productos, 200);
            } else {
                $id = $params[':ID'];
                $producto = $this->model->get($id);
                if(!empty($producto)){
                    if(isset($params[':subrecurso'])) {
                        switch ($params[':subrecurso']) {
                            case 'Producto':
                                $this->view->response($producto->Producto, 200);
                            break;
                            case 'Imagen':
                                $this->view->response($producto->Imagen, 200);
                            break;
                            case 'Precio':
                                $this->view->response($producto->Precio, 200);
                            break;
                            case 'Categoria':
                                $this->view->response($producto->Categoria, 200);
                            break;
                            case 'Descripcion':
                                $this->view->response($producto->Descripcion, 200);
                            break;
                            
                            default:
                                $this->view->response(
                                'El producto no contiene '.$params[':subrecurso'].'.', 404);
                            break;
                        }
                    } else {
                        $this -> view ->response($producto, 200);
                    }
                }  else {
                    $this -> view ->response('el producto de id '.$id.' no existe.', 404);
                }
            } 
           
        }
        function eraseproductos($params = []) {
            $id = $params[':ID'];
            $tarea = $this->model->get($id);
            if($tarea){
                $this->model->delete($id);
                $this -> view ->response('el producto de id '.$id.' fue borrado con exito!', 200);
            } else{
                $this -> view ->response('el producto de id '.$id.' no existe', 404);
            }
        }
        function create($params= []){
            $body = $this->datos_producto();
            $Producto= $body->Producto;
            $Imagen= $body->Imagen;
            $Precio= $body->Precio;
            $Categoria= $body->Categoria;
            $Descripcion= $body->Descripcion;

            $id = $this->model->insertar_datos($Producto,$Imagen,$Precio,$Categoria,$Descripcion);
            $this -> view -> response('El producto de id '.$id.' ha sido registrado correctamente!', 201);
        }

        function modify($params= []) {
            $id = $params[':ID'];
            $producto = $this->model->get($id);
            if($producto){
                $body = $this->datos_producto();
                $Producto= $body->Producto;
                $Imagen= $body->Imagen;
                $Precio= $body->Precio;
                $Categoria= $body->Categoria;
                $Descripcion= $body->Descripcion;
                $this->model->actualizar_datos($id, $Producto, $Imagen, $Precio, $Categoria, $Descripcion);
            
                $this -> view -> response('El producto de id '. $id .' fue modificado correctamente!', 201);
            } else {
                $this -> view -> response('El producto '. $id .' no existe', 404);
            }
        }
        
        function ObtenerOrdenado($params=[]){
            $orden =$params[':ORDER'];
            switch ($params[':ORDER']) {
                case 'asc':
                    $productos=$this->model->ObtenerProductosOrdenados($orden);
                    $this->view->response($productos, 200);
                break;
                case 'desc':
                    $productos=$this->model->ObtenerProductosOrdenados($orden);
                    $this->view->response($productos, 200);
                break;

                default:
                    $this->view->response('Parametro no reconocido', 400);
                break;
            }
        }

        function getbycat($params= []){
            if(empty($params)){
                $this -> view ->response('No se aplicó un valor', 400);
            } else {
                if (isset($params[':ID'])){
                    $id= $params[':ID'];
                    $productos= $this->model->ObtenerProductosPorCategoria($id);
                    if(($productos==false)){
                        $this -> view ->response('El valor '. $id .' no contiene productos' , 404);
                    } else {
                        $this -> view ->response($productos, 200);
                    }
                }
            }
        }
    }


    /*Objeto de ejemplo para postear productos:
    {
    "Producto": "manta invisible",
    "Imagen": "https://media.biobiochile.cl/wp-content/uploads/2019/06/img_cfaneca_20170118-121945_imagenes_md_otras_fuentes_170118_harry_potter_capa_invisibilidad-kwc-u413464598686fod-980x554mundodeportivo-web.jpg",
    "Precio": 10000,
    "Categoria": "Harry Potter",
    "Descripcion": "esta descripcion no es invisible, a diferencia de la manta"
} */
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
                $tareas = $this->model->getAll();
                $this -> view ->response($tareas, 200);
            } else {
                $tarea = $this->model->get($params[':ID']);
                if(!empty($tarea)){
                    $this -> view ->response($tarea, 200);
                } else {
                    $this -> view ->response(['msg' => 'la tarea con la id '.$params[':ID'].' no existe.'], 404);

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
            $this -> view -> response('El producto de id '.$id.' ha sido registrado correctamente!',201);
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
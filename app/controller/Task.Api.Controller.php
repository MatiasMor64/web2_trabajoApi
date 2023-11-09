<?php
    require_once 'app/model/apiModel.php';
    require_once 'app/view/apiView.php';
    class TaskApiController {
        private $view;
        private $model;

        public function __construct(){
            $this->model = new apiModel();
            $this->view = new apiView();
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
                    $this -> view ->response(['msg' => 'la tarea con la id= '.$params[':ID'].' no existe.'], 404);

            }
        }
    }


    }
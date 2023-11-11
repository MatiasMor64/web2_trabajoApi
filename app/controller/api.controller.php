<?php
    require_once 'app/view/apiView.php';
    abstract class controller {
        protected $view;
        private $datos;

        public function __construct(){

            $this->view = new apiView();
            $this->datos = file_get_contents('php://input');
        }

        function datos_producto(){
            return json_decode($this->datos);
        }
    }

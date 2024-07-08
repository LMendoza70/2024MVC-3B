<?php
    //inclumos el documento de alumnoModel.php a este controlador 
    //para poder gener una instancia de este 
    include_once("app/model/alumnoModel.php");
    class alumnoController{
        //generamos un atributo de la case que instancie a un objeto de alumno model
        private $alumno;

        public function index(){
            //instanciamosa nuestro modelo
            $this->alumno= new alumnoModel();
            //declaramos la variable datos que contendra la listade alumnos 
            $datos= $this->alumno->getAll();
            //en una variable llmada $vista definimos la ruta de la parte central de la plnatilla en la que 
            //se mostrara la informacion solicitada 
            $vista="app/view/admin/alumnos/alumnosIndexView.php";
            //incluimos la plantilla de administrador 
            include_once("app/view/admin/plantillaAdminView.php");
        }

        public function callInsertForm(){
            $vista="app/view/admin/alumnos/insertForm.php";
            include_once("app/view/admin/plantillaAdminView.php");
        }

        public function insert(){
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                //generamos las variables 
                $nombre=$_POST['nombre'];

            }
        }



        public function delete($id){

        }

    }
?>
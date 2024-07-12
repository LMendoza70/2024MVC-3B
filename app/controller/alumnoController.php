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
                
                $alumno= array(
                    'nombre'=>$_POST['nombre'],
                    'apellido'=>$_POST['apellido'],
                    'edad'=>$_POST['edad'],
                    'correo'=>$_POST['correo'],
                    'fecha'=>$_POST['fecha']
                );

                if(!isset($alumno['nombre'],$alumno['apellido'],$alumno['edad'],$alumno['correo'],$alumno['fecha'])){
                    header("location:http://localhost/php-3b");   
                }

                $this->alumno= new alumnoModel();
                $resultado= $this->alumno->insert($alumno);
                if($resultado){
                    header("location:http://localhost/php-3b/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3b");
                }
            }
        }

        public function callEdditForm(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $id=$_GET['id'];
                $this->alumno= new alumnoModel();
                $data=$this->alumno->getById($id);
                $vista="app/view/admin/alumnos/edditForm.php";
                include_once("app/view/admin/plantillaAdminView.php");
            }
        }

        public function eddit(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $data=array(
                    'id'=>$_POST['id'],
                    'nombre'=>$_POST['nombre'],
                    'apellido'=>$_POST['apellido'],
                    'edad'=>$_POST['edad'],
                    'correo'=>$_POST['correo'],
                    'fecha'=>$_POST['fecha'],
                );
                $this->alumno=new alumnoModel();
                $respuesta= $this->alumno->eddit($data);
                if($respuesta){
                    header("location:http://localhost/php-3b/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3b");
                }
            }
        }

        public function delete(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $id=$_GET['id'];
                $this->alumno= new alumnoModel();
                $respuesta=$this->alumno->delete($id);
                if($respuesta){
                    header("location:http://localhost/php-3b/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3b");
                }
            }
        }

    }
?>
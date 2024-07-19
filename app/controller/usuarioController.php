<?php
include_once("app/model/usuarioModel.php");
class usuarioController{
    private $usuario;

    public function callloginForm(){
        session_start();
        $vista="app/view/admin/loginFormView.php";
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
            
            include_once("app/view/admin/plantillaAdminView.php");
        }else{
            include_once("app/view/admin/plantilla2AdminView.php");
        }
        
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $user=$_POST['user'];
            $password=$_POST['password'];
            $this->usuario=new usuarioModel();
            $respuesta=$this->usuario->getCredentials($user,$password);
            if($respuesta){
                include_once("app/controller/alumnoController.php");
                $alumno=new alumnoController();
                session_start();
                $_SESSION['logedin']=true;
                $_SESSION['nombre']=$respuesta['nombre'];
                $alumno->index();
            }else{
                $vista="app/view/admin/errorView.php";
                include_once("app/view/admin/plantilla2AdminView.php");
            }
        }
    }

    public function logedout(){
        session_start();
        $_SESSION['logedin']=false;
        header("location:http://localhost/php-3b");
    }
}
?>
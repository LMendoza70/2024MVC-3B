<?php
    class defaultController{
        private $vista;

        public function index(){
            session_start();
            $vista="app/view/admin/homeAdminView.php";
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                include_once("app/view/admin/plantillaAdminView.php");
            }else{
                include_once("app/view/admin/plantilla2AdminView.php");
            }
            
        }

        /*public function error(){

        }*/
    }
?>
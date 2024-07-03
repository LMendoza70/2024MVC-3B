<?php
    class defaultController{
        private $vista;

        public function index(){
            $vista="app/view/admin/homeAdminView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        }
    }
?>
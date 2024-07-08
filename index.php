<?php
//como vamos a ocupar este archivo 
//ruta : localhost/php-3b/
//le asignamos dos variables C= controlador al que vamos a accder M= metodo al vamos a acceder 
//rita final : localhost/php-3b?C=alumnoController&M=index

//definimos una constante para ir armando la ruta de los controladores
define("controlador","app/controller/");

//definimos si en la ruta recibi un controlador 
$control = isset($_GET['C'])?$_GET['C']:'';
//armamos la ruta del controlador 
$ruta=controlador. $control . ".php"; //"app/controller/alumnoController.php"

//verificamos la existencia del archivo generado en la ruta
if(is_file($ruta)){
    require_once($ruta);
    $objeto= new $control();

    $metodo= isset($_GET['M'])?$_GET['M']:'';

    if(method_exists($objeto,$metodo)){
        $objeto -> $metodo(); 
    }else{
        require_once("app/controller/defaultController.php");
        $default=new defaultController();
        $default->index();    
    }

}else{
    require_once("app/controller/defaultController.php");
    $default=new defaultController();
    $default->index();
}

?>
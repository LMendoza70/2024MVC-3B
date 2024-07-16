<?php
    
    class usuarioModel{
        //definimos un atributo para estar llmando a la coneccion a la base de datos 
        private $Connection;

        //definimos nuestro contructor en el vamos a conectar con la base de datos 
        public function __construct()
        {
            //requerimos al archivo de coneccion a la base de datos 
            require_once("app/config/DBConnection.php");
            //creamos la instancia xde nuestra coneccion 
            $this->Connection= new DBConnection();
        }

        public function getCredentials($user,$password){
            $consulta="SELECT * FROM usuarios WHERE correo_electronico='$user' AND contrasena='$password'";
            $coneccion=$this->Connection->getConnection();
            $resultado=$coneccion->query($consulta);
            $respuesta=$resultado->num_rows>=1?$resultado->fetch_assoc():false;
            $this->Connection->closeConnection();
            return $respuesta;
        }

    }
?>
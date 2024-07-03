<?php
    class DBConnection{
        //definimos el atributo de coneccion a nuestra base de datos 
        private $Connection;
        
        //definimos el contructor de la clase y en el hacemos el proceso de coneccion
        public function __construct()
        {
            //traemos las constantes para utlizarlas 
            require_once("app/config/config.php");
            //creamos la coneccion a la base de datos 
            $this->Connection= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            //verificamos que la coneccion se haya echo correctamenete
            if($this->Connection->connect_error){
                die("Error de coneccion a la base de datos : descripcion... ". $this->Connection->connect_error);
            }
        }

        //el metodo getconnection nos retornara la coneccion a la base de datos 
        //lo vamnos a ocupar cara que obtengamos informacion de la base de datos 
        public function getConnection(){
            return $this->Connection;
        }

        //el metodo closeConnection nos va a permitir cerrar la coneccion a la base de dastos 
        //lo utilizaremos una vez que hayamos obtenido la informacion de la DB
        public function closeConnection(){
            $this->Connection->close();
        }
    }
?>
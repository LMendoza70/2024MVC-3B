<?php
//esta clase me va a permir manipular la tabla alumnos de mi DB
    class alumnoModel{
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

        //definimos un metodo para llmar a todos mis alumnos 6pasos
        public function getAll(){
            //paso 1: creamos la consulta a la base de datos 
            $consulta="SELECT * FROM alumnos";
            //paso 2: Conectamos con la base de datos 
            $coneccion= $this->Connection->getConnection();
            //paso 3: ejecutamos la consulta 
            $resultado = $coneccion->query($consulta);
            //paso 4: preparamos la respuesta de nuestra consulta 
            //creo un arreglo para manipular cada registro de los alumnos 
            $alumnos=array();
            //recorremos el dataset para almacenar en $alumnos alumno por alumno
            while($alumno= $resultado->fetch_assoc()){
                $alumnos[]=$alumno;
            }
            //paso 5: cerramos la coneccion a la base de datos 
            $this->Connection->closeConnection();
            //paso 6: retornar el resultado
            return $alumnos;
        }

        public function getById($id){
            //paso 1: creamos la consulta a la base de datos 
            $consulta="SELECT * FROM alumnos WHERE id_alumno=".$id;
            //paso 2: Conectamos con la base de datos 
            $coneccion= $this->Connection->getConnection();
            //paso 3: ejecutamos la consulta 
            $resultado = $coneccion->query($consulta);
            //paso 4: preparamos la respuesta de nuestra consulta 
           if($resultado && $resultado->num_rows > 0){
                $alumno=$resultado->fetch_assoc();
           }else{
                $alumno=false;
           }
            //paso 5: cerramos la coneccion a la base de datos 
            $this->Connection->closeConnection();
            //paso 6: retornar el resultado
            return $alumno;
        }

        public function delete($id){
            $consulta="DELETE FROM alumnos WHERE id_alumno = $id";
            $coneccion=$this->Connection->getConnection();
            $resultado= $coneccion->query($consulta);
            $respuesta= $resultado? true: false;
            $this->Connection->closeConnection();
            return $respuesta;
        }

        public function insert($alumno){
            if(!isset($alumno['nombre'],$alumno['apellido'],$alumno['edad'],$alumno['correo'],$alumno['fecha'])){
                return false;   
            }

            $nombre=$alumno['nombre'];
            $edad=$alumno['edad'];
            $apellido=$alumno['apellido'];
            $correo=$alumno['correo'];
            $fecha=$alumno['fecha'];

            $consulta= "INSERT INTO alumnos (nombre, apellido, edad, correo_electronico, fecha_nacimiento)
            VALUES ('$nombre', '$apellido', $edad, '$correo', '$fecha')";
            $coneccion=$this->Connection->getConnection();
            $resultado=$coneccion->query($consulta);
            $respeuesta=$resultado?true:false;
            $this->Connection->closeConnection();
            return $respeuesta;
        }

        public function eddit($data){
            if(!isset($data['id'], $data['nombre'], $data['apellido'], $data['edad'], $data['correo'], $data['fecha'])){
                return false;
            }
            $id=$data['id'];
            $nombre=$data['nombre'];
            $apellido=$data['apellido'];
            $edad=$data['edad'];
            $correo=$data['correo'];
            $fecha=$data['fecha'];

            $consulta="UPDATE alumnos SET nombre='$nombre', apellido='$apellido', edad=$edad,
            correo_electronico='$correo', fecha_nacimiento='$fecha' WHERE id_alumno=$id";
            $coneccion=$this->Connection->getConnection();
            $resultado=$coneccion->query($consulta);
            $respuesta=$resultado?true:false;
            $this->Connection->closeConnection();
            return $respuesta;
        }

    }


?>
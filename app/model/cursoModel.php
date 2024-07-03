<?Php
    class cursoModel{
        private $Connection;
        
        public function __construct()
        {
            require_once("app/config/DBConnection.php");
            $this->Connection=new DBConnection();            
        }

        public function getAll(){
            $consulta="SELECT * FROM cursos";
            $coneccion=$this->Connection->getConnection();
            $resultado=$coneccion->query($consulta);
            $cursos=array();
            while($curso=$resultado->fetch_assoc()){
                $cursos[]=$curso;
            }
            $this->Connection->closeConnection();
            return $cursos;
        }
    }
?>
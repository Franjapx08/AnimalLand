<?php
    include_once('Conexion.php');
    
    Class CitasUpdate {
        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();
        }

        function updateCitaReal($id) {
            $result = $this->conexion->getQuery("SELECT * FROM cita WHERE id = '".$id."'");
            var_dump($result);
        }

       
    }
<?php
    include_once('Conexion.php');
    
    Class Mascotas {
        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();
        }

        function getMascotas() {
            $result = $this->conexion->getQuery("SELECT * FROM mascota");
            return $result;
        }

        function getMascotaById($id) {
            $result = $this->conexion->getQuery("SELECT * FROM mascota WHERE Cliente_id = '".$id."' AND estatus = 0");
            return $result;
        }

        function getMascotaByUser($id, $idUser){ 
            $result = $this->conexion->getQuery("SELECT * FROM mascota WHERE id = '".$id."' AND Cliente_id = '".$idUser."' AND estatus = 0 ");
            return $result;
        }

        function updateMascota($id, $nombre, $color, $tipo, $caracteristica, $idCliente){
            $result = $this->conexion->runQuery("UPDATE mascota SET Nombre = '".$nombre."', Color = '".$color."', Tipo = '".$tipo."'
            , Caracteristica = '".$caracteristica."' WHERE id = '".$id."'  AND Cliente_id = '".$idCliente."' AND estatus = 0");
            return $result;
        }

        function ifExistMascota($id) {
            $result = $this->conexion->getQuery("SELECT * FROM mascota WHERE id = '".$id."' AND estatus = 0");
            return $result;
        }
        
        function deleteMascota($id){
            $result = $this->conexion->runQuery("UPDATE mascota SET estatus = 1 WHERE id = '".$id."' AND estatus = 0");
            return $result;
        }
    }
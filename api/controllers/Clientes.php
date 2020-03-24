<?php
    include_once('Conexion.php');
    
    Class Clientes {
        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();
        }

        function getClientes() {
            $result = $this->conexion->getQuery("SELECT * FROM cliente");
            return $result;
        }

        function login($email, $password){
            $result = $this->conexion->getQuery("SELECT * FROM cliente WHERE Correo = '".$email."' AND Password = '".$password."';");
            return $result;
        }

        function registro($nombres, $apellidos, $direccion, $email, $password){
            $result = $this->conexion->runQuery("INSERT INTO `cliente` (`id`, `Nombre`, `Apellido`, `Direccion`, `Correo`, `Password`, `Estatus`, `Tipo`) 
            VALUES (NULL, '".$nombres."', '".$apellidos."', '".$direccion."', '".$email."', '".$password."', '0', '3');");
            return $result;
        }

        function isExist($email){
            $result = $this->conexion->getQuery("SELECT * FROM cliente WHERE  Correo = '".$email."'");
            return $result;
        }

        function isExistById($id){
            $result = $this->conexion->getQuery("SELECT * FROM cliente WHERE  id = '".$id."'");
            return $result;
        }

        function ifExistPassById($id, $password){
            $result = $this->conexion->getQuery("SELECT * FROM cliente WHERE  id = '".$id."' AND password = '".$password."'");
            return $result;
        }        

        function getUser($id){
            $result = $this->conexion->getQuery("SELECT * FROM cliente WHERE id = '".$id."' limit 1;");
            return $result;
        }
        
        function isAuth($email){
            $result = $this->conexion->getQuery("SELECT * FROM cliente WHERE correo = '".$email."' limit 1;");
            return $result;
        }

        function updateInf($id, $direccion){
            $result = $this->conexion->runQuery("UPDATE `cliente` SET `Direccion` = '".$direccion."' WHERE `cliente`.`id` = $id;");
            return $result;
        }
        
        function updatePass($id, $password){
            $result = $this->conexion->runQuery("UPDATE `cliente` SET `Password` = '".$password."' WHERE `cliente`.`id` = $id;");
            return $result;
        }

        function insertMascota($nombre, $tipo, $color, $caracteristicas, $id){
            $result = $this->conexion->runQuery("INSERT INTO `mascota` (`id`, `Nombre`, `Tipo`, `Color`, `Caracteristica`, `Estatus`, `Cliente_id`) 
            VALUES (NULL, '".$nombre."', '".$tipo."', '".$color."', '".$caracteristicas."', '0', '".$id."');");
            return $result;
        }
    }
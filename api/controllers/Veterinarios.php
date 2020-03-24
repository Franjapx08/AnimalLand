<?php
    include_once('Conexion.php');
    
    Class Veterinarios {
        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();
        }

        function getVeterinarios(){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE Tipo = 4 AND Estatus = 0");
            return $result;
        }
        
        function getVeterinariosActivos() {
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE Estatus = '0' AND Tipo >0 ");
            return $result;
        }

        function getOnlyVeterinarios() {
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE Estatus = '0' AND Tipo = 4 ");
            return $result;
        }

        function getVeterinarioById($id){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE id = '".$id."' AND Estatus = '0' AND Tipo >0");
            return $result;
        }

        function getVeterinarioByIdGlobal($id){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE id = '".$id."'");
            return $result;
        }

        function login($email, $password){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE Correo = '".$email."' AND Password = '".$password."';");
            return $result;
        }

        function registro($nombres, $apellidos, $email, $password, $tipo){
            $result = $this->conexion->runQuery("INSERT INTO `veterinario` (`id`, `Nombre`, `Apellido`, `Correo`, `Password`, `Tipo`, `Estatus`) 
            VALUES (NULL, '".$nombres."', '".$apellidos."', '".$email."', '".$password."', '".$tipo."', '0');");
            return $result;
        }

        function ifExistPassById($id, $password){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE  id = '".$id."' AND password = '".$password."'");
            return $result;
        }   

        function isExist($email){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE Correo = '".$email."'");
            return $result;
        }

        function isExistById($id){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE id = '".$id."'");
            return $result;
        }

        function getUser($id){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE id = '".$id."' limit 1;");
            return $result;
        }

        function isAuth($email){
            $result = $this->conexion->getQuery("SELECT * FROM veterinario WHERE correo = '".$email."' limit 1;");
            return $result;
        }

        function updatePass($id, $password){
            $result = $this->conexion->runQuery("UPDATE `veterinario` SET `Password` = '".$password."' WHERE `veterinario`.`id` = $id;");
            return $result;
        }
        
        function updateVeterinario($id, $nombre, $apellido, $correo, $tipo){
            $result = $this->conexion->runQuery("UPDATE `veterinario` SET `Nombre` = '".$nombre."', 
            `Apellido` = '".$apellido."', `Correo` = '".$correo."', `Tipo` = '".$tipo."' WHERE `veterinario`.`id` = '".$id."';");
            return $result;
        }

        function deleteVeterinario($id){
            $result = $this->conexion->runQuery("UPDATE `veterinario` SET `Estatus` = '1' WHERE `veterinario`.`id` = $id;");
            return $result;
        }

    }
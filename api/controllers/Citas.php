<?php
    include_once('Conexion.php');
    
    Class Citas {
        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();
        }

        function getCitas() {
            $result = $this->conexion->getQuery("SELECT * FROM cita");
            return $result;
        }

        function getCitasActivas() {
            $result = $this->conexion->getQuery("SELECT * FROM cita WHERE Estatus = 0");
            return $result;
        }

        function getCitasActuales() {
            $result = $this->conexion->getQuery("SELECT * FROM cita WHERE Estatus <2 AND Fecha >= CURDATE()");
            return $result;
        }

        function getCitasByUser($id) {
            $result = $this->conexion->getQuery("SELECT c.id, c.Estatus, c.Diagnositco, c.Fecha, c.Hora, m.Tipo, m.Nombre FROM cita c, mascota m 
            WHERE c.Eliminado_cliente = 0 AND c.Cliente_id = '".$id."' AND c.Mascota_id = m.id ORDER BY c.Fecha DESC;");
            return $result;
        }

        function getCitaByVeterinario($id) {
            $result = $this->conexion->getQuery("SELECT c.id, c.Estatus, c.Diagnositco, c.Fecha, c.Hora, cle.Nombre AS NombreC FROM cita c , cliente cle
            WHERE c.Eliminado_veterinario = 0 AND c.Veterinario_id = '".$id."' AND c.Cliente_id = cle.id  ORDER BY c.Fecha DESC;");
            return $result;
        }

        function getCitaByAdmin() {
            $result = $this->conexion->getQuery("SELECT c.id, c.Estatus, c.Diagnositco, c.Fecha, c.Hora, cle.Nombre AS NombreC FROM cita c , cliente cle
            WHERE c.Eliminado_admin = 0 AND  c.Cliente_id = cle.id  ORDER BY c.Fecha DESC;");
            return $result;
        }


        function getCitasFromFecha($fecha) {
            $result = $this->conexion->getQuery("SELECT * FROM cita WHERE Estatus = 0 AND Fecha = '".$fecha."'");
            return $result;
        }

        function getCitaById($id) {
            $result = $this->conexion->getQuery("SELECT c.id AS id, c.Estatus AS Estatus, c.Diagnositco, c.Fecha, c.Hora, m.Tipo, m.Nombre AS NombreM, v.Nombre AS NombreV, v.Apellido, v.Correo 
            FROM cita c, mascota m, veterinario v WHERE c.Eliminado_admin = 0 AND c.id = '".$id."' AND c.Mascota_id = m.id AND c.Veterinario_id = v.id;");
            return $result;
        }

        function getCitaByIdVeterinario($id) {
            $result = $this->conexion->getQuery("SELECT c.id AS id, c.Estatus AS Estatus, c.Diagnositco, c.Fecha, c.Hora, m.Tipo, m.Nombre AS NombreM, v.Nombre AS NombreV, v.Apellido, v.Correo, 
            cli.Correo AS CorreoC, cli.Nombre AS NombreC, cli.Apellido AS ApellidosC
            FROM cita c, mascota m, veterinario v, cliente cli WHERE c.Eliminado_admin = 0 AND c.id = '".$id."' AND c.Mascota_id = m.id AND c.Veterinario_id = v.id
            AND c.Cliente_id = cli.id;");
            return $result;
        }

        function insertCitaFromUser($id, $idMascota, $idVeterinario, $fecha, $hora){
            $result = $this->conexion->runQuery("INSERT INTO `cita` (`id`, `Diagnositco`, `Fecha`, `Hora`, `Veterinario_id`, `Mascota_id`, `Cliente_id`, `Estatus`, `Eliminado_cliente`, `Eliminado_veterinario`, `Eliminado_admin`) 
            VALUES (NULL, 'Sin diagnostico', '".$fecha."', '".$hora."', '".$idVeterinario."', '".$idMascota."', '".$id."', '0', '0', '0', '0');");
            
            return $result;
        }

        function updateCita($id, $mascota) {
            $result = $this->conexion->runQuery("UPDATE `cita` SET `Mascota_id` = '".$mascota."' WHERE `cita`.`id` = '".$id."';");
            return $result;
        }
        
        function setEstatusCita($id, $opcion) {
            $result = $this->conexion->runQuery("UPDATE `cita` SET `Estatus` = '".$opcion."' WHERE `cita`.`id` = '".$id."';");
            return $result;
        }

        function deleteCitaByVeterinario($id, $opcion) {
            $result = $this->conexion->runQuery("UPDATE `cita` SET `Eliminado_veterinario` = '".$opcion."' WHERE `cita`.`id` = '".$id."';");
            return $result;
        }

        function deleteCitaByCliente($id, $opcion) {
            $result = $this->conexion->runQuery("UPDATE `cita` SET `Eliminado_cliente` = '".$opcion."' WHERE `cita`.`id` = '".$id."';");
            return $result;
        }
        
        function deleteFromAdmin($id, $opcion) {
            $result = $this->conexion->runQuery("UPDATE `cita` SET `Eliminado_admin` = '".$opcion."' WHERE `cita`.`id` = '".$id."';");
            return $result;
        }
        
        function addDiagnostico($id, $diag) {
            $result = $this->conexion->runQuery("UPDATE `cita` SET `Estatus` = '2', `Diagnositco` = '".$diag."' 
            WHERE `cita`.`id` = '".$id."';");
            return $result;
        }
    }
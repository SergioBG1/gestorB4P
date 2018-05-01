<?php

//require_once 'Producto.php';

class BD {

    private $conexion;

    public function __construct() {
        $conexion = null;
        try {
            $this->conexion = new PDO("mysql:host=localhost;dbname=gestor", "sergio", "sergio");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Fallo: " . $ex->getMessage());
        }
    }
/**
 * Verifica usuario
 * @param String $usuario
 * @param String $contra
 * @return boolean
 */
    function verificar($usuario, $contra) {
        try {
            $prueba = 0;
            $con = "SELECT * from empresa where usuario='$usuario' && pass='$contra'";
            $this->__construct();
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            while ($consulta->fetch()) {
                $prueba++;
            }
            if ($prueba > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function consigueID($usuario) {
        try {
            $prueba = 0;
            $con = "SELECT `id_empresa` from empresa where usuario=:user";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['user' => $usuario]);
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  
    

/**
 * Obtiene los productos de la selección
 * @return \Producto
 */


/**
 * Obtiene los productos de ordenadores
 * @return \Producto
 */
    function creaEvento($evento, $ciudad, $plazas, $id) {
        $objetos = [];
        try {
            $plazas = (int) $plazas;
            $con = "INSERT INTO `evento`(`nombre`, `ciudad`, `plazas`, `id_empresa_e`)  VALUES (:evento, :ciudad, :plazas, :id);";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['evento' => $evento, 'ciudad' => $ciudad, 'plazas' => $plazas, 'id' => $id]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

}
?>


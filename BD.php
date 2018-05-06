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
    
     function verificarMedio($usuario, $contra) {
        try {
            $prueba = 0;
            $con = "SELECT * from medio where nombre='$usuario' && pass='$contra'";
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
    
      function consigueNombre($id) {
        try {
            $con = "SELECT `usuario` from empresa where id_empresa=:id";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id' => $id]);
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  
    function consigueDatos($usuario) {
        try {
            $con = "SELECT `direccion`, `correo` from empresa where usuario=:user";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['user' => $usuario]);
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    } 
    function consigueDatosMedio($usuario) {
        try {
            $con = "SELECT `direccion`, `visitas`, `url`, `seguidores`, `correo` from medio where nombre=:user";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['user' => $usuario]);
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    } 
         function listarEventos($id) {
        try {
            $con = "SELECT * from evento where id_empresa_e=:id";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id' => $id]);
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  
    
     function listarProductos($id) {
        try {
            $con = "SELECT * from producto where id_empresa_p=:id";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id' => $id]);
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  
          function listarProductosMedio() {
        try {
            $con = "SELECT * from producto;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  
    
      function listarProductosMedioCarousel() {
        try {
            $con = "SELECT * from producto ORDER BY id_producto DESC;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
           return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  
    
  function listarEventosMedio() {
        try {
            $con = "SELECT * from evento;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
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
        try {
            $plazas = (int) $plazas;
            $con = "INSERT INTO `evento`(`nombre`, `ciudad`, `plazas`, `id_empresa_e`)  VALUES (:evento, :ciudad, :plazas, :id);";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['evento' => $evento, 'ciudad' => $ciudad, 'plazas' => $plazas, 'id' => $id]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function actualizaPefilEmpresa($correo, $direccion, $user) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `empresa` SET `direccion`=:direccion,`correo`=:correo where usuario=:user;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['user' => $user, 'direccion' => $direccion, 'correo' => $correo]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function actualizaPerfilMedio($correo, $direccion,$visitas, $url,$seguidores, $user) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `medio` SET `direccion`=:direccion,`correo`=:correo,`seguidores`=:seguidores,`url`=:url,`visitas`=:visitas  where nombre=:user;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['user' => $user, 'direccion' => $direccion, 'correo' => $correo, 'visitas' => $visitas, 'url' => $url, 'seguidores' => $seguidores]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function actualizaProducto($nombre, $cantidad, $plataforma, $id) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `producto` SET `nombre`=:nombre,`cantidad`=:cantidad, `plataforma`=:plataforma where id_producto=:id;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $nombre, 'cantidad' => $cantidad, 'plataforma' => $plataforma,'id' => $id,]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function actualizaEvento($nombre, $ciudad, $plazas, $id) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `evento` SET `nombre`=:nombre,`ciudad`=:ciudad, `plazas`=:plazas where id_evento=:id;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $nombre, 'ciudad' => $ciudad, 'plazas' => $plazas,'id' => $id,]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function creaProducto($producto, $cantidad, $plataforma, $id) {
        try {
            $con = "INSERT INTO `producto`(`nombre`, `cantidad`, `plataforma`, `id_empresa_p`)  VALUES (:producto, :cantidad, :plataforma, :id);";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['producto' => $producto, 'cantidad' => $cantidad, 'plataforma' => $plataforma, 'id' => $id]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function eliminaEvento($id) {
        try {
            $con = "DELETE FROM `evento` WHERE id_evento=:id;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
        function eliminaProducto($id) {
        try {
            $con = "DELETE FROM `producto` WHERE id_producto=:id;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

}
?>


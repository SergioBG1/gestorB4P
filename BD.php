<?php

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
     * Verifica usuario EMPRESA
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

    /**
     * Verifica usuario MEDIO
     * @param String $usuario
     * @param String $contra
     * @return boolean
     */
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

    /**
     * Retorna ID empresa en función de usuario
     * @param String $usuario
     * @return String
     */
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
     * Retorna nombre de usuario en función de id_empresa
     * @param int $id
     * @return String
     */
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

    /**
     * Retorna dirección / correo en función de usuario
     * @param String $usuario
     * @return Array
     */
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

    /**
     * Retorna dirección / visitas / url / seguidores en función de usuario
     * @param String $usuario
     * @return Array
     */
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

    /**
     * Retorna lista de eventos en función de empresa
     * @param int $id
     * @return Array
     */
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

    /**
     * Retorna lista de productos en función de empresa
     * @param int $id
     * @return Array
     */
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

    /**
     * Retorna lista de eventos
     * @return Array
     */
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

    /**
     * Retorna lista de eventos ordenados por id_producto
     * @return Array
     */
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

    /**
     * Retorna lista de eventos
     * @return Array
     */
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
     * Crea evento
     * @param int $id
     * @param String $evento
     * @param String $ciudad
     * @param int $plazas
     * @return boolean
     */
    function creaEvento($evento, $ciudad, $plazas, $id) {
        try {
            $plazas = (int) $plazas;
            $con = "INSERT INTO `evento`(`nombre`, `ciudad`, `plazas`, `id_empresa_e`)  VALUES (:evento, :ciudad, :plazas, :id);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['evento' => $evento, 'ciudad' => $ciudad, 'plazas' => $plazas, 'id' => $id]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    /**
     * Actualiza Perfil Empresa
     * @param String $correo
     * @param String $plataforma
     * @param String $user
     * @return boolean
     */
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

    /**
     * Actualiza Perfil Medio
     * @param String $correo
     * @param String $direccion
     * @param String $user
     * @param int $visitas
     * @param int $seguidores
     * @return boolean
     */
    function actualizaPerfilMedio($correo, $direccion, $visitas, $url, $seguidores, $user) {
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

    /**
     * Actualiza Producto
     * @param String $nombre
     * @param String $plataforma
     * @param String $congelado
     * @param int $cantidad
     * @param int $id
     * @return boolean
     */
    function actualizaProducto($nombre, $cantidad, $plataforma, $id, $congelado) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `producto` SET `nombre`=:nombre,`cantidad`=:cantidad, `plataforma`=:plataforma, `congelado`=:congelado where id_producto=:id;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $nombre, 'cantidad' => $cantidad, 'plataforma' => $plataforma, 'id' => $id, 'congelado' => $congelado]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    /**
     * Actualiza Evento
     * @param String $nombre
     * @param String $ciudad
     * @param String $congelado
     * @param int $plazas
     * @param int $id
     * @return boolean
     */
    function actualizaEvento($nombre, $ciudad, $plazas, $id, $congelado) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `evento` SET `nombre`=:nombre,`ciudad`=:ciudad, `plazas`=:plazas, `congelado`=:congelado where id_evento=:id;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $nombre, 'ciudad' => $ciudad, 'plazas' => $plazas, 'id' => $id, 'congelado' => $congelado]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    /**
     * Crea producto
     * @param int $id
     * @param String $producto
     * @param int $cantidad
     * @param String $plaataforma
     * @return boolean
     */
    function creaProducto($producto, $cantidad, $plataforma, $id) {
        try {
            $con = "INSERT INTO `producto`(`nombre`, `cantidad`, `plataforma`, `id_empresa_p`)  VALUES (:producto, :cantidad, :plataforma, :id);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['producto' => $producto, 'cantidad' => $cantidad, 'plataforma' => $plataforma, 'id' => $id]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    /**
     * Elimina evento en función de id_evento
     * @return boolean
     */
    function eliminaEvento($id) {
        try {
            $con = "DELETE FROM `evento` WHERE id_evento=:id;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    /**
     * Elimina producto en función de id_producto
     * @return boolean
     */
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


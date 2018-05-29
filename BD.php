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
            $con = "SELECT * from empresa where usuario=:user && pass=:contra && confirmado='si'";
            $this->__construct();
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['user' => $usuario,'contra' =>$contra ]);
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
 function verificarADM($usuario, $contra) {
        try {
            $prueba = 0;
            $con = "SELECT * from administrador where nombre=:user && pass=:contra";
            $this->__construct();
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['user' => $usuario,'contra' =>$contra ]);
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
            $con = "SELECT * from medio where nombre=:user && pass=:contra && baneado='no'";
            $this->__construct();
            $consulta = $this->conexion->prepare($con);
          $consulta->execute(['user' => $usuario,'contra' =>$contra ]);
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
  function consigueRol($usuario) {
        try {
            $prueba = 0;
            $con = "SELECT `rolVideojuegos` from empresa where usuario=:user";
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
       function consigueDatosADM($usuario) {
        try {
            $con = "SELECT `correo` from administrador where nombre=:user";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['user' => $usuario]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function consigueDatosMedioCorreo($usuario) {
        try {
            $con = "SELECT `correo` from medio where nombre=:usuario";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['usuario' => $usuario]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function consigueDatosEmpresaCorreo($usuario) {
        try {
            $con = "SELECT `correo` from empresa where usuario=:usuario";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['usuario' => $usuario]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
function consigueDatosMedioID($id_medio) {
        try {
            $con = "SELECT `direccion`, `visitas`, `url`, `seguidores`, `correo`, `nombre` from medio where id_medio=:id_medio";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id_medio' => $id_medio]);
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
function listarEventosADM() {
        try {
            $con = "SELECT * from evento";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
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
  function listarProductosADM() {
        try {
            $con = "SELECT * from producto";
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
    
   function peticionMedio($user, $correo, $pass, $direccion, $visitas, $url, $seguidores) {
        try {
            $visitas= (int) $visitas;
            $seguidores= (int) $seguidores;
            $con = "INSERT INTO `peticionmedio`(`nombre`, `direccion`, `pass`, `visitas`, `url`, `seguidores`, `correo`)  VALUES (:nombre, :direccion, :pass, :visitas, :url, :seguidores, :correo);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $user,'direccion' => $direccion, 'correo' => $correo, 'pass' => $pass, 'visitas' => $visitas, 'url' => $url, 'seguidores' => $seguidores]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
       function peticionEmpresa($usuario, $correo, $pass, $direccion, $rolVideojuegos) {
        try {
            $con = "INSERT INTO `empresa`(`usuario`, `pass`, `direccion`,`correo`,`rolVideojuegos`)  VALUES (:usuario, :pass, :direccion, :correo, :rolVideojuegos);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['usuario' => $usuario,'direccion' => $direccion, 'correo' => $correo, 'pass' => $pass, 'rolVideojuegos' => $rolVideojuegos]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
       function anadeADM($user, $correo, $pass) {
        try {
            $con = "INSERT INTO `administrador`(`nombre`, `correo`, `pass`)  VALUES (:nombre, :correo, :pass);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $user, 'correo' => $correo, 'pass' => $pass]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function anadirMedio($user, $correo, $pass, $direccion, $visitas, $url, $seguidores) {
        try {
            $visitas= (int) $visitas;
            $seguidores= (int) $seguidores;
            $con = "INSERT INTO `medio`(`nombre`, `direccion`, `pass`, `visitas`, `url`, `seguidores`, `correo`)  VALUES (:nombre, :direccion, :pass, :visitas, :url, :seguidores, :correo);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['nombre' => $user,'direccion' => $direccion, 'correo' => $correo, 'pass' => $pass, 'visitas' => $visitas, 'url' => $url, 'seguidores' => $seguidores]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function listarPeticionMedio() {
        try {
            $con = "SELECT * from peticionmedio where estado='pendiente';";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }  function listarPeticionEmpresa() {
        try {
            $con = "SELECT * from empresa where confirmado='no';";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function listarPeticionEmpresaRechazada() {
        try {
            $con = "SELECT * from empresa where confirmado='rechazado';";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function consigueIDMedio($nombre) {
        try {
            $con = "SELECT id_medio from medio where nombre=:nombre;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['nombre' => $nombre]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function consigueDatosProducto($id_producto) {
        try {
            $con = "SELECT * from producto where id_producto=:id_producto;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id_producto' => $id_producto]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function consigueDatosEvento($id_evento) {
        try {
            $con = "SELECT * from evento where id_evento=:id_evento;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id_evento' => $id_evento]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function cogeDatosMedio($correo) {
        try {
            $con = "SELECT * from peticionmedio where correo=:correo;";
            $consulta = $this->conexion->prepare($con);
             $consulta->execute(['correo' => $correo]);
              return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function listarPeticionMedioAceptadas() {
        try {
            $con = "SELECT * from peticionmedio where estado='aceptado' order by id_peticion DESC LIMIT 0, 5;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
        function listarPeticionEmpresaAceptadas() {
        try {
            $con = "SELECT * from empresa where confirmado='si' order by id_empresa DESC LIMIT 0, 5;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    
      function listarPeticionMedioAceptadasProducto($id_medio_u) {
        try {
            $con = "SELECT * from peticionproducto where estado='aceptado' AND id_medio_u=:id_medio_u;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id_medio_u' => $id_medio_u]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function listarPeticionMedioAceptadasEvento($id_medio_u) {
        try {
            $con = "SELECT * from peticionevento where estado='aceptado' AND id_medio_u=:id_medio_u;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['id_medio_u' => $id_medio_u]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function listarPeticionProducto($id_empresa) {
        try {
            $con = "SELECT * from peticionproducto where id_empresa=:id_empresa AND estado='pendiente'";
            $consulta = $this->conexion->prepare($con);
             $consulta->execute(['id_empresa' => $id_empresa]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function listarPeticionEvento($id_empresa) {
        try {
            $con = "SELECT * from peticionevento where id_empresa=:id_empresa AND estado='pendiente'";
            $consulta = $this->conexion->prepare($con);
             $consulta->execute(['id_empresa' => $id_empresa]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function listarPeticionProducto2($id_empresa) {
        try {
            $con = "SELECT * from peticionproducto where id_empresa=:id_empresa AND estado='aceptado'";
            $consulta = $this->conexion->prepare($con);
             $consulta->execute(['id_empresa' => $id_empresa]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
            function listarPeticionEvento2($id_empresa) {
        try {
            $con = "SELECT * from peticionevento where id_empresa=:id_empresa AND estado='aceptado'";
            $consulta = $this->conexion->prepare($con);
             $consulta->execute(['id_empresa' => $id_empresa]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function anadirPeticionProducto($id_medio_u,$id_producto_u,$id_empresa) {
         try {
            $con = "INSERT INTO `peticionproducto`(`id_medio_u`, `id_producto_u`, `id_empresa`)  VALUES (:id_medio_u, :id_producto_u, :id_empresa);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['id_medio_u' => $id_medio_u,'id_producto_u' => $id_producto_u, 'id_empresa' => $id_empresa]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function anadirPeticionEvento($id_medio_u,$id_evento_u,$id_empresa) {
         try {
            $con = "INSERT INTO `peticionevento`(`id_medio_u`, `id_evento_u`, `id_empresa`)  VALUES (:id_medio_u, :id_evento_u, :id_empresa);";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['id_medio_u' => $id_medio_u,'id_evento_u' => $id_evento_u, 'id_empresa' => $id_empresa]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function listarPeticionesProductoMedio($id_medio_u) {
        try {
            $con = "SELECT id_producto_u from peticionproducto where id_medio_u=:id_medio_u;";
            $consulta = $this->conexion->prepare($con);
          $consulta->execute(['id_medio_u' => $id_medio_u]);
              return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function listarPeticionesEventoMedio($id_medio_u) {
        try {
            $con = "SELECT id_evento_u from peticionevento where id_medio_u=:id_medio_u;";
            $consulta = $this->conexion->prepare($con);
          $consulta->execute(['id_medio_u' => $id_medio_u]);
              return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function listarPeticionMedioRechazadas() {
        try {
            $con = "SELECT * from peticionmedio where estado='rechazado' order by id_peticion DESC LIMIT 0, 5;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function listarTodosMedios() {
        try {
            $con = "SELECT * from medio;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
        function listarCorreoPeticionMedio() {
        try {
            $con = "SELECT `correo` from peticionmedio;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    
    
     function listarCorreoMedio() {
        try {
            $con = "SELECT `correo` from medio;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function listarCorreoEmpresa() {
        try {
            $con = "SELECT `correo` from empresa;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
         function listarCorreoADM() {
        try {
            $con = "SELECT `correo` from administrador;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function listarURLPeticionMedio() {
        try {
            $con = "SELECT `url` from peticionmedio;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function listarURLMedio() {
        try {
            $con = "SELECT `url` from medio;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
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
   function actualizaCantidadEmpresa($cantidad,$nombre) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `producto` SET `cantidad`=:cantidad where nombre=:nombre";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['cantidad' => $cantidad,'nombre' => $nombre]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function actualizaPlazasEmpresa($plazas,$nombre) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `evento` SET `plazas`=:plazas where nombre=:nombre";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['plazas' => $plazas,'nombre' => $nombre]);
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
     function actualizaPerfilADM($correo, $user, $nombreNuevo) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `administrador` SET `nombre`=:nombreNuevo,`correo`=:correo where nombre=:user;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['user' => $user, 'correo' => $correo,'nombreNuevo' => $nombreNuevo]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
        function banearMedio($user) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `medio` SET `baneado`='si' where nombre=:user;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['user' => $user]);
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
     function eliminaEmpresa($usuario) {
        try {
            $con = "DELETE FROM `empresa` WHERE usuario=:usuario;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['usuario' => $usuario]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
       function eliminaMedio($nombre) {
        try {
            $con = "DELETE FROM `medio` WHERE nombre=:nombre;";
            $consulta = $this->conexion->prepare($con);
            $consulta->execute(['nombre' => $nombre]);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function eliminaPeticionMedio($correo) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionmedio` SET estado='rechazado' where correo=:correo;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['correo' => $correo]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
       function eliminaPeticionEmpresa($correo) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `empresa` SET confirmado='rechazado' where correo=:correo;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['correo' => $correo]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    

    function aceptaPeticionMedio($correo) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionmedio` SET estado='aceptado' where correo=:correo;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['correo' => $correo]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
      function aceptaPeticionEmpresa($correo) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `empresa` SET confirmado='si' where correo=:correo;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['correo' => $correo]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function aceptaPeticionProducto($id_peticion) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionproducto` SET estado='aceptado' where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
        function rechazaPeticionProducto($id_peticion) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionproducto` SET estado='rechazado' where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
          function rechazaPeticionEvento($id_peticion) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionevento` SET estado='rechazado' where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function aceptaPeticionEvento($id_peticion) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionevento` SET estado='aceptado' where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
     function proporcionaSegumientoPeticionProducto($id_peticion,$seguimiento) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionproducto` SET seguimiento=:seguimiento where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['seguimiento' => $seguimiento,'id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
         function proporcionaSegumientoPeticionEvento($id_peticion,$seguimiento) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionevento` SET seguimiento=:seguimiento where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['seguimiento' => $seguimiento,'id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
function proporcionaCoberturaPeticionProducto($id_peticion,$cobertura) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionproducto` SET cobertura=:cobertura where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['cobertura' => $cobertura,'id_peticion' => $id_peticion]);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    function proporcionaCoberturaPeticionEvento($id_peticion,$cobertura) {
        try {
            //UPDATE `empresa` SET `id_empresa`=[value-1],`usuario`=[value-2],`pass`=[value-3],`direccion`=[value-4],`correo`=[value-5] where usuario=:user
            $con = "UPDATE `peticionevento` SET cobertura=:cobertura where id_peticion=:id_peticion;";
            $consulta = $this->conexion->prepare($con);
            $resultado = $consulta->execute(['cobertura' => $cobertura,'id_peticion' => $id_peticion]);
            return $resultado;
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


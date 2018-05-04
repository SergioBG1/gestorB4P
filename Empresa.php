<?php

class Producto{
    private $usuario;
    private $direccion;
    private $correo;

    
    
    public function __construct($usuario,$direccion,$correo){
        $this->usuario=$usuario;
        $this->direccion=$direccion;
        $this->correo=$correo;
        
}
}
?>
<?php
class ResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nEmpleado,$nLicencia,$name,$surname){
        $this->numEmpleado = $nEmpleado;
        $this->numLicencia = $nLicencia;
        $this->nombre = $name;
        $this->apellido = $surname;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setNumEmpleado($nEmpleado){
        $this->numEmpleado = $nEmpleado;
    }
    public function setNumLicencia($nLicencia){
        $this->numLicencia = $nLicencia;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function __toString(){
        return "  Numero Empleado: " . $this->getNumEmpleado() . "\n" .
               "  Numero Licencia: " . $this->getNumLicencia() . "\n" .
               "  Nombre: " . $this->getNombre() . "\n" .
               "  Apellido: " . $this->getApellido() . "\n"; 
    }

    public function modificaInfoResponsable($numEmpleado,$nombre,$apellido){
        $this->setNumEmpleado($numEmpleado);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }
}
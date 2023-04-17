<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;

    public function __construct($name,$surname,$dni,$phone){
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->numDocumento = $dni;
        $this->telefono = $phone;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDni(){
        return $this->numDocumento;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setDni($dni){
        $this->numDocumento = $dni;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function __toString(){
        return "   Nombre: " . $this->getNombre() . "\n" .
               "   Apellido: " . $this->getApellido() . "\n" .
               "   Dni: " . $this->getDni() . "\n" .
               "   Telefono: " . $this->getTelefono() . "\n";
    }

    public function modificaInfo_Pasajero($nombre,$apellido,$telefono){
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setTelefono($telefono);
    }
}
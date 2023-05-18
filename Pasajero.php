<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;
    private $numAsiento;
    private $numTicket;

    public function __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket){
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->numDocumento = $dni;
        $this->telefono = $phone;
        $this->numAsiento = $nroAsiento;
        $this->numTicket = $nroTicket;
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
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function getNumTicket(){
        return $this->numTicket;
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
    public function setNumAsiento($nroAsiento){
        $this->numAsiento = $nroAsiento;
    }
    public function setNumTicket($nroTicket){
        $this->numTicket = $nroTicket;
    }

    public function __toString(){
        return "   Nombre: " . $this->getNombre() . "\n" .
               "   Apellido: " . $this->getApellido() . "\n" .
               "   Dni: " . $this->getDni() . "\n" .
               "   Telefono: " . $this->getTelefono() . "\n" .
               "   Num Asiento: " . $this->getNumAsiento() . "\n" .
               "   Num Ticket: " . $this->getNumTicket() . "\n";
    }

    public function modificaInfoPasajero($infoPasajero){
        $this->setNombre($infoPasajero["nombre"]);
        $this->setApellido($infoPasajero["apellido"]);
        $this->setTelefono($infoPasajero["telefono"]);
        $this->setNumAsiento($infoPasajero["numAsiento"]);
        $this->setNumTicket($infoPasajero["numTicket"]);
    }

    public function darPorcentajeIncremento(){
        $porcentajeIncremento = 0;
        return $porcentajeIncremento;
    }


}
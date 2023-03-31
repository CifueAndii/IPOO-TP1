<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxima;
    private $pasajeros;

    // Metodo Constructor de la clase Viaje
    public function __construct($cod,$dest,$cantidadMax,$pasaj){
        $this->codigo = $cod;
        $this->destino = $dest;
        $this->cantMaxima = $cantidadMax;
        $this->pasajeros = $pasaj;
    }

    // Metodos GET de la clase Viaje
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantidad_maxima(){
        return $this->cantMaxima;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }

    // Metodos SET de la clase Viaje
    public function setCodigo($cod){
        $this->codigo = $cod;
    }
    public function setDestino($dest){
        $this->destino = $dest;
    }
    public function setCantidad_maxima($cantidadMax){
        $this->cantMaxima = $cantidadMax;
    }
    public function setPasajeros($pasaj){
        $this->pasajeros = $pasaj;
    }

    // Metodos que muestran la informacion de la clase viaje
    public function __toString(){
        return " Viaje Feliz\n ------------\n Codigo: " . $this->codigo . "\n Destino: " . $this->destino . 
                "\n Cant. Maxima de Pasajeros: " . $this->cantMaxima . "\n";
    }

    public function mostrarDatos_pasajeros($j){
        $arrPasajeros = $this->getPasajeros();

        return " El nombre del pasajero es: ".$arrPasajeros[$j]["Nombre"]."\n".
            " El apellido del pasajero es: ".$arrPasajeros[$j]["Apellido"]."\n".
            " El documento del pasajero es: ".$arrPasajeros[$j]["Dni"]."\n";
    }

    // Metodo propio de la clase Viaje

    public function cantPasajeros(){
        $cantPasajeros = count($this->getPasajeros());
        return $cantPasajeros;
    }




}
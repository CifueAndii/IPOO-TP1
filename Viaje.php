<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxima;
    private $pasajeros;
    private $responsable;

    // Metodo Constructor de la clase Viaje
    public function __construct($cod,$dest,$cantidadMax,$pasaj,$respons){
        $this->codigo = $cod;
        $this->destino = $dest;
        $this->cantMaxima = $cantidadMax;
        $this->pasajeros = $pasaj;
        $this->responsable = $respons;
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
    public function getResponsable(){
        return $this->responsable;
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
    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    // Metodos que muestran la informacion de la clase viaje
    public function __toString(){
        return " Viaje Feliz" . "\n" .
               "-------------" . "\n" . 
               " Codigo: " . $this->getCodigo() . "\n" .
               " Destino: " . $this->getDestino() . "\n" .
               " Cant. Maxima de Pasajeros: " . $this->getCantidad_maxima() . "\n" . "\n" .
               " Pasajeros " . "\n" .
                 $this->mostrarDatos_pasajeros() . "\n" .
               " Responsable" . "\n" .
                 $this->getResponsable() . "\n";
    }

    public function mostrarDatos_pasajeros(){
        $arrPasajeros = $this->getPasajeros();
        $cadena = "";
        $nPasaj = 1;
        for($i=0;$i<$this->cantPasajeros();$i++){
            $unPasajero = $arrPasajeros[$i];
            $cadena = $cadena . "  Pasajero " . $nPasaj . ": \n" . $unPasajero ."\n";
            $nPasaj++;
        }
        return $cadena;
    }

    // Metodo propio de la clase Viaje

    public function cantPasajeros(){
        $cantPasajeros = count($this->getPasajeros());
        return $cantPasajeros;
    }

    public function buscarPasajero($documento){
        $arrPasajeros = $this->getPasajeros();
        $encontrado = false;
        $i = 0;
        while($i<$this->cantPasajeros() && !$encontrado){
            $unPasajero = $arrPasajeros[$i];
            if($unPasajero->getDni() == $documento){
                $encontrado = true;
            }else{
                $i++;
            }
        }
        if(!$encontrado){
            $i = -1;
        }
        return $i;
    }

    public function pasajeroYaCargado($doc){
        if($this->buscarPasajero($doc) != -1){
            $pasajCargado = true;
        }else{
            $pasajCargado = false;
        }

        return $pasajCargado;
    }

    public function modificaViaje($codigo,$destino,$cantidadMaxima){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantidad_maxima($cantidadMaxima);
    }
}
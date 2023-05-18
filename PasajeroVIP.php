<?php
class PasajeroVip extends Pasajero{
    private $numViajeroFrecuente;
    private $cantMillas;

    public function __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket,$nroViajero,$cantidadMillas){
        parent:: __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket);
        $this->numViajeroFrecuente = $nroViajero;
        $this->cantMillas = $cantidadMillas;
    }

    public function getNumViajero(){
        return $this->numViajeroFrecuente;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }

    public function setNumViajero($nroViajero){
        $this->numViajeroFrecuente = $nroViajero;
    }
    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    public function __toString(){
        $cadena = parent:: __toString();
        return $cadena . "   Num Viajero Frecuente: " . $this->getNumViajero() . "\n" .
               "   Cant Millas: " . $this->getCantMillas() . "\n";
    }

    public function modificaInfoPasajero($infoPasajero){
        parent:: modificaInfoPasajero($infoPasajero);
        $this->setNumViajero($infoPasajero["numViajero"]);
        $this->setCantMillas($infoPasajero["cantMillas"]);;
    }

    public function darPorcentajeIncremento(){
        $cantMillas = $this->getCantMillas();
        if($cantMillas > 300){
            $porcentajeIncremento = 30;
        }else{
            $porcentajeIncremento = 35;
        }
        return $porcentajeIncremento;
    }
    
}
<?php
class PasajeroEspecial extends Pasajero{
    private $sillaRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket,$sillaRuedas,$asistencia,$comidaEspecial){
        parent:: __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket);
        $this->sillaRuedas = $sillaRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }

    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }

    public function setSillaRuedas($sillaRuedas){
        $this->sillaRuedas = $sillaRuedas;
    }
    public function setAsistencia($asistencia){
        $this->asistencia = $asistencia;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }

    public function __toString(){
        $cadena = parent:: __toString();
        return $cadena . "   Necesita? " . "\n" .
               "    Silla de Ruedas: " . $this->getSillaRuedas() . "\n" .
               "    Asistencia: " . $this->getAsistencia() . "\n" .
               "    Comida Especial: " . $this->getComidaEspecial() . "\n";
    }

    public function modificaInfoPasajero($infoPasajero){
        parent:: modificaInfoPasajero($infoPasajero);
        $this->setSillaRuedas($infoPasajero["sillaRuedas"]);
        $this->setAsistencia($infoPasajero["asistencia"]);
        $this->setComidaEspecial($infoPasajero["comidaEspecial"]);;
    }

    public function darPorcentajeIncremento(){
        $sillaRuedas = $this->getSillaRuedas();
        $asistencia = $this->getAsistencia();
        $comidaEspecial = $this->getComidaEspecial();
        $cantNecesidades = 0;

        if($sillaRuedas == "Si"){
            $cantNecesidades++;
        }
        if($asistencia == "Si"){
            $cantNecesidades++;
        }
        if($comidaEspecial == "Si"){
            $cantNecesidades++;
        }

        if($cantNecesidades == 1){
            $porcentajeIncremento = 15;
        }elseif($cantNecesidades > 1){
            $porcentajeIncremento = 30;
        }else{
            $porcentajeIncremento = parent:: darPorcentajeIncremento();
        }
        return $porcentajeIncremento;
    }
}
<?php
class PasajeroEstandar extends Pasajero{
    public function __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket){
        parent:: __construct($name,$surname,$dni,$phone,$nroAsiento,$nroTicket);
    }

    public function __toString(){
        $cadena = parent:: __toString();
        return $cadena;
    }

    public function modificaInfoPasajero($infoPasajero){
        parent:: modificaInfoPasajero($infoPasajero);
    }

    public function darPorcentajeIncremento(){
        $porcentajeIncremento = 10;
        return $porcentajeIncremento;
    }

}
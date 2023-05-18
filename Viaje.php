<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxima;
    private $pasajeros;
    private $responsable;
    private $costo;
    private $sumaCostos;

    // Metodo Constructor de la clase Viaje
    public function __construct($cod,$dest,$cantidadMax,$colPasajeros,$respons,$importe,$sumaImportes){
        $this->codigo = $cod;
        $this->destino = $dest;
        $this->cantMaxima = $cantidadMax;
        $this->pasajeros = $colPasajeros;
        $this->responsable = $respons;
        $this->costo = $importe;
        $this->sumaCostos = $sumaImportes;
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
    public function getCosto(){
        return $this->costo;
    }
    public function getSumaCostos(){
        return $this->sumaCostos;
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
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function setSumaCostos($sumaCostos){
        $this->sumaCostos = $sumaCostos;
    }

    // Metodos que muestran la informacion de la clase viaje
    public function __toString(){
        return " Viaje Feliz" . "\n" .
               "-------------" . "\n" . 
               " Codigo: " . $this->getCodigo() . "\n" .
               " Destino: " . $this->getDestino() . "\n" .
               " Cant. Maxima de Pasajeros: " . $this->getCantidad_maxima() . "\n" .
               " Costo: " . $this->getCosto() . "\n" .
               " Suma Costos: " . $this->getSumaCostos() . "\n" . "\n" .
               " Pasajeros " . "\n" . $this->mostrarDatos_pasajeros() . "\n" .
               " Responsable " . "\n" . $this->getResponsable() . "\n";          
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

    public function modificaViaje($codigo,$destino,$cantidadMaxima,$costo){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantidad_maxima($cantidadMaxima);
        $this->setCosto($costo);
    }

    public function venderPasaje($objPasajero){
        $colPasajeros = $this->getPasajeros();
        echo $this->cantPasajeros() . "\n";
        if($this->cantPasajeros() == 0){
            $colPasajeros [] = $objPasajero;
            $this->setPasajeros($colPasajeros);
            $costo = $this->getCosto();
            echo $costo . "\n";
            $porcentaje = $objPasajero->darPorcentajeIncremento();
            $costoFinal = $costo + ($costo * $porcentaje) / 100;
            echo $costoFinal . "\n";
            $this->setSumaCostos($this->getSumaCostos() + $costoFinal);
            echo $this->getSumaCostos() . "\n";
        }else{
            $pasajeDisponible = $this->hayPasajesDisponible();
            $pasajeroCargado = $this->pasajeroYaCargado($objPasajero->getDni());
            if($pasajeDisponible){
                if(!$pasajeroCargado){
                    $colPasajeros [] = $objPasajero;
                    $this->setPasajeros($colPasajeros);
                    $costo = $this->getCosto();
                    echo $costo . "\n";
                    $porcentaje = $objPasajero->darPorcentajeIncremento();
                    $costoFinal = $costo + ($costo * $porcentaje) / 100;
                    echo $costoFinal . "\n";
                    $this->setSumaCostos($this->getSumaCostos() + $costoFinal);
                    echo $this->getSumaCostos() . "\n";
                }else{
                    $costoFinal = -1;
                }
            }else{
                $costoFinal = 0;
            }
        }
        echo $costoFinal . "\n";
        return $costoFinal;
    }

    public function hayPasajesDisponible(){
        $cantPasajeros = $this->cantPasajeros();
        if($cantPasajeros < $this->getCantidad_maxima()){
            $hayPasaje = true;
        }else{
            $hayPasaje = false; 
        }
        return $hayPasaje;
    }
}

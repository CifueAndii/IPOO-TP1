<?php
    include 'Viaje.php'; 

    function menuPrincipal(){
        echo " ____________________________________________________________________________\n";
        echo "|                                Menu Principal:                             |\n";
        echo "|                       1) Cargar informacion del viaje                      |\n";
        echo "|                     2) Modificar informacion del viaje                     |\n";
        echo "|                         3) Ver informacion del viaje                       |\n";
        echo "|                                  4) Salir                                  |\n";
        echo "|____________________________________________________________________________|\n";
        $opc = trim(fgets(STDIN));
        echo "\n";

        return $opc;
    }

    function menuModificacion_viaje(){
        echo " ____________________________________________________________________________\n";
        echo "|                        ¿Que desea modificar del viaje?                     |\n";
        echo "|                                 1) El codigo                               |\n";
        echo "|                                 2) El destino                              |\n";
        echo "|                      3) La capacidad maxima de pasajeros                   |\n";
        echo "|                        4) Informacion de los pasajeros                     |\n";
        echo "|____________________________________________________________________________|\n";
        $opc2 = trim(fgets(STDIN));
        echo "\n";

        return $opc2;
    }

    function menuModif_info_pasajero(){
        echo " ____________________________________________________________________________\n";
        echo "|                ¿Que informacion del pasajero desea modificar?              |\n";
        echo "|                                1) El Nombre                                |\n";
        echo "|                               2) El Apellido                               |\n";
        echo "|                                 3) El Dni                                  |\n";
        echo "|____________________________________________________________________________|\n";
        $opc3 = trim(fgets(STDIN));
        echo "\n";

        return $opc3;
    }

    function cargaViaje(){
        $pasajeros = [];
        $ingreso = "s";
        $cantPasajeros = 0;

        echo "Ingrese el codigo del viaje: ";
        $codigoViaje = trim(fgets(STDIN));
        echo "Ingrese el destino del viaje: ";
        $destinoViaje = trim(fgets(STDIN));
        echo "Ingrese la capacidad maxima de pasajeros del viaje: ";
        $cantMax_viaje = trim(fgets(STDIN));

        while($ingreso == "s" && $cantPasajeros < $cantMax_viaje){
            echo "Informacion de los pasajeros\n";
            echo "Ingrese el nombre del pasajero: ";
            $nombrePasajero = trim(fgets(STDIN));
            $pasajeros[$cantPasajeros]["Nombre"] = $nombrePasajero;
            echo "Ingrese el apellido del pasajero: ";
            $apellidoPasajero = trim(fgets(STDIN));
            $pasajeros[$cantPasajeros]["Apellido"] = $apellidoPasajero;
            echo "Ingrese el dni del pasajero: ";
            $dniPasajero = trim(fgets(STDIN));
            $pasajeros[$cantPasajeros]["Dni"] = $dniPasajero;
            echo "\nDesea ingresar otro pasajero? (s/n): ";
            $ingreso = trim(fgets(STDIN));
            echo "\n";
            if($ingreso == "s"){
                $cantPasajeros++;
            }
        }       
        if($cantPasajeros == $cantMax_viaje){
            echo "Se llego a la capacidad maxima de pasajeros!! \n";
        }
        $viaje = new Viaje($codigoViaje,$destinoViaje,$cantMax_viaje,$pasajeros);

        return $viaje;
    }

    function modificaViaje($elViaje,$eleccion){

        switch($eleccion){
            case 1:
                echo $elViaje->getCodigo() . " es el codigo actual \n";
                echo "Se cambiara a: ";
                $elViaje->setCodigo((trim(fgets(STDIN))));
                echo "Se cambio correctamente a " . $elViaje->getCodigo() . "\n";
            break;
            case 2:
                echo $elViaje->getDestino() . " es el destino actual \n";
                echo "Se cambiara a: ";
                $elViaje->setDestino((trim(fgets(STDIN))));
                echo "Se cambio correctamente a " . $elViaje->getDestino() . "\n";
            break;
            case 3:
                echo $elViaje->getCantidad_maxima() . " es la capacidad maxima actual \n";
                echo "Se cambiara a: ";
                $elViaje->setCantidad_maxima((trim(fgets(STDIN))));
                echo "Se cambio correctamente a " . $elViaje->getCantidad_maxima() . "\n";
            break;
            case 4:
                modificaInfo_Pasajero($elViaje);
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 4) \n";
            break;
        }
    }

    function modificaInfo_Pasajero($viaje){
        $totalPasajeros = $viaje->cantPasajeros();

        echo "En el viaje hay " . $totalPasajeros . " pasajeros \n";
        echo "Seleccione al nº de pasajero que quiere modificar su informacion: ";
        $nPasajero = trim(fgets(STDIN));
        
        $i = $nPasajero - 1;
        switch(menuModif_info_pasajero()){
            case 1:
                echo $viaje->getPasajeros()[$i]["Nombre"] . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $viaje->setPasajeros(trim(fgets(STDIN)))[$i]["Nombre"];
                echo "Se cambio correctamente a " . $viaje->getPasajeros()[$i]["Nombre"] . "\n";
            break;
            case 2:
                echo $viaje->getPasajeros()[$i]["Apellido"] . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $viaje->setPasajeros((trim(fgets(STDIN))))[$i]["Apellido"];
                echo "Se cambio correctamente a " . $viaje->getPasajeros()[$i]["Apellido"] . "\n";
            break;
            case 3:
                echo $viaje->getPasajeros()[$i]["Dni"] . " es el dni actual \n";
                echo "Se cambiara a: ";
                $viaje->setPasajeros((trim(fgets(STDIN))))[$i]["Dni"];
                echo "Se cambio correctamente a " . $viaje->getPasajeros()[$i]["Dni"] . "\n";
                break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 3) \n";
            break;
        }
    }

    $viajeFeliz = new Viaje(0,"",0,[]);
    do{
        $opcion = menuPrincipal();
        switch ($opcion){
            case 1: 
                $viajeFeliz = cargaViaje();
                echo "Se cargo correctamente la informacion \n";
                echo "\n";
            break;
            case 2: 
                if($viajeFeliz->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    $opcion2 = menuModificacion_viaje();
                    modificaViaje($viajeFeliz,$opcion2);
                }

            break;
            case 3:
                if($viajeFeliz->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    echo $viajeFeliz->__toString();
                    echo "\n";
                    echo " Datos de los pasajeros \n";
                    for($i=0;$i<$viajeFeliz->cantPasajeros();$i++){
                        echo $viajeFeliz->mostrarDatos_pasajeros($i);
                        echo "\n";
                    }
                }
            break;
            case 4:
                echo "FIN PROGRAMA\n";
                break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 3) \n";
            break;
        }
    }while($opcion != 4);



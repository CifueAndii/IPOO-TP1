<?php
    include_once 'Viaje.php'; 
    include_once 'Pasajero.php';
    include_once 'ResponsableV.php';

    function menuPrincipal(){
        echo " ____________________________________________________________________________\n";
        echo "|                                Menu Principal:                             |\n";
        echo "|                       1) Cargar informacion del viaje                      |\n";
        echo "|                     2) Modificar informacion del viaje                     |\n";
        echo "|                         3) Ver informacion del viaje                       |\n";
        echo "|                           4) Cargar nuevo pasajero                         |\n";
        echo "|                                  5) Salir                                  |\n";
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
        echo "|                        5) Informacion del responsable                      |\n";
        echo "|                               6) Todos sus datos                           |\n";
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
        echo "|                               3) El Telefono                               |\n";
        echo "|                             4) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc3 = trim(fgets(STDIN));
        echo "\n";

        return $opc3;
    }

    function menuModif_info_responsable(){
        echo " ____________________________________________________________________________\n";
        echo "|               ¿Que informacion del responsable desea modificar?            |\n";
        echo "|                             1) Numero empleado                             |\n";
        echo "|                                 2) Nombre                                  |\n";
        echo "|                                3) Apellido                                 |\n";
        echo "|                             4) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc3 = trim(fgets(STDIN));
        echo "\n";

        return $opc3;
    }

    function cargaViaje($viaje){
        echo "Ingrese el codigo del viaje: ";
        $codigoViaje = trim(fgets(STDIN));
        echo "Ingrese el destino del viaje: ";
        $destinoViaje = trim(fgets(STDIN));
        echo "Ingrese la capacidad maxima de pasajeros del viaje: ";
        $cantMax_viaje = trim(fgets(STDIN));

        $colPasajeros = cargarPasajeros($viaje,$cantMax_viaje);

        echo "Informacion del responsable\n";
            echo "Ingrese el numero de empleado del responsable: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Ingrese el numero de licencia del responsable: ";
            $numeroLicencia = trim(fgets(STDIN));
            echo "Ingrese el nombre del responsable: ";
            $nombreResponsable = trim(fgets(STDIN));
            echo "Ingrese el apellido del responsable: ";
            $apellidoResponsable = trim(fgets(STDIN));

        $objResponsable = new ResponsableV($numeroEmpleado,$numeroLicencia,$nombreResponsable,$apellidoResponsable);
        $viaje->setCodigo($codigoViaje);
        $viaje->setDestino($destinoViaje); 
        $viaje->setCantidad_maxima($cantMax_viaje);
        $viaje->setPasajeros($colPasajeros);
        $viaje->setResponsable($objResponsable);
    }

    function cargarPasajeros($elViaje,$cantMax){
        $pasajeros = array();
        $ingreso = "s";
        $cantPasajeros = 0;

        while($ingreso == "s" && $cantPasajeros <= $cantMax){
            echo "Informacion de los pasajeros\n";
            echo "Ingrese el nombre del pasajero: ";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el dni del pasajero: ";
            $dniPasajero = trim(fgets(STDIN));
            echo "Ingrese el telefono del pasajero: ";
            $telefonoPasajero = trim(fgets(STDIN));

            $posiblePasajero = new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero);
            $cargado = $elViaje->pasajeroYaCargado($dniPasajero);

            if($cargado){
                mensajePasajeroYaCargado();
            }elseif($ingreso == "s"){
                $pasajeros[$cantPasajeros] = $posiblePasajero;
                $elViaje->setPasajeros($pasajeros);
                $cantPasajeros++;
            }
            echo "\nDesea ingresar otro pasajero? (s/n): ";
            $ingreso = trim(fgets(STDIN));
            echo "\n";
        }
        if($cantPasajeros == $cantMax){
            echo "Se llego a la capacidad maxima de pasajeros!! \n";
        }

        return $pasajeros;
    }

    function modificarViaje($elViaje,$eleccion){

        switch($eleccion){
            case 1:
                echo $elViaje->getCodigo() . " es el codigo actual \n";
                echo "Se cambiara a: ";
                $nuevoCodigo = trim(fgets(STDIN));
                $elViaje->setCodigo($nuevoCodigo);
                echo "Se cambio correctamente a " . $elViaje->getCodigo() . "\n";
            break;
            case 2:
                echo $elViaje->getDestino() . " es el destino actual \n";
                echo "Se cambiara a: ";
                $nuevoDestino = trim(fgets(STDIN));
                $elViaje->setDestino($nuevoDestino);
                echo "Se cambio correctamente a " . $elViaje->getDestino() . "\n";
            break;
            case 3:
                echo $elViaje->getCantidad_maxima() . " es la capacidad maxima actual \n";
                echo "Se cambiara a: ";
                $nuevaCantMax = trim(fgets(STDIN));
                $elViaje->setCantidad_maxima($nuevaCantMax);
                echo "Se cambio correctamente a " . $elViaje->getCantidad_maxima() . "\n";
            break;
            case 4:
                modificarInfo_Pasajero($elViaje);
            break;
            case 5:
                modificarInfo_Responsable($elViaje);
            break;
            case 6:
                echo $elViaje->getCodigo() . " es el codigo actual \n";
                echo "Se cambiara a: ";
                $nuevoCodigo = trim(fgets(STDIN));
                echo $elViaje->getDestino() . " es el destino actual \n";
                echo "Se cambiara a: ";
                $nuevoDestino = trim(fgets(STDIN));
                echo $elViaje->getCantidad_maxima() . " es la capacidad maxima actual \n";
                echo "Se cambiara a: ";
                $nuevaCantMax = trim(fgets(STDIN));
                $elViaje->modificaViaje($nuevoCodigo,$nuevoDestino,$nuevaCantMax);
                modificarInfo_Pasajero($elViaje);
                modificarInfo_Responsable($elViaje);
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 6) \n";
            break;
        }
    }

    function modificarInfo_Pasajero($viaje){
        $totalPasajeros = $viaje->cantPasajeros();
        $pasajeros = $viaje->getPasajeros();

        echo "En el viaje hay " . $totalPasajeros . " pasajeros \n";
        echo $viaje->mostrarDatos_pasajeros();
        echo "Ingrese el dni del pasajero que quiere modificar su informacion: ";
        $dniPasajero = trim(fgets(STDIN));
        $indPasaj = $viaje->buscarPasajero($dniPasajero);

        if($indPasaj != -1){
            $unPasajero = $pasajeros[$indPasaj]; 
            switch(menuModif_info_pasajero()){
                case 1:
                    echo $unPasajero->getNombre() . " es el nombre actual \n";
                    echo "Se cambiara a: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    $unPasajero->setNombre($nuevoNombre);
                    echo "Se cambio correctamente a " . $unPasajero->getNombre() . "\n";
                break;
                case 2:
                    echo $unPasajero->getApellido() . " es el apellido actual \n";
                    echo "Se cambiara a: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    $unPasajero->setApellido($nuevoApellido);
                    echo "Se cambio correctamente a " . $unPasajero->getApellido() . "\n";
                break;
                case 3:
                    echo $unPasajero->getTelefono() . " es el telefono actual \n";
                    echo "Se cambiara a: ";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $unPasajero->setTelefono($nuevoTelefono);
                    echo "Se cambio correctamente a " . $unPasajero->getTelefono() . "\n";
                break;
                case 4:
                    echo $unPasajero->getNombre() . " es el nombre actual \n";
                    echo "Se cambiara a: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo $unPasajero->getApellido() . " es el apellido actual \n";
                    echo "Se cambiara a: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo $unPasajero->getTelefono() . " es el telefono actual \n";
                    echo "Se cambiara a: ";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $unPasajero->modificaInfo_Pasajero($nuevoNombre,$nuevoApellido,$nuevoTelefono);
                    echo "\nSe cambiaron correctamente los datos!! \n";
                break;
                default:
                    echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 4) \n";
                break;
            }
        }else{
            echo "No existe un pasajero con ese nro de documento!! \n";
        }        
    }

    function modificarInfo_Responsable($unViaje){
        $responsable = $unViaje->getResponsable();

        switch(menuModif_info_responsable()){
            case 1:
                echo $responsable->getNumEmpleado() . " es el numero de empleado \n";
                echo "Se cambiara a: ";
                $nuevoNumEmpleado = trim(fgets(STDIN));
                $responsable->setNumEmpleado($nuevoNumEmpleado);
                echo "Se cambio correctamente a " . $responsable->getNumEmpleado() . "\n";
            break;
            case 2:
                echo $responsable->getNombre() . " es el nombre \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                $responsable->setNombre($nuevoNombre);
                echo "Se cambio correctamente a " . $responsable->getNombre() . "\n";
            break;
            case 3:
                echo $responsable->getApellido() . " es el apellido \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->setApellido($nuevoApellido);
                echo "Se cambio correctamente a " . $responsable->getApellido() . "\n";
            break;
            case 4:
                echo $responsable->getNumEmpleado() . " es el numero de empleado \n";
                echo "Se cambiara a: ";
                $nuevoNumEmpleado = trim(fgets(STDIN));
                echo $responsable->getNombre() . " es el nombre \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo $responsable->getApellido() . " es el apellido \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->modificaInfo_Responsable($nuevoNumEmpleado,$nuevoNombre,$nuevoApellido);
                echo "Se cambiaron correctamente los datos \n";
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 4) \n";
            break;
        }

    }

    function mensajePasajeroYaCargado(){
        echo "\n" .
             "No se pudo cargar el pasajero, ya esta registrado ese Dni!!! \n";
    }

    function pasajeroNuevo($elViaje){
        $pasajeros = $elViaje->getPasajeros();

        echo "Ingrese el nombre del pasajero: ";
        $nombrePasajero = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero: ";
        $apellidoPasajero = trim(fgets(STDIN));
        echo "Ingrese el dni del pasajero: ";
        $dniPasajero = trim(fgets(STDIN));
        echo "Ingrese el telefono del pasajero: ";
        $telefonoPasajero = trim(fgets(STDIN));

        $posiblePasajero = new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero);
        $cargado = $elViaje->pasajeroYaCargado($dniPasajero);

        if($cargado){
            mensajePasajeroYaCargado();
        }else{
            array_push($pasajeros,$posiblePasajero);
            $elViaje->setPasajeros($pasajeros);
            echo "\nSe cargo el nuevo pasajero!! \n";
        }
    }

    //PROGRAMA principal
    $viajeFeliz = new Viaje(0,"",0,[],"");
    do{
        $opcion = menuPrincipal();
        switch ($opcion){
            case 1: 
                if($viajeFeliz->getCodigo() > 0){
                    echo "Ya se cargaron los datos!! Debe modificarlos (Opcion 2) o cargar un nuevo pasajero (Opcion 4)\n";
                }else{
                    cargaViaje($viajeFeliz);
                    echo "\nSe cargo correctamente la informacion!! \n";
                    echo "\n";
                }

            break;
            case 2: 
                if($viajeFeliz->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    $opcion2 = menuModificacion_viaje();
                    modificarViaje($viajeFeliz,$opcion2);
                }

            break;
            case 3:
                if($viajeFeliz->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    echo $viajeFeliz->__toString();
                    echo "\n";
                }
            break;
            case 4:
                if($viajeFeliz->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    pasajeroNuevo($viajeFeliz);
                }
                break;
            case 5:
                echo "FIN PROGRAMA\n";
                break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 5) \n";
            break;
        }
    }while($opcion != 5);



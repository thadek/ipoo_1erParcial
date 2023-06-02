<?php

include_once("Cliente.php");
include_once("Concesionaria.php");
include_once("Vehiculo.php");
include_once("Venta.php");
include_once("VehiculoNacional.php");
include_once("VehiculoImportado.php");


//1) crear 2 instancias de tipo cliente
$objCliente1 = new Cliente("Marta","Perez",true,"DNI",12345678);
$objCliente2 = new Cliente("Pedro", "Gonzalez",true,"DNI",32111654);

//2 a) Crear 3 obj vehiculo NACIONALES 
$vehiculo1 = new VehiculoNacional(11,50000,2020,"Wolkswagen POLO TRENDLINE",0.85,true,10);
$vehiculo2 = new VehiculoNacional(12,10000,2021,"RAM 1500 Laramie",0.70,true,10);
$vehiculo3 = new VehiculoNacional(13,10000,2022,"Jeep Renegade 1.8 Sport",0.55,false);


//2 b) Crear 1 obj vehiculo IMPORTADO
$vehiculo4 = new VehiculoImportado(14,12499900,2020,"Ferrari",1,true,"Italia",6244400);


// 3) Crear obj empresa 
$colVehiculos = [$vehiculo1,$vehiculo2,$vehiculo3,$vehiculo4];
$colClientes = [$objCliente1,$objCliente2];
$empresa = new Concesionaria("Alta Gama","Av. Argentina 123",$colClientes,$colVehiculos,[]);


/**
 * 4)
 * Invocar al método  registrarVenta($colCodigosVehiculo, $objCliente) 
 * de la Clase Empresa donde el $objCliente es una referencia a la clase 
 * Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y 
 * la colección de códigos de vehículos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.
 */

 echo "VENTA 1: \n $" . $empresa->registrarVenta([11,12,13,14],$objCliente2);

 /**
  * 5)Invocar al método  registrarVenta($colCodigosVehículos, $objCliente) de la 
  *Clase Empresa donde el $objCliente es una referencia a la clase 
  *Cliente almacenada en la variable $objCliente2 (creada en el punto 1) 
  *y la colección de códigos de vehículos es la siguiente [0,14].  Visualizar el resultado obtenido.
  */

  echo "\nVENTA 2: \n $" . $empresa->registrarVenta([0,14],$objCliente2);


  /**
   * 6) Invocar al método  registrarVenta($colCodigosVehículos, $objCliente) 
   * de la Clase Empresa donde el $objCliente es una referencia a la clase 
   * Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y 
   * la colección de códigos de vehículos es la siguiente [2,14].  
   * Visualizar el resultado obtenido.
   */

   echo "\n VENTA 3: \n $". $empresa->registrarVenta([2,14],$objCliente2);


   /**
    * 7) Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido.
    */
    echo "\nVentas importadas: \n";
    print_r ($empresa->informarVentasImportadas());


    /**
     * 8) Invocar al método  informarSumaVentasNacionales().  Visualizar el resultado obtenido.
     */
    echo "\n Suma de Ventas Nacionales: \n $". $empresa->informarSumaVentasNacionales();


    /**
     * 9)
     * Realizar un echo de la variable Empresa creada en 3.
     */
    echo "\n --- ECHO EMPRESA -----------------------------------------------------\n" . $empresa;






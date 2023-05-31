<?php

include_once("Cliente.php");
include_once("Concesionaria.php");
include_once("Vehiculo.php");
include_once("Venta.php");


//1) crear 2 instancias de tipo cliente
$objCliente1 = new Cliente("Marta","Perez",true,"DNI",12345678);
$objCliente2 = new Cliente("Pedro", "Gonzalez",true,"DNI",32111654);

//2) Crear 3 obj vehiculos con la info subministrada.-
$vehiculo1 = new Vehiculo(11,50000,2020,"Wolkswagen POLO TRENDLINE",1.85,true);
$vehiculo2 = new Vehiculo(12,10000,2021,"RAM 1500 Laramie",1.70,true);
$vehiculo3 = new Vehiculo(13,10000,2022,"Jeep Renegade 1.8 Sport",1.55,false);

// 3) Crear obj empresa con datos de arriba.
$colVehiculos = [$vehiculo1,$vehiculo2,$vehiculo3];
$colClientes = [$objCliente1,$objCliente2];
$empresa = new Concesionaria("Alta Gama","Av. Argentina 123",$colClientes,$colVehiculos,[]);


/**
 * Invocar al método  registrarVenta($colCodigosVehiculo, $objCliente) 
 * de la Clase Empresa donde el $objCliente es una referencia a la clase 
 * Cliente almacenada en la variable $objCliente2 (creada en el punto 1) 
 * y la colección de códigos de vehículos es la siguiente [11,12,13]. 
 * Visualizar el resultado obtenido.
 */

 echo "VENTA 1: " . $empresa->registrarVenta([11,12,13],$objCliente2);

 /**
  * Invocar al método  registrarVenta($colCodigosVehículos, $objCliente) de la 
  *Clase Empresa donde el $objCliente es una referencia a la clase Cliente 
  *almacenada en la variable $objCliente2 (creada en el punto 1) 
  *y la colección de códigos de vehículos es la siguiente [0].  
  *Visualizar el resultado obtenido.
  * 
  */

echo "\nVENTA 2: " . $empresa->registrarVenta([0],$objCliente2);



/**
 * Invocar al método  
 * registrarVenta($colCodigosVehículos, $objCliente) de 
 * la Clase Empresa donde el $objCliente es una referencia a 
 * la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) 
 * y la colección de códigos de vehículos es la siguiente [2].  
 * Visualizar el resultado obtenido.
 */

 echo "\n VENTA 3: " . $empresa->registrarVenta([2],$objCliente2);


 /**
  * Invocar al método retornarVentasXCliente($tipo,$numDoc)  
  *donde el tipo y número de documento se corresponden con el tipo y 
  *número de documento del $objCliente1.

  */
echo "\nVentas cliente 1 :";
print_r ($empresa->retornarVentasXCliente("DNI",12345678));

/**
 * Invocar al método retornarVentasXCliente($tipo,$numDoc)  
 * donde el tipo y número de documento se corresponden con  
 * el tipo y número de documento del $objCliente2
 */

 echo "\nVentas cliente 2: ";
 print_r ($empresa->retornarVentasXCliente("DNI",32111654));

 /**
  * Realizar un echo de la variable Empresa creada en 2.
  */

  echo $empresa;


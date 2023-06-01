<?php

require_once("Venta.php");

class Concesionaria {

    private $denominacion;
    private $direccion;
    private $clientes; 
    private $vehiculos; 
    private $ventasRealizadas; 

    public function __construct($denominacion, $direccion, $clientes, $vehiculos, $ventasRealizadas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->vehiculos = $vehiculos;
        $this->ventasRealizadas = $ventasRealizadas;
    }


    //Metodos de acceso.
    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getClientes(){
        return $this->clientes;
    }

    public function getVehiculos(){
        return $this->vehiculos;
    }

    public function getVentasRealizadas(){
        return $this->ventasRealizadas;
    }

    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setClientes($clientes){
        $this->clientes = $clientes;
    }

    public function setVehiculos($vehiculos){
        $this->vehiculos = $vehiculos;
    }

    public function setVentasRealizadas($ventasRealizadas){
        $this->ventasRealizadas = $ventasRealizadas;
    }


    /**
     * Retorna un string mostrando los clientes que contiene el arreglo de clientes de la concesionaria.
     */
    public function mostrarClientes(){
        $respuesta = "";
        $clientes = $this->getClientes();
        for($i=0;$i<count($clientes);$i++){
            $respuesta.= $clientes[$i]. "\n";
        }
        return $respuesta;
    }

    public function mostrarVehiculos(){
        $respuesta = "";
        $vehiculos = $this->getVehiculos();
        for($i=0;$i<count($vehiculos);$i++){
            $respuesta.= $vehiculos[$i] . "\n";
        }
        return $respuesta;
    }

    public function mostrarVentasRealizadas(){
        $respuesta = "";
        $ventas = $this->getVentasRealizadas();
        for($i=0;$i<count($ventas);$i++){
            $respuesta.= $ventas[$i] . "\n";
        }
        return $respuesta;
    }



    //toString
    public function __toString(){
        return "Concesionaria: " .
        "\nDenominación: " . $this->getDenominacion() .
        "\nDireccion: " . $this->getDireccion() .
        "\nClientes: "  . $this->mostrarClientes() .
        "\nVehiculos: " . $this->mostrarVehiculos() .
        "\nVentas Realizadas: " . $this->mostrarVentasRealizadas();

    }

    /**
     * Recibe un codigo de vehiculo, recorre el arreglo de vehiculos de la empresa
     * si encuentra el codigo devuelve la referencia, sino devuelve null.
     * @param int $codigoV
     * @return Vehiculo
     */
    public function retornarVehiculo($codigoV){
        //Recorrido parcial del arreglo de vehiculos.-
        $i = 0;
        $corte = false;
        $retorno = null;
        $vehiculos = $this->getVehiculos();
        while($i<count($vehiculos) && !$corte){
            if($vehiculos[$i]->getCodigo() === $codigoV){
                $retorno = $vehiculos[$i];
                $corte = true;
            }
            $i++;
        }
        return $retorno;
    }


    /**
     * Esta funcion recibe una coleccion de codigos de vehiculos y un objeto cliente.
     */
    public function registrarVenta($colCodigosVehiculos,$objCliente){
        
        //Verifico que el cliente este activo
        $vehiculosAVender= array();
        $retorno = 0;
        
        if($objCliente->getIsActivo()){
            
            $venta = new Venta(date("d/m/Y"),$objCliente,$vehiculosAVender);

        //Recorro la coleccion de codigos y agrego a la venta los vehiculos que coincidan con el codigo.
            for($i=0;$i<count($colCodigosVehiculos);$i++){
                $vehiculo = $this->retornarVehiculo($colCodigosVehiculos[$i]);
                if($vehiculo != null){
                    $venta->incorporarVehiculo($vehiculo);
                }

            }

            //Agrego la venta al arreglo de ventas de la concesionaria.
            $ventas = $this->getVentasRealizadas();
            array_push($ventas,$venta);
            $this->setVentasRealizadas($ventas);

            $retorno = $venta->getPrecioFinal();
        }

        return $retorno;
        


    }


    /**
     * Recibe tipo y nroDoc de un cliente y retorna un array con las ventas asociadas a ese cliente.
     * @param string $tipo
     * @param int $nroDoc
     * @return array
     */
    public function retornarVentasXCliente($tipo,$nroDoc){
        $arrVentas = $this->getVentasRealizadas();
        $arrVentasCliente = array();
        for($i=0;$i<count($arrVentas);$i++){
            if($arrVentas[$i]->getCliente()->getTipoDni() === $tipo && $arrVentas[$i]->getCliente()->getDni() === $nroDoc){
                array_push($arrVentasCliente,$arrVentas[$i]);
            }
        }
        
        return $arrVentasCliente;
    }




}
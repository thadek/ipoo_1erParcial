<?php

class Venta {
    
    private $numero;
    private $fecha;
    private $cliente;
    private $vehiculos;
    private $precioFinal;

        
    public function __construct($fecha,$cliente,$vehiculos){
        //Genero un numero de venta desde una variable clase.-
        $this->numero = $this->generarNumero();
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->vehiculos = $vehiculos;
        //El precio final no se setea ya que se va calculando en otra funcion.-
        $this->precioFinal = 0;
    }

    private function generarNumero(){
        return rand(1,1000);
    }

    //Metodos de acceso
    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function getVehiculos(){
        return $this->vehiculos;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function setVehiculos($vehiculos){
        $this->vehiculos = $vehiculos;
    }

    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    public function mostrarArrVehiculos(){
        $mensaje = "";
        $vehiculos = $this->getVehiculos();
        for($i=0; $i<count($vehiculos);$i++){
            $mensaje.= "\n" . $vehiculos[$i] . "\n";
        }
        return $mensaje;
    }


    public function __toString(){
        return "Venta: \n Numero:" . $this->getNumero() 
        . "\n Fecha: ". $this->getFecha() 
        . "\n Cliente: ". $this->getCliente() 
        . "\n Vehiculos: ". $this->mostrarArrVehiculos() 
        . "\n Precio Final: ". $this->getPrecioFinal() . "\n";
    }

    /**
     * Esta funcion agrega un objeto vehiculo a la coleccion de la clase y retorna true o false
     * dependiendo si se pudo agregar el vehiculo (Es decir si esta activo para venta.) 
     * @param Vehiculo $objVehiculo
     * @return bool
     */
    public function incorporarVehiculo($objVehiculo){

        $arrVehiculos = $this->getVehiculos();
        $precioFinal =  $this->getPrecioFinal();
        $retorno = false;
        if($objVehiculo->getActivo()){
            //Agrego al arreglo de vehiculos el obj vehiculo
            array_push($arrVehiculos,$objVehiculo);
            //Seteo el nuevo arreglo de vehiculos
            $this->setVehiculos($arrVehiculos);
            //Sumo al precio final el vehiculo agregado
            $precioFinal+=$objVehiculo->darPrecioVenta();
            $this->setPrecioFinal($precioFinal);
            $retorno = true;
        }

        return $retorno;

    }


}
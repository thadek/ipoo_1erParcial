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


    //SEGUNDO PARCIAL DESDE AQUÍ----------------------------------------------


    /**
     * Esta funcion retorna el precio final de la sumatoria de los vehiculos de fabricacion nacional. 
     * Si no hay vehiculos o no hay vehiculos nacionales retorna 0.
     * @return float
     */
    public function retornarTotalVentaNacional()
    {

        $precioFinalNacionales = 0;
        //Recorro la coleccion de vehiculos y voy sumando los precios de venta de los vehiculos que sean nacionales.-
        $arrVehiculos = $this->getVehiculos();
        $cantidadVehiculos = count($arrVehiculos);
        //Verifico que existan vehiculos en la venta.
        if($cantidadVehiculos>0){
            for($i=0;$i<$cantidadVehiculos;$i++){
                if($arrVehiculos[$i] instanceof VehiculoNacional){
                    $precioFinalNacionales += $arrVehiculos[$i]->darPrecioVenta();
                }
            }
        }
        
        return $precioFinalNacionales;
    }



    /**
     * Retorna una coleccion de vehiculos que sean importados asociados a esta venta. En caso de no
     * haber vehiculos importados retorna un arreglo vacío.
     * @return array
     */
    public function retornarVehiculoImportado()
    {
        
        $colVehiculosImp = [];
        $vehiculos = $this->getVehiculos();
        $cantVehiculos = count($vehiculos);

        //Si poseo vehiculos en la venta ingreso al if.
        if($cantVehiculos>0){
            //Recorro colección de vehiculos.- Si el vehiculo es importado lo agrego a la coleccion de vehiculos importados.
            for($i=0;$i<$cantVehiculos;$i++){
                if($vehiculos[$i] instanceof VehiculoImportado){
                    array_push($colVehiculosImp,$vehiculos[$i]);
                }
            }
        }
        return $colVehiculosImp;
        
    }







}
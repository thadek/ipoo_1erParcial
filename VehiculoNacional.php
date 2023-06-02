<?php

include_once("Vehiculo.php");

class VehiculoNacional extends Vehiculo {

    private $porcDescuento;

    public function __construct($codigo,$costo,$anioFabric,$descripcion,$porcIncrementoAnual,$activo,$porcDescuento = 15){
        parent::__construct($codigo,$costo,$anioFabric,$descripcion,$porcIncrementoAnual,$activo);
        $this->porcDescuento = $porcDescuento;
    }
   
    public function getPorcDescuento(){
        return $this->porcDescuento;
    }

    public function setPorcDescuento($porcDescuento){
        $this->porcDescuento = $porcDescuento;
    }


    /**
     * Este metodo calcula el precio de venta del vehiculo utilizando el metodo del padre y luego le resta
     * el porcentaje de descuento por ser vehiculo de fabricación nacional.
     */
    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        if($precioVenta>0){
            $precioVenta = $precioVenta - ($precioVenta * $this->porcDescuento/100);
        }
    
        return $precioVenta;
    }

    public function __toString()
    {
        return parent::__toString() . 
        "\nPorcentaje de descuento: " . $this->porcDescuento;
    }


}
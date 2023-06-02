<?php

class Vehiculo {

private $codigo;
private $costo;
private $anioFabric;
private $descripcion;
private $porcIncrementoAnual;
private $activo;


//Constructor
public function __construct($codigo,$costo,$anioFabric,$descripcion,$porcIncrementoAnual,$activo){
    $this->codigo = $codigo;
    $this->costo = $costo;
    $this->anioFabric = $anioFabric;
    $this->descripcion = $descripcion;
    $this->porcIncrementoAnual = $porcIncrementoAnual;
    $this->activo = $activo;
}

//Metodos de acceso
public function getCodigo(){
    return $this->codigo;
}

public function getCosto(){
    return $this->costo;
}

public function getAnioFabric(){
    return $this->anioFabric;
}

public function getDescripcion(){
    return $this->descripcion;
}

public function getPorcIncrementoAnual(){
    return $this->porcIncrementoAnual;
}

public function getActivo(){
    return $this->activo;
}

public function setCodigo($codigo){
    $this->codigo = $codigo;
}

public function setCosto($costo){
    $this->costo = $costo;
}

public function setAnioFabric($anioFabric){
    $this->anioFabric = $anioFabric;
}

public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
}

public function setPorcIncrementoAnual($porcIncrementoAnual){
    $this->porcIncrementoAnual = $porcIncrementoAnual;
}

public function setActivo($activo){
    $this->activo = $activo;
}

/**
 * el cual calcula el valor por el cual puede ser vendido un vehículo. 
 * Si el vehículo no se encuentra disponible para la venta retorna un valor < 0. 
 * Si el vehículo está disponible para la venta, el método realiza el siguiente cálculo: 
*  $_venta = $_compra + $_compra * (anio * por_inc_anual)

 *  
 */
public function darPrecioVenta(){
    $anioActual = date("Y");
    $retorno = -1;
    $costo = $this->getCosto();
    $cantAniosVehiculo = $anioActual - $this->getAnioFabric() ;
    if($this->getActivo()){
        $retorno = $costo + $costo*($cantAniosVehiculo*($this->getPorcIncrementoAnual()));
    }
    return $retorno;
}





public function __toString(){
    return "Vehiculo: \n Codigo:". $this->getCodigo() .
     "\nCosto: " . $this->getCosto() .
      "\nanioFabric: " . $this->getAnioFabric().
      "\nDescripcion:" . $this->getDescripcion().
      "\nPorcIncrementoAnual: " . $this->getPorcIncrementoAnual().
      "\n Activo: " . ($this->getActivo()? "SI" : "NO");
}

}
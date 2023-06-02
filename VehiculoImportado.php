<?php
include_once("Vehiculo.php");

class VehiculoImportado extends Vehiculo
{

    private $paisOrigen;
    private $impuestosImportacion;

    public function __construct($codigo, $costo, $anioFabric, $descripcion, $porcIncrementoAnual, $activo, $paisOrigen, $impuestosImportacion)
    {
        parent::__construct($codigo, $costo, $anioFabric, $descripcion, $porcIncrementoAnual, $activo);
        $this->paisOrigen = $paisOrigen;
        $this->impuestosImportacion = $impuestosImportacion;
    }

    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    public function getImpuestosImportacion()
    {
        return $this->impuestosImportacion;
    }

    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }

    public function setImpuestosImportacion($impuestosImportacion)
    {
        $this->impuestosImportacion = $impuestosImportacion;
    }

    public function __toString()
    {
        return parent::__toString() .
            "\nPais de origen: " . $this->paisOrigen .
            "\nImpuestos de importacion: " . $this->impuestosImportacion;
    }

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta > 0) {
            $precioVenta = $precioVenta + $this->impuestosImportacion;
        }
        return $precioVenta;
    }
}

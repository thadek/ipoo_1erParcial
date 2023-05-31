<?php

class Cliente {

    private $nombre;
    private $apellido;
    private $isActivo; //Valida si esta dado de baja.
    private $tipoDni;
    private $dni;


        //Constructor
    public function __construct($nombre,$apellido,$isActivo,$tipoDni,$dni){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->isActivo = $isActivo;
        $this->tipoDni = $tipoDni;
        $this->dni = $dni;
    }

    //Metodos de acceso
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }


    public function getIsActivo(){
        return $this->isActivo;
    }

    public function getTipoDni(){
        return $this->tipoDni;
    }

    public function getDni(){
        return $this->dni;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setIsActivo($isActivo){
        $this->isActivo = $isActivo;
    }


    public function setTipoDni($tipoDni){
        $this->tipoDni = $tipoDni;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }


    public function __toString(){
        return "Cliente: \n Nombre:" . $this->getNombre() 
        . "\n Apellido: ". $this->getApellido() 
        . "\n isActivo: " . ($this->getIsActivo()? "SI" : "NO") 
        . "\n Tipo DNI:" . $this->getTipoDni() 
        . "\n Nro DNI ". $this->getDni();
    }



}
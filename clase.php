<?php

class Alumno {
    
    private $cedula;
    private $nombre;
    private $notaMatematicas;
    private $notaFisica;
    private $notaProgramacion;


    public function getCedula(){
        return $this->cedula;
    }

    public function setCedula($cedula){
        $this->cedula =$cedula;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    public function getnotaMatematicas(){
        return $this->notaMatematicas;
    }

    public function setnotaMatematicas($notaMatematicas){
        $this->notaMatematicas =$notaMatematicas;
    }

    public function getnotaFisica(){
        return $this->notaFisica;
    }

    public function setnotaFisica($notaFisica){
        $this->notaFisica =$notaFisica;
    }

    public function getnotaProgramacion(){
        return $this->notaProgramacion;
    }

    public function setnotaProgramacion($notaProgramacion){
        $this->notaProgramacion =$notaProgramacion;
    }








}











?>
<?php

class Queso {

    private $ID;
    private $Nombre;
    private $Procedencia;
    private $Descripcion;
    private $Sabor;
    private $Tipo;
    private $Imagen;

    public function __construct() {
        
    }

    public function getID() {
        return $this->ID;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getProcedencia() {
        return $this->Procedencia;
    }

    public  function getDescripcion() {
        return $this->Descripcion;
    }
    public  function getSabor() {
        return $this->Sabor;
    }
    public  function getTipo() {
        return $this->Tipo;
    }
    public  function getImagen() {
        return $this->Imagen;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setNombre($name) {
        $this->Nombre = $name;
    }

    public function setProcedencia($avatar) {
        $this->Procedencia = $avatar;
    }

    function setDescripcion($descripcion) {
        $this->Descripcion = $descripcion;
    }
    
    function setSabor($sabor) {
        $this->Sabor = $sabor;
    }
    
    function setTipo($tipo) {
        $this->Tipo = $tipo;
    }
    
    function setImagen($imagen) {
        $this->Imagen = $imagen;
    }

//Función para pintar cada criatura
    function creature2HTML() {
        $result = '<div class=" col-md-4 ">';
         $result .= '<div class="card ">';
          $result .= ' <img class="card-img-top rounded mx-auto d-block avatar" src='.$this->getImagen().' alt="Card image cap">';
            $result .= '<div class="card-block">';
                $result .= '<h2 class="card-title">' . $this->getNombre() . '</h2>';
                $result .= '<p class=" card-text description">'.$this->getDescripcion().'</p>';
                $result .= '<p class=" card-text description">'.$this->getProcedencia().'</p>'; 
                $result .= '<p class=" card-text description">'.$this->getSabor().'</p>'; 
                $result .= '<p class=" card-text description">'.$this->getTipo().'</p>'; 
             $result .= '</div>';
             $result .= ' <div  class=" btn-group card-footer" role="group">';
                $result .= '<a type="button" class="btn btn-secondary" href="app/views/detail.php?id='.$this->getID().'">Detalles</a>';
                $result .= '<a type="button" class="btn btn-success" href="app/views/edit.php?id='.$this->getID().'">Modificar</a> ';
                $result .= '<a type="button" class="btn btn-danger" href="app/controllers/deleteController.php?id='.$this->getID().'">Borrar</a> ';
            $result .= ' </div>';
         $result .= '</div>';
     $result .= '</div>';
        
        
        return $result;
    }
    
    
}

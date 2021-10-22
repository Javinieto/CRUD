<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CheeseDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Cheese.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editAction();
}

function editAction() {
    
    $ID = $_POST["id"];
    $Nombre = $_POST["name"];
    $Procedencia = $_POST["procedencia"];
    $Descripcion = $_POST["descripcion"];
    $Sabor = $_POST["sabor"];
    $Tipo = $_POST["tipo"];
    $Imagen = $_POST["imagen"];

    $cheese = new Queso();
    $cheese->setID($ID);
    $cheese->setNombre($Nombre);
    $cheese->setProcedencia($Procedencia);
    $cheese->setDescripcion($Descripcion);
    $cheese->setSabor($Sabor);
    $cheese->setTipo($Tipo);
    $cheese->setImagen($Imagen);

    $CheeseDAO = new QuesoDAO();
    $CheeseDAO->update($cheese);

    header('Location: ../../index.php');
}

?>


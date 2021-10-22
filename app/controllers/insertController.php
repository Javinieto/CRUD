<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CheeseDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Cheese.php');
require_once(dirname(__FILE__) . '/../../app/models/validations/ValidationsRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $Nombre = ValidationsRules::test_input($_POST["name"]);
    $Procedencia = ValidationsRules::test_input($_POST["procedencia"]);
    $Descripcion = ValidationsRules::test_input($_POST["descripcion"]);
    $Sabor = ValidationsRules::test_input($_POST["sabor"]);
    $Tipo = ValidationsRules::test_input($_POST["tipo"]);
    $Imagen = ValidationsRules::test_input($_POST["imagen"]);
    // TODOD hacer uso de los valores validados 
    $cheese = new Queso();
    $cheese->setNombre($_POST["name"]);
    $cheese->setProcedencia($_POST["procedencia"]);
    $cheese->setDescripcion($_POST["descripcion"]);
    $cheese->setSabor($_POST["sabor"]);
    $cheese->setTipo($_POST["tipo"]);
    $cheese->setImagen($_POST["imagen"]);

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $CheeseDAO = new QuesoDAO();
    $CheeseDAO->insert($cheese);
    
    header('Location: ../../index.php');
    
}
?>


<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CheeseDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Cheese.php');
$cheeseDAO = new QuesoDAO();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
//Llamo que hace la edición contra BD
    deleteAction();
}

function deleteAction() {
    $id = $_GET["id"];

    $CheeseDAO = new QuesoDAO();
    $CheeseDAO->delete($id);

    header('Location: ../../index.php');
}
?>


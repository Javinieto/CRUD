<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CheeseDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Cheese.php');


function indexAction() {
    $CheeseDAO = new QuesoDAO();
    return $CheeseDAO->selectAll();
}

?>
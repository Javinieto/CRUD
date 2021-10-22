<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');

class QuesoDAO {

    //Se define una constante con el nombre de la tabla
    const CHEESE_TABLE = 'cheesetable';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . QuesoDAO::CHEESE_TABLE;
        $result = mysqli_query($this->conn, $query);
        $quesos = array();
        while ($quesoDB = mysqli_fetch_array($result)) {

            $cheese = new Queso();
            $cheese->setID($quesoDB["ID"]);
            $cheese->setNombre($quesoDB["Nombre"]);
            $cheese->setProcedencia($quesoDB["Procedencia"]);
            $cheese->setDescripcion($quesoDB["Descripcion"]);
            $cheese->setSabor($quesoDB["Sabor"]);
            $cheese->setTipo($quesoDB["Tipo"]);
            $cheese->setImagen($quesoDB["Imagen"]);
            
            array_push($quesos, $cheese);
        }
        return $quesos;
    }

    public function insert($cheese) {
        $query = "INSERT INTO " . QuesoDAO::CHEESE_TABLE .
                " (Nombre, Procedencia, Descripcion, Sabor, Tipo, Imagen) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $cheese->getNombre();
        $procedencia = $cheese->getProcedencia();
        $descripcion = $cheese->getDescripcion();
        $sabor = $cheese->getSabor();
        $tipo = $cheese->getTipo();
        $imagen = $cheese->getImagen();
        
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $procedencia, $descripcion, $sabor, $tipo, $imagen);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT Nombre, Procedencia, Descripcion, Sabor, Tipo, Imagen FROM " . QuesoDAO::CHEESE_TABLE . " WHERE ID=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $procedencia, $descripcion, $sabor, $tipo, $imagen);

        $cheese = new Queso();
        while (mysqli_stmt_fetch($stmt)) {
            $cheese->setID($id);
            $cheese->setNombre($name);
            $cheese->setProcedencia($procedencia);
            $cheese->setDescripcion($descripcion);
            $cheese->setSabor($sabor);
            $cheese->setTipo($tipo);
            $cheese->setImagen($imagen);
       }

        return $cheese;
    }

    public function update($cheese) {
        $query = "UPDATE " . QuesoDAO::CHEESE_TABLE .
                " SET Nombre=?, Procedencia=?, Descripcion=?, Sabor=?, Tipo=?, Imagen=?"
                . " WHERE ID=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $cheese->getNombre();
        $procedencia= $cheese->getProcedencia();
        $descripcion = $cheese->getDescripcion();
        $sabor = $cheese->getSabor();
        $tipo = $cheese->getTipo();
        $imagen = $cheese->getImagen();
        $id = $cheese->getID();
        mysqli_stmt_bind_param($stmt, 'ssssssi', $name, $procedencia, $descripcion, $sabor, $tipo, $imagen, $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . QuesoDAO::CHEESE_TABLE . " WHERE ID=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

        
}

?>

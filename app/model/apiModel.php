<?php
class apiModel {

private $db;

public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=tpo_web2;charset=utf8','root', '');;
}

/**
 * Devuelve la lista de tareas completa.
 */
public function getAll() {
    // 1. abro conexión a la DB
    // ya esta abierta por el constructor de la clase

    // 2. ejecuto la sentencia (2 subpasos)
    $query = $this->db->prepare("SELECT * FROM productos");
    $query->execute();

    // 3. obtengo los resultados
    $productos = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
    
    return $productos;
}

public function get($ID) {
    $query = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
    $query->execute([$ID]);
    $producto = $query->fetch(PDO::FETCH_OBJ);
    return $producto;
}

}


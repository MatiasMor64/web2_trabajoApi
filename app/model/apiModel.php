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

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    //para borrar productos especificos segun la id que le hayamos dado
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);
    }

    function insertar_datos($Producto,$Imagen,$Precio,$Categoria,$Descripcion){
        $query = $this->db->prepare("INSERT INTO productos ( Producto, Imagen, Precio, Categoria, Descripcion) VALUES (?, ?, ?, ?, ?)");
            $query->execute([$Producto,$Imagen,$Precio,$Categoria,$Descripcion]);

            return $this->db->lastInsertId();
    }

    function actualizar_datos($id, $Producto, $Imagen, $Precio, $Categoria, $Descripcion){
        $query = $this->db->prepare("UPDATE productos SET Producto = ?, Imagen = ?, Precio = ?, Categoria = ?, Descripcion = ? WHERE id = ?");
        $query->execute([$Producto,$Imagen,$Precio,$Categoria,$Descripcion,$id]);
        
    }
    function ObtenerProductosOrdenados($orden) {

        $query = $this->db->prepare('SELECT * FROM productos ORDER BY Precio ' . $orden);
        $query->execute();
        
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    
    function ObtenerProductosPorCategoria($id){
        
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id=?');
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        if(!empty($resultado)){
            $categoria= $resultado->Categorias;
            $sentencia = $this->db->prepare('SELECT * FROM productos WHERE Categoria=?');
            $sentencia->execute([$categoria]);
            $productos= $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        } else {
            return false;
        }
    }

}


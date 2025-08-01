<?php
namespace Model;
class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];
    public $id;

    // Alertas y Mensajes
    protected static $alertas = [];
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    // Setear un tipo de Alerta
    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Obtener las alertas
    public static function getAlertas() {
        return static::$alertas;
    }

    // Validación que se hereda en modelos
    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria (Active Record)
    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
   public function sanitizarAtributos() {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach($atributos as $key => $value ) {
        // Evita pasar null al escape_string
        $sanitizado[$key] = is_null($value) ? null : self::$db->escape_string($value);
    }
    return $sanitizado;
}


    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    // Registros - CRUD
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Obtener todos los Registros
    public static function all($orden = 'DESC') {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id {$orden}";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . "  ORDER BY id DESC LIMIT {$limite}" ;
        $resultado = self::consultarSQL($query);
        return $resultado  ;
    }

    // Busqueda Where con Columna 
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;

    }

    public static function ordenar($columna,$orden){
$query = "SELECT * FROM ". static::$tabla. " ORDER BY {$columna} {$orden}";
$resultado = self::consultarSQL($query);
return $resultado;

    }
        public static function ordenarLimite($columna,$orden,$limite){
$query = "SELECT * FROM ". static::$tabla. " ORDER BY {$columna} {$orden} LIMIT {$limite}";
$resultado = self::consultarSQL($query);
return $resultado;

    }

  public static function whereArray($array = [], $extraSQL = '') {
    $query = "SELECT * FROM " . static::$tabla;

    if (!empty($array)) {
        $condiciones = [];

        foreach ($array as $key => $value) {
            $condiciones[] = "{$key} = '" . self::$db->escape_string($value) . "'";
        }

        $query .= " WHERE " . implode(" AND ", $condiciones);
    }

    if (!empty($extraSQL)) {
        $query .= " " . $extraSQL;
    }

    $resultado = self::consultarSQL($query);
    return $resultado;
}



    // total de registros 
   public static function total($columna = '', $valor = '') {
    $query = "SELECT COUNT(*) FROM " . static::$tabla;

    if ($columna) {
        // Escapamos el valor si es string
        if (is_string($valor)) {
            $valor = "'" . self::$db->real_escape_string($valor) . "'";
        }

        $query .= " WHERE {$columna} = {$valor}";
    }

    $resultado = self::$db->query($query);
    $total = $resultado->fetch_array();

    return array_shift($total);
}

  public static function totalArray($array = []) {
    $query = "SELECT COUNT(*) FROM " . static::$tabla;

    if (!empty($array)) {
        $condiciones = [];

        foreach ($array as $key => $value) {
            $condiciones[] = "{$key} = '" . self::$db->escape_string((string)$value) . "'";
        }

        $query .= " WHERE " . implode(" AND ", $condiciones);
    }



    $resultado = self::$db->query($query);
    $total = $resultado->fetch_array();

    return array_shift($total);
}



    public static function paginar($porPagina, $offset){

  $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT {$porPagina} OFFSET {$offset}";
        $resultado = self::consultarSQL($query);
        return  $resultado ;
    }

    // crea un nuevo registro
   public function crear() {
    // Sanitizar los datos
    $atributos = $this->sanitizarAtributos();

    // Normalizar atributos numéricos
    foreach($atributos as $key => $value) {
        if(in_array($key, ['admin', 'confirmado'])) {
            if(!is_numeric($value) || $value === '') {
                $atributos[$key] = 0;
            }
        }
    }

    $query = "INSERT INTO " . static::$tabla . " (";
    $query .= join(', ', array_keys($atributos));
    $query .= ") VALUES (";

    $valores = [];
    foreach ($atributos as $valor) {
        if (is_null($valor) || $valor === '') {
            $valores[] = "NULL";
        } else {
            $valores[] = "'" . $valor . "'";
        }
    }

    $query .= join(', ', $valores);
    $query .= ")";

    $resultado = self::$db->query($query);
    return [
       'resultado' =>  $resultado,
       'id' => self::$db->insert_id
    ];
}


    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}
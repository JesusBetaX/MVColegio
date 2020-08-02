<?php

namespace model;

use libs\DB;

/**
 * Modelo para el recurso Alumno.
 */
class Alumno {
  /** Constante que indicara la ruta para las imagenes. */
  const DIR = 'storage/alumno/';
  
  public $id = 0;
  public $nombre;
  public $apellido;
  public $sexo;
  public $correo;
  public $foto;
  public $fecha_nacimiento;
  public $fecha_registro;
  
  /**
   * Busca todos los recursos.
   * @param $search [opcional] criterio de busqueda.
   * @return array <b>PDOStatement::fetchAll</b>
   */
  public static function search($search = null) {
    // Abrimos la base de datos
    $db = DB::connect();

    $sql = "SELECT * FROM alumno WHERE concat(nombre, apellido, fecha_nacimiento, correo) like ?";
    $val = array('%' . trim($search) . '%');
    // Ejecutamos la consulta.    
    $cursor = $db->query($sql, $val);

    // Establecemos la fabrica de filas, que convierte la fila en un Objeto
    $cursor->row_factory = 'model\Alumno'; //Alumno::class;
    return $cursor/*->fetchAll()*/;
  }

  /**
   * Busca un recurso por su identificador
   * @param $id
   * @return Alumno
   */
  public static function findById($id) {
    // Abrimos la base de datos
    $db = DB::connect();

    // Ejecutamos la consulta.
    $cursor = $db->query('SELECT * FROM alumno WHERE id = ?', array($id));
    
    // Obtenemos la primera fila, y convertimos en un objeto Alumno
    return $cursor->fetchOne('model\Alumno');
  }

  /**
   * Elimina el recurso por su identificador.
   * @param $id
   * @return bool <b>TRUE</b> exito <b>FALSE</b> fallo.
   */
  public static function delete($id) {
    $db = DB::connect();
    return $db->delete('alumno', "id = $id") > 0;
  }

  /**
   * Guarda el recurso.
   * @return bool <b>TRUE</b> exito <b>FALSE</b> fallo.
   */
  public function save() {
    $db = DB::connect();

    if ($this->id != 0) {
      return $db->update('alumno', $this, 'id = ' . $this->id) > 0;
    }
    
    unset($this->id); // quitamos el id
    $this->fecha_registro = date('Y-m-d');
    $this->id = $db->insert('alumno', $this);
    return $this->id > 0;
  }

  /**
   * Obtiene la ruta completa de la foto.
   * @return string.
   */
  public function srcFoto() {
    return empty($this->foto)
            // Si no tine foto. 
            ? 'assets/img/alumno.png'
            // Tiene foto. 
            : self::DIR . $this->foto;
  }

}
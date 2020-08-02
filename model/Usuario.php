<?php

namespace model;

use libs\DB;

/**
 * Modelo para el recurso Usuario.
 */
class Usuario {

  public $id = 0;
  public $nombre;
  public $apellidos;
  public $email;
  public $password;

  /**
   * Autentificación del recurso.
   * @param $u usuario a validar. 
   * @return bool <b>TRUE</b> correcto <b>FALSE</b> incorrecto.
   */
  public static function attemp(Usuario &$u) {
    // Abrimos la base de datos
    $db = DB::connect();

    // Ejecutamos la consulta.
    $cursor = $db->cursor('SELECT * FROM usuario WHERE email = ? AND password = ?');
    $cursor->execute( array($u->email, $u->password) );
    
    // Obtiene la primera fila, y la convierte en un objeto Usuario
    $r = $cursor->fetchOne('model\Usuario');

    if ($r) {
      $u = $r;
      unset($u->password);
      return true;
    }

    return false;
  }

}

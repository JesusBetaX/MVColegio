<?php

namespace libs;

use libs\Config;

final class Session {

  /**
   * Regresa verdadero si un valor adicional es asociado con su nombre en la Session.
   * @param $name nombre del parametro.
   * @return true si el parametro dado está presente.
   */
  public static function has($name) {
    return !empty($_SESSION[$name]);
  }

  /**
   * Regresa el valor asociado con la Session.
   * @param $name nombre del parametro.
   * @param $defaultValue [opcional] valor por defecto.
   * @return parametro asociado.
   */
  public static function get($name, $defaultValue = null) {
    return self::has($name) ? $_SESSION[$name] : $defaultValue;
  }

  /**
   * Asigna un valor a la Session.
   * @param $name nombre del parametro.
   * @param $value parametro.
   */
  public static function set($name, &$value) {
    $_SESSION[$name] = $value;
  }

  /**
   * Remueve un valor asociado a la Session.
   * @param $name nombre del parametro.
   * @return true si se quito el objeto de la sesion.
   */
  public static function remove($name) {
    if (self::has($name)) {
      unset($_SESSION[$name]);
      return true;
    }
    return false;
  }

  /**
   * Destruye todos los elementos de la Session.
   */
  public static function destroy() {
    session_destroy();
  }

}

// iniciamos la sesión!
//$web = Config::getConfig('web');
$cookie = Config::getConfig('cookie');
session_name($cookie['name']);
session_start();

// guardamos las cookie de la sesión!
/*session_set_cookie_params(
    $cookie['lifetime'],
    $cookie['path'],
    $cookie['domain'],
    $cookie['secure'],
    TRUE // HttpOnly; Yes, this is intentional and not configurable for security reasons
);*/

if (isset($_COOKIE[$cookie['name']]) && $_COOKIE[$cookie['name']] === session_id()) {
  setcookie(
    $cookie['name'],  
    session_id(), 
    (empty($cookie['lifetime']) ? 0 : time() + $cookie['lifetime']),
    $cookie['path'], 
    $cookie['domain'], 
    $cookie['secure'], 
    TRUE
  );
}
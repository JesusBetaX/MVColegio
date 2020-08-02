<?php

// -------------------------------------------------------------------
//  CONFIGURACION PARA LA APLICACION
// -------------------------------------------------------------------
error_reporting(E_ALL | E_STRICT);
mb_internal_encoding('UTF-8');


/**
 * Manipulador de errores.
 * @param int $severity
 * @param string  $message
 * @param string  $filepath
 * @param int $line
 */
function handleError($severity, $message, $filepath, $line) {
  require 'view/error/error.php'; exit(1);
}
set_error_handler('handleError');

/**
 * Manipulador de excepciónes.
 * @param Exception $error
 */
function handleException(Exception $error) {
  require 'view/error/exception.php';
}
set_exception_handler('handleException');

/**
 * Cargador de clases. Este metodo se encarga de importar las clases 
 *
 * @param String $name nombre de la clase 'package\class.php'.
 */
function loadClass($name) {
  $name = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, $name);
  if (!file_exists("$name.php")) {
    throw new Exception("Class \"$name.php\" not found.", 404);
  }
  require_once "$name.php";
}
spl_autoload_register('loadClass');



// -------------------------------------------------------------------
//  RECUPERACION DEL CONTROLADOR Y LA ACCION DE LA URL 
// -------------------------------------------------------------------
$webConfig = libs\Config::getConfig('web');

/**
 * -------------------------------------------------------------------
 *  NOMBRE DEL CONTROLADOR
 * -------------------------------------------------------------------
 *
 * Recupera el controlador de la url(index.php?c=Controller), si no se 
 * encontro un controlador se asignara el controlador por default del 
 * "$webConfig". 
 */
$class = ucfirst( 
    array_key_exists('c', $_GET) ? $_GET['c'] : $webConfig['controller']
);

/** 
 * -------------------------------------------------------------------
 *  NOMBRE DE LA ACCION DEL CONTROLADOR A LLAMAR
 * -------------------------------------------------------------------
 *
 * Recupera la acción de la url(index.php?a=Action), si no se encontro 
 * la acción se asignara la acción por default del "$webConfig". 
 */
$method = strtolower(
    array_key_exists('a', $_GET) ? $_GET['a'] : $webConfig['action']
);


// -------------------------------------------------------------------
//  EJECUTAMOS LA APLICACION
// -------------------------------------------------------------------

// Instanciamos el controlador.
$class_path = "controller\\$class"; 
$controller = new $class_path();

// Validamos si existe el metodo en el controlador.
if (!method_exists($controller, $method)) {
  throw new Exception("La función \"$method\" no existe en \"$class\".", 404);
  //throw new Exception("Page Not Found.", 404);
}

// Llama la accion del controlador. Y le pasamos la request.
$return = call_user_func(
  array($controller, $method), new libs\Request()
);


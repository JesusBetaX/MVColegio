<?php

namespace controller;

use libs\Session;

/**
 * Controlador para el inicio
 */
class Home {

  /**
   * Si el usuario inicio sesion podra consumir este controlador, 
   * de lo contrario mostrara el formulario para logerase.
   * @param libs/Request $request
   */
  function __construct() {
    // si el usuario no a iniciado sesion.
    if (!Session::has('usuario')) {
      // redirecciona la paguina para logearse.
      header('Location: ?c=Auth');
      die();
    }
  }

  /**
   * Muetra el inicio de la paguina.
   */
  function index() {
    // mostramos las vistas.
    require 'view/layout/header.php';
    require 'view/home/index.php';
    require 'view/layout/footer.php';
  }
}
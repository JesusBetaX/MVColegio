<?php

namespace controller;

use libs\Request;
use libs\Session;
use model\Usuario;

/**
 * Este contrador solo sirve para autentificar
 * las sesiones del Usuario. Asi como cerrar sesion.
 */
class Auth {
  
  /**
   * Si el usuario inicio sesion mostrara la bienvenida, 
   * de lo contrario mostrara el formulario para logearse.
   * @param libs/Request $request
   */
  function index(Request $request) {
    // si el usuario inicio sesion.
    if (Session::has('usuario')) {
      header('Location: ?c=Home');
      die();
    }
    // el usuario no a iniciado sesion.
    $this->showLoginForm($request);
  }
      
  /**
   * Muestra el formulario para el login.
   * @param \libs\Request  $request
   * @param array $errors  errores que se mostraran 
   * en el formulario [opcional]
   */
  private function showLoginForm(Request $request, $errors = array()) {
    // mostramos la vista.
    require 'view/auth/login.php';
  }
  
  /**
   * Maneja una petición de entrada al sistema.
   * Es decir valida la entrada al usuario.
   * @param  \libs\Request  $request
   */
  function login(Request $request) {
    $u = new Usuario();
    $u->email = $request->get('email');
    $u->password = $request->get('password');

    // valida si los datos del usuario fueron correctos.
    if (Usuario::attemp($u)) {
      // guarda el usuario en la session.
      Session::set('usuario', $u);
      // muestra la bienvenida (home).
      header('Location: ?c=Home');
      die();
    }

    // Si los datos son incorrectos.
    $this->showLoginForm($request, array(
        'email' => 'Tus datos son incorrectos.'
    ));
  }
  
  /**
   * Cierra la sesion para el usuario.
   */
  function logout() {
    // Session::remove('usuario');
    Session::destroy();
    // redireccionamos la paguina.
    header('Location: ?c=Auth');
    die();
  }
}
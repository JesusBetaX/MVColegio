<?php

namespace controller;

use libs\Request;
use libs\Session;
use libs\UploadedFile;
use model\Alumno;

/**
 * Controlador para el recurso Alumno.
 */
class Alumnos {
   
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
   * Muestra un listado del recurso.
   * @param  \libs\Request  $request
   */
  function index(Request $request) {
    $search = $request->get('search');
    $cursor = Alumno::search($search);
    
    // mostramos las vistas.
    require 'view/layout/header.php';
    require 'view/alumnos/index.php';
    require 'view/layout/footer.php';
  }
  
  /**
   * Muestra el formulario del recurso, para crearlo o editarlo.
   * @param  \libs\Request  $request
   */
  function form(Request $request) {
    $alumno = Alumnos::getAlumnoByGetId($request);

    // mostramos las vistas.
    require 'view/layout/header.php';
    require 'view/alumnos/form.php';
    require 'view/layout/footer.php';
  }
    
  /**
   * Se encarga de guardar los datos del recurso. 
   * Ya sea insertar o modificar.
   * @param  \libs\Request  $request
   */  
  function save(Request $request) {
    $alumno = Alumnos::getAlumnoByGetId($request);

    // llenamos el modelo con los datos enviados por el 
    // formulario html, por medio de la petición($request).
    $request->fill($alumno, array(
      'nombre', 'apellido', 'correo', 'sexo', 'fecha_nacimiento'
    ));

    // si la request tiene una foto.
    if ($request->hasFile('foto')) {
      // recupera la foto enviada por el formulario.
      $file = $request->getFile('foto');
      // guardamos el nombre de la foto vieja para 
      // remplazarla cuando se guarde la nueva foto.
      $file->setDeleteFileOnSave($alumno->foto);
      // asigna un nombre aleatorio para guardar la imagen.
      $alumno->foto = $file->randomName();
    }

    // si se guardaron los datos del alumno.
    if ($alumno->save()) {
      // si la request tiene una foto.
      if (isset($file)) {
        // guarda la nueva imagen en la carpeta correspondiente.
        $file->save(Alumno::DIR, $alumno->foto);
      }
    }
    
    // redireccionamos la paguina.
    header('Location: ?c=Alumnos'); 
    die();
  }
    
  /**
   * Elimina el recurso.
   * @param  \libs\Request  $request
   */
  function delete(Request $request) {
    // Recuperamos el registro.
    $alumno = self::getAlumnoByGetId($request);
    // Eliminamos el registro.
    if (Alumno::delete($alumno->id)) {
      // Eliminamos la foto de la carpeta.
      if (!empty($alumno->foto)) {
        unlink(Alumno::DIR . $alumno->foto);
      }
    }
    // redireccionamos la paguina.
    header('Location: ?c=Alumnos'); 
    die();
  }


  private static function getAlumnoByGetId(Request $request) {
    $id = $request->get('id', 0);
    // Si la petición($request) tiene un id mayor a 0.
    if ($id != 0) {
      // Busca el recurso por 'id' con 'findById', para editarlo.
      $alumno = Alumno::findById($id);

      // Si al buscar no encontro nada.
      if ($alumno == false) {
        throw new \Exception("El registro no existe.", 404);
      }

    } else  {
      // de lo contrario crea un nuevo recurso, para agregarlo.
      $alumno = new Alumno();
    }

    return $alumno;
  }
}
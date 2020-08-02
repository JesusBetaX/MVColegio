<?php

/**
 * Archivo para configurar nuestra aplicación.
 */
return [
  // -------------------------------------------------------------------
  // Configuración para la base de datos.
  // -------------------------------------------------------------------
  'db' => [
    'dsn' => 'mysql:host=127.0.0.1;dbname=colegio;charset=utf8',
    'username' => 'root',
    'password' => ''
  ],
    
  // -------------------------------------------------------------------
  // Configuración para la paguina.
  // -------------------------------------------------------------------
  'web' => [
    // Controlador por default o main. 
    // Esté controlador sera el primero en ejecutarse.
    'controller' => 'Home',
    // Acción por default para todos los controladores.
    // esta función debera estar definida en todos los controladores.
    'action' => 'index'
  ],
    
  // -------------------------------------------------------------------
  // Configuración para las galletas.
  // -------------------------------------------------------------------  
  'cookie' => [
      // Nombre de la sesión.
      'name' => 'MVColegio',
      'domain' => '', 
      'path' => '', 
      'secure' => FALSE, 
      'lifetime' => 7200,
  ]
];

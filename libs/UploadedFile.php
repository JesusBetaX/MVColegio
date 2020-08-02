<?php

namespace libs;

final class UploadedFile {
    
  private $file;
  
  public function __construct(&$file = array()) {
    $this->file = $file;
  }
  
  public function __destruct() {
    $this->file = null;
  }

  /**
   * Obtiene el tamaño del archivo.
   * @return int
   */
  public function size() {
    return $this->file['size'];
  }

  /**
   * Recupera el nombre original del archivo que se pasa.
   * @return String
   */
  public function name() {
    return $this->file['name'];
  }
  
  /**
   * Recupera el nombre temporal del archivo.
   * @return String
   */
  public function tmpName() {
    return $this->file['tmp_name'];
  }

  /**
   * Recupera el tipo de archivo.
   * @return String
   */
  public function type() {
    return pathinfo($this->file['type'], PATHINFO_BASENAME);
  }
  
  /**
   * Recupera la extencion de archivo.
   * @return String
   */
  public function extension() {
    return pathinfo($this->name(), PATHINFO_EXTENSION);
  }
  
  /**
   * Recupera el nombre completo del archivo.
   * @return String
   */
  public function fileName() {
    return pathinfo($this->name(), PATHINFO_FILENAME);
  }

  /**
   * Obtiene el contenido del archivo.
   * @return bytes
   */
  public function getContents() {
    return file_get_contents($this->tmpName());
  }

  /**
   * Generamos un nombre aleatorio para la imagen.
   * @return String
   */
  public function randomName() {
    // Recumeramos la extencion de la imagen.
    $ext = pathinfo($this->name(), PATHINFO_EXTENSION); 
    $current = round(microtime(true) * 1000);
    $random = rand(100000, 999999);
    return $current . '_' . $random . '.' . $ext;
  }

  /**
   * Asigna el nombre antiguo del archivo para 
   * reemplazarlo cuando se ejecute la función 'save'.
   * @param String nameFile antiguo nombre del archivo a remplazar.
   */
  public function setDeleteFileOnSave($nameFile) {
    $this->file['deleteFileOnSave'] = $nameFile;
  }

  /**
   * Recupera el antiguo nombre del archivo.
   * @return String nombre del archivo.
   */
  public function getDeleteFileOnSave() {
    return array_key_exists('deleteFileOnSave', $this->file)
        ? $this->file['deleteFileOnSave']
        : null;
  }

  /**
   * Guarda o remplaza un archivo.
   * @param $src directorio donde se guardara el archivo.
   * @param $nameFile nombre que se le pondra al archivo.
   * @return true si el archivo se guardo correctamente.
   */
  public function save($src, $nameFile) {
    $copy = copy($this->tmpName(), $src . $nameFile);
    // Si tenia un archivo antiguo lo elimina.
    $deleteFileOnSave = $this->getDeleteFileOnSave();
    if (!empty($deleteFileOnSave) && $copy) {
      unlink($src . $deleteFileOnSave);     
    } 
    return $copy;
  }
}